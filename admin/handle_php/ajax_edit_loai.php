<?php
include_once '../../classes/helper.php';
include_once '../../classes/clsLoaiSanPham.php';
include_once '../../classes/clsDataBase.php';

if (empty($_POST["maLoai"])) {
    die("404");
}

$maLoai = $_POST["maLoai"];
$tenLoai = $_POST["tenLoai"];

clsDataBase::openConnect();
$resultLoaiSP =clsLoaiSanPham::sua($maLoai, $tenLoai);
if (is_bool($resultLoaiSP)&& $resultLoaiSP) {
    helper::alertSuccessString("Sửa loại <strong>$tenLoai</strong> thành công");
} elseif(!$resultLoaiSP){
    helper::alertDangerString("<strong>$tenLoai</strong> đã tồn tại");
}else{
    helper::alertDangerString($resultLoaiSP);
}
clsDataBase::closeConnect();
