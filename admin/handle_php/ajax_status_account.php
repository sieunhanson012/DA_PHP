<?php
include_once '../../classes/helper.php';
include_once '../../classes/clsTaiKhoan.php';
include_once '../../classes/clsDataBase.php';
clsDataBase::openConnect();
if (!empty($_REQUEST["ma_tai_khoan"])) {
    $maTK = $_REQUEST["ma_tai_khoan"];
    $tenTK = $_REQUEST["ten_tai_khoan"];
} else {
    die(404);
}
if (isset($_REQUEST["ac"])) {
    if ($_REQUEST["ac"] == "lock") {
        //Khóa tài khoản
        $resultTaiKhoan = clsTaiKhoan::khoaTaiKhoan($maTK);
        if (is_bool($resultTaiKhoan)) {
            helper::alertDangerString("Khóa tài khoản <strong>$tenTK</strong> thành công ");
        } else {
            helper::alertDangerString($resultTaiKhoan);
        }
    } elseif ($_REQUEST["ac"] == "unlock") {
        //Mở khóa tài khoản
        $resultTaiKhoan =clsTaiKhoan::moKhoaTaiKhoan($maTK);
        if (is_bool($resultTaiKhoan)) {
            helper::alertSuccessString("Mở khóa tài <strong>$tenTK</strong> khoản thành công");
        } else {
            helper::alertDangerString($resultTaiKhoan);
        }
    }
}
clsDataBase::closeConnect();
