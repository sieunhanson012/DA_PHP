<?php
session_start();

include_once '../../classes/helper.php';
include_once '../../classes/clsSanPham.php';
include_once '../../classes/clsDataBase.php';

if (empty($_REQUEST["txtMaSP"])) {
    die("404");
}


$maSP = $_REQUEST["txtMaSP"];
$tenSP = $_REQUEST["txtTenSP"];
$giaBan = $_REQUEST["txtGiaBan"];
$chatLieu = $_REQUEST["txtChatLieu"];
$thongTin = $_REQUEST["txtThongTin"];
$soLuong = $_REQUEST["txtSoLuong"];
$maLoai = $_REQUEST["sltLoai"];
$maHangSX = $_REQUEST["sltHSX"];
$maMau = $_REQUEST["sltMauSac"];
$maKichCo = $_REQUEST["sltKichCo"];

clsDataBase::openConnect();

//Kiểm tra có thay đổi hình ảnh hay không
if (empty($_FILES["txtImage"]["name"])) {
    $hinhAnh = $_REQUEST["txtHinhAnhCu"];
    $resultSanPham = clsSanPham::sua($maSP, $maMau, $maLoai, $maKichCo, $maHangSX, $tenSP, $giaBan, $chatLieu, $hinhAnh, $thongTin, $soLuong);
} else {
    $hinhAnh = $_FILES["txtImage"];
    //Thêm hình mới
    $resultHinhAnh = helper::themHinhAnh($hinhAnh);
    if (!is_string($resultHinhAnh)) {
        $_SESSION["notify-fail"] = "Thêm hình thất bại, vui lòng chọn hình khác";
        header("Location: ../index.php?page=sua-san-pham&&id=$maSP");
    }
    $resultSanPham = clsSanPham::sua($maSP, $maMau, $maLoai, $maKichCo, $maHangSX, $tenSP, $giaBan, $chatLieu, $resultHinhAnh, $thongTin, $soLuong);
}

if (is_bool($resultSanPham) && $resultSanPham) {
    $_SESSION["notify-success"] = "Sửa sản phẩm <strong>$tenSP</strong> thành công";
    header("Location: ../index.php?page=san-pham");
} else {
    $_SESSION["notify-fail"] = $resultSanPham;
    header("Location: ../index.php?page=sua-san-pham&&id=$maSP");
}

clsDataBase::closeConnect();


