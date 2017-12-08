<?php
session_start();
include_once '../../classes/helper.php';
include_once '../../classes/clsLoaiSanPham.php';
include_once '../../classes/clsDataBase.php';

$tenLoai = $_POST["txtTenLoai"];
clsDataBase::openConnect();
$temp = clsLoaiSanPham::them($tenLoai);

if (is_bool($temp) && $temp == true) {
    //tồn tại hãng sản xuất
    $_SESSION["notify-success"] = "Thêm <strong>$tenLoai</strong> thành công";
} else {
    //tồn tại hãng sản xuất
    $_SESSION["notify-fail"] = "Tên loại đã tồn tài";
}
header("Location: ../index.php?page=loai-san-pham");
clsDataBase::closeConnect();
