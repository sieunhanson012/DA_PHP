<?php
include_once '../../classes/helper.php';
include_once '../../classes/clsLoaiSanPham.php';
include_once '../../classes/clsDataBase.php';

if (isset($_REQUEST["ma_loai"])) {
    $maLoai = $_REQUEST["ma_loai"];
    $tenLoai = $_REQUEST["ten_loai"];
} else {
    die('404');
}

clsDataBase::openConnect();
if (isset($_REQUEST["ac"])) {
    if ($_REQUEST["ac"] == "visible") {
        //Hiện loại
        if (clsLoaiSanPham::trangThai($maLoai, true)) {
            helper::alertSuccessString("Đã hiện <strong>$tenLoai</strong>");
        }
    } elseif ($_REQUEST["ac"] == "invisible") {
        //Ẩn loại
        if (clsLoaiSanPham::trangThai($maLoai, false)) {
            helper::alertDangerString("Đã ẩn <strong>$tenLoai</strong>");
        }
    }
}
clsDataBase::closeConnect();
