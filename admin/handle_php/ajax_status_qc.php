<?php
include_once '../../classes/helper.php';
include_once '../../classes/clsQuangCao.php';
include_once '../../classes/clsDataBase.php';

if (isset($_REQUEST["maQC"])) {
    $maQC = $_REQUEST["maQC"];
} else {
    die('404');
}

clsDataBase::openConnect();
if (isset($_REQUEST["ac"])) {
    if ($_REQUEST["ac"] == "visible") {
        //Hiện loại
        $resultQC = clsQuangCao::trangThai($maQC, true);
        if (is_bool($resultQC)) {
            helper::alertSuccessString("Đã hiện quảng cáo");
        }else{
            helper::alertDangerString($resultSanPham);
        }
    } elseif ($_REQUEST["ac"] == "invisible") {
        //Ẩn loại
        $resultQC = clsQuangCao::trangThai($maQC, false);
        if (is_bool($resultQC)) {
            helper::alertDangerString("Đã ẩn quảng cáo");
        }else{
            helper::alertDangerString($resultSanPham);
        }
    }
}
clsDataBase::closeConnect();
