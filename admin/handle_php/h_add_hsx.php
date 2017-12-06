<?php
session_start();
include_once '../../classes/helper.php';
include_once '../../classes/clsHangSanXuat.php';
include_once '../../classes/clsDataBase.php';

$_tenHSX = $_POST["txtTenHSX"];
$_ghiChu = $_POST["txtGhiChu"];

clsDataBase::openConnect();
$temp = clsHangSanXuat::Them($_tenHSX, $_ghiChu, 1);

if (is_bool($temp) && $temp == true) {
	//thành công quay lại trang hãng sản xuất
	header("Location: ../index.php?page=hang-san-xuat");
} else {
	//tồn tại hãng sản xuất
	$_SESSION["notify"] = "Tên hãng đã tồn tài";
	header("Location: ../index.php?page=them-hang-sx");
}
clsDataBase::closeConnect();
