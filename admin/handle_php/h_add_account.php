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
    //thành công 
    $_SESSION["notify-success"] = "Thêm tài khoản <strong>$_TenDangNhap</strong> thành công";
    $_SESSION["focus"] = $_TenDangNhap;

} elseif ($temp == "username") {
    //tồn tại tên đăng nhập
    $_SESSION["notify-fail"] = "Tên đăng nhập đã tồn tài";
} elseif ($temp == "email") {
    //tồn tại email
    $_SESSION["notify-fail"] = "Email đã tồn tại";
} else {
    $_SESSION["notify-fail"] = $temp;
}
header("Location: ../index.php?page=them-tai-khoan");
clsDataBase::closeConnect();
