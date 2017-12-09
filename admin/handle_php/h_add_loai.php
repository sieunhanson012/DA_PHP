<?php
session_start();
include_once '../../classes/helper.php';
include_once '../../classes/clsLoaiSanPham.php';
include_once '../../classes/clsDataBase.php';

$tenLoai = $_POST["txtTenLoai"];
clsDataBase::openConnect();
$temp = clsLoaiSanPham::them($tenLoai);

if (is_bool($temp) && $temp == true) {
    $_SESSION["focus"] = $tenLoai;
    $_SESSION["notify-success"] = "Thêm <strong>$tenLoai</strong> thành công";
} elseif(!$temp) {
    //tồn tại loaị
    $_SESSION["notify-fail"] = "Tên loại đã tồn tài";
}else{
    //loi truy van
    $_SESSION["notify-fail"] = $temp;
}
header("Location: ../index.php?page=loai-san-pham");
clsDataBase::closeConnect();
