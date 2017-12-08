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
if (clsLoaiSanPham::sua($maLoai, $tenLoai)) {
    helper::alertSuccessString("Sửa loại <strong>$tenLoai</strong> thành công");
} else {
    helper::alertDangerString("Loại <strong>$tenLoai</strong> đã tồn tại");
}
clsDataBase::closeConnect();
