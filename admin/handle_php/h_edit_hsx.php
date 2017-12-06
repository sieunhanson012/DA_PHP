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
	helper::alertSuccess("Sửa hãng sản xuất");
} else {
	helper::alertDangerString("Sửa hãng sản xuất thất bại");
}
clsDataBase::closeConnect();
