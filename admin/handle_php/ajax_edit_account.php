<?php
include_once '../../classes/helper.php';
include_once '../../classes/clsTaiKhoan.php';
include_once '../../classes/clsDataBase.php';

if (!empty($_POST["maTK"])) {
    $_MaTK = $_POST["maTK"];
    $_TenTK = $_POST["tenDangNhap"];
    $_HoTen = $_POST["hoTen"];
    $_MatKhau = $_POST["matKhau"];
    $_SoDienThoai = $_POST["soDienThoai"];
    $_Quyen = $_POST["quyen"];
} else {
    die('404');
}

clsDataBase::openConnect();
$resultTaiKhoan = clsTaiKhoan::Sua($_MaTK, $_HoTen, $_MatKhau, $_SoDienThoai, $_Quyen);
if (is_bool($resultTaiKhoan)) {
    helper::alertSuccessString("Sửa tài khoản <strong>$_TenTK</strong>  thành công");
} else {
    helper::alertDangerString($resultTaiKhoan);
}
clsDataBase::closeConnect();
