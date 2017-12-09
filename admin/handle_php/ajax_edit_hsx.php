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
$resultHSX = clsHangSanXuat::Sua($_maHSX, $_tenHSX, $_ghiChu);
if (is_bool($resultHSX) && ($resultHSX)) {
    helper::alertSuccessString("Sửa hãng sản xuất <strong>$_tenHSX</strong> thành công");
} elseif(!$resultHSX) {
    helper::alertDangerString("Hãng sản xuất <strong>$_tenHSX</strong> đã tồn tại");
}else{
    helper::alertDangerString($resultHSX);
}
clsDataBase::closeConnect();
