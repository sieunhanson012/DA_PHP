<?php
session_start();
include_once '../../classes/helper.php';
include_once '../../classes/clsTaiKhoan.php';
include_once '../../classes/clsDataBase.php';

$_TenDangNhap = $_POST["txtTenDangNhap"];
$_Email = $_POST["txtEmail"];
$_HoTen = $_POST["txtHoTen"];
$_MatKhau = $_POST["txtMatKhau"];
$_SoDienThoai = $_POST["txtSoDienThoai"];
$_Quyen = $_POST["txtQuyen"];

clsDataBase::openConnect();
$temp = clsTaiKhoan::Them($_HoTen, $_TenDangNhap, $_MatKhau, $_Email, $_SoDienThoai, date('Y-m-d'), date('Y-m-d'), 1, $_Quyen);
if (is_bool($temp)) {
	//thành công quay lại trang bảng tài khoản
	$_SESSION["notify"] = "Thêm tài khoản <strong>$_TenDangNhap</strong> thành công";
	header("Location: ../index.php?page=tai-khoan");
} elseif ($temp == "username") {
	//tồn tại tên đăng nhập
	$_SESSION["notify"] = "Tên đăng nhập đã tồn tài";
	header("Location: ../index.php?page=them-tai-khoan");

} elseif ($temp == "email") {
	//tồn tại email
	$_SESSION["notify"] = "Email đã tồn tại";
	header("Location: ../index.php?page=them-tai-khoan");
} else {
	$_SESSION["notify"] = "Lỗi! vui lòng thử lại";
	header("Location: ../index.php?page=them-tai-khoan");
}
clsDataBase::closeConnect();
