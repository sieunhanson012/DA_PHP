<?php
include_once '../../classes/helper.php';
include_once '../../classes/clsHangSanXuat.php';
include_once '../../classes/clsDataBase.php';

if (isset($_REQUEST["ma_hsx"])) {
    $maHSX = $_REQUEST["ma_hsx"];
    $tenHSX = $_REQUEST["ten_hsx"];
} else {
    die(404);
}

clsDataBase::openConnect();
if (isset($_REQUEST["ac"])) {
    if ($_REQUEST["ac"] == "visible") {
        //Hiện hãng sản xuất
        $resultTrangThai = clsHangSanXuat::trangThai($maHSX, true);
        if (is_bool($resultTrangThai)) {
            helper::alertSuccessString("Đã hiện hãng sản xuất <strong>$tenHSX</strong>");
        }else{
            helper::alertDangerString($resultTrangThai);
        }
    } elseif ($_REQUEST["ac"] == "invisible") {
        //Ẩn hãng sản xuất
        $resultTrangThai = clsHangSanXuat::trangThai($maHSX, false);
        if (is_bool($resultTrangThai)) {
            helper::alertDangerString("Đã ẩn hãng sản xuất <strong>$tenHSX</strong>");
        }else{
            helper::alertDangerString($resultTrangThai);
        }
    }
}
clsDataBase::closeConnect();
