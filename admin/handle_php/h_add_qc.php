<?php
session_start();
include_once '../../classes/helper.php';
include_once '../../classes/clsQuangCao.php';
include_once '../../classes/clsDataBase.php';

if (empty($_FILES["txtHinhAnh"]["name"])) {
    die('404');
}

$hinhAnh = $_FILES["txtHinhAnh"];

clsDataBase::openConnect();

$tenHinhAnh = helper::themHinhAnh($hinhAnh);
if (!is_string($tenHinhAnh)) {
    $_SESSION["notify-fail"] = "Thêm hình ảnh thất bại, vui lòng thử lại";
    header("Location: ../index.php?page=quang-cao");
}

if (clsQuangCao::them($tenHinhAnh)) {
    $_SESSION["notify-success"] = "Thêm quảng cáo thành công";
} else {
    $_SESSION["notify-fail"] = "Thêm thất bại";
}
header("Location: ../index.php?page=quang-cao");
clsDataBase::closeConnect();
