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
        if (clsQuangCao::trangThai($maQC, true)) {
            helper::alertSuccessString("Đã hiện quảng cáo");
        }
    } elseif ($_REQUEST["ac"] == "invisible") {
        //Ẩn loại
        if (clsQuangCao::trangThai($maQC, false)) {
            helper::alertDangerString("Đã ẩn quảng cáo");
        }
    }
}
clsDataBase::closeConnect();
