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
        $resultLoaiSP = clsLoaiSanPham::trangThai($maLoai, true);
        if (is_bool($resultLoaiSP)) {
            helper::alertSuccessString("Đã hiện <strong>$tenLoai</strong>");
        }else{
            helper::alertDangerString($resultTrangThai);
        }
    } elseif ($_REQUEST["ac"] == "invisible") {
        //Ẩn loại
        $resultLoaiSP = clsLoaiSanPham::trangThai($maLoai, false);
        if (is_bool($resultLoaiSP)) {
            helper::alertDangerString("Đã ẩn <strong>$tenLoai</strong>");
        }else{
            helper::alertDangerString($resultTrangThai);
        }
    }
}
clsDataBase::closeConnect();
