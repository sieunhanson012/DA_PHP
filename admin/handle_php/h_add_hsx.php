<?php
session_start();
include_once '../../classes/helper.php';
include_once '../../classes/clsHangSanXuat.php';
include_once '../../classes/clsDataBase.php';

$_tenHSX = $_POST["txtTenHSX"];
$_ghiChu = $_POST["txtGhiChu"];

clsDataBase::openConnect();
$temp = clsHangSanXuat::them($_tenHSX, $_ghiChu, 1);

if (is_bool($temp) && $temp ) {
    //thành công quay lại trang hãng sản xuất
    $_SESSION["notify-success"] = "Thêm hãng <strong>$_tenHSX</strong> thành công";
    $_SESSION["focus"] = $_tenHSX;
} elseif(!$temp) {
    //tồn tại hãng sản xuất
    $_SESSION["notify-fail"] = "Tên hãng đã tồn tài";
}else{
    //lỗi truy vấn
    $_SESSION["notify-fail"] = $temp;
    
}
header("Location: ../index.php?page=them-hang-sx");
clsDataBase::closeConnect();
