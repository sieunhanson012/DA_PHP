<?php
include_once '../../classes/helper.php';
include_once '../../classes/clsHoaDon.php';
include_once '../../classes/clsDataBase.php';

if (empty($_POST["maHD"])) {
    die("404");
}

$maHD = $_POST["maHD"];
$tenKH = $_POST["tenKH"];
$diaChi = $_POST["diaChi"];
$sdt = $_POST["sdt"];

clsDataBase::openConnect();
$resultHoaDon = clsHoaDon::sua($maHD, $tenKH, $diaChi,$sdt);
if (is_bool($resultHoaDon)) {
    helper::alertSuccessString("Đã sửa thông tin khách hàng");
} else {
    helper::alertDangerString($resultHoaDon);
}
clsDataBase::closeConnect();
