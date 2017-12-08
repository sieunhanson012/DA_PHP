<?php
include_once '../../classes/helper.php';
include_once '../../classes/clsHangSanXuat.php';
include_once '../../classes/clsDataBase.php';

if (empty($_POST["maHSX"])) {
    die("404");
}

$_maHSX = $_POST["maHSX"];
$_tenHSX = $_POST["tenHSX"];
$_ghiChu = $_POST["ghiChu"];

clsDataBase::openConnect();
if (clsHangSanXuat::Sua($_maHSX, $_tenHSX, $_ghiChu)) {
    helper::alertSuccessString("Sửa hãng sản xuất <strong>$_tenHSX</strong> thành công");
} else {
    helper::alertDangerString("Hãng sản xuất <strong>$_tenHSX</strong> đã tồn tại");
}
clsDataBase::closeConnect();
