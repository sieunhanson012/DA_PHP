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
		if (clsHangSanXuat::trangThai($maHSX, true)) {
			helper::alertSuccessString("Đã hiện hãng sản xuất $tenHSX");
		}
	} elseif ($_REQUEST["ac"] == "invisible") {
		//Ẩn hãng sản xuất
		if (clsHangSanXuat::trangThai($maHSX, false)) {
			helper::alertDangerString("Đã ẩn hãng sản xuất $tenHSX");
		}
	}
}
clsDataBase::closeConnect();
