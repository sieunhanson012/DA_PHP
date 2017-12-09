<?php
session_start();
include_once '../../classes/helper.php';
include_once '../../classes/clsDataBase.php';
include_once "../../classes/clsSanPham.php";
include_once "../../classes/clsHangSanXuat.php";
include_once "../../classes/clsMauSac.php";
include_once "../../classes/clsLoaiSanPham.php";
include_once "../../classes/clsKichCo.php";
if (empty($_REQUEST)) {
    die("404");
}

$tenSP = $_REQUEST["txtTenSP"];
$hinhAnh = $_FILES["txtImage"];
$giaBan = $_REQUEST["txtGiaBan"];
$chatLieu = $_REQUEST["txtChatLieu"];
$thongTin = $_REQUEST["txtThongTin"];
$soLuong = $_REQUEST["txtSoLuong"];
$loaiSanPham = $_REQUEST["sltLoai"];
$hangSanXuat = $_REQUEST["sltHSX"];
$mauSacCu = $_REQUEST["sltMauSac"];
$kichCoCu = $_REQUEST["sltKichCo"];
$ngayHienTai = date('Y-m-d');
if (isset($_REQUEST["ckbMauMoi"]))
    $kiemTraMauMoi = $_REQUEST["ckbMauMoi"];
if (isset($_REQUEST["chkKichThuocMoi"]))
    $kiemtraKichCoMoi = $_REQUEST["chkKichThuocMoi"];

clsDataBase::openConnect();
if (!empty($kiemTraMauMoi) && empty($kiemtraKichCoMoi)) { //Kiểm tra màu mới kích cỡ cũ
    $mauSacMoi = $_REQUEST["txtMauMoi"];
    $resultMauMoi = clsMauSac::them($mauSacMoi);
    // resultMauMoi là id mới thêm

    //Thêm màu mới
    if (!is_integer($resultMauMoi)) {
        //Thêm màu thất bại
        $_SESSION["notify-fail"] = "Màu sắc đã tồn tại";
        header("Location: ../index.php?page=them-san-pham");
    }

    //Thêm hình ảnh
    $resultHinhAnh = helper::themHinhAnh($hinhAnh);
    if (!is_string($resultHinhAnh)) {
        //Thêm hình thất bại
        $_SESSION["notify-fail"] = "Thêm hình thất bại";
        header("Location: ../index.php?page=them-san-pham");
    }
    //Thêm sản phẩm
    $temp = clsSanPham::them($resultMauMoi, $loaiSanPham, $kichCoCu, $hangSanXuat, $tenSP, $giaBan, $chatLieu, $resultHinhAnh, $thongTin, $ngayHienTai, $soLuong);
    if ($temp) {
        $_SESSION["focus"] = $tenSP;
        $_SESSION["notify-success"] = "Thêm sản phẩm <strong>$tenSP</strong> thành công";
        header("Location: ../index.php?page=san-pham");
    }

} elseif (!empty($kiemtraKichCoMoi) && empty($kiemTraMauMoi)) { //Kiểm tra kích cỡ mới màu sắc cũ
    $kichCoMoi = $_REQUEST["txtKichCoMoi"];
    //Thêm kích cỡ
    $resulutKichCo = clsKichCo::them($kichCoMoi);
    if (!is_integer($resulutKichCo)) {
        //Thêm kích cỡ thất bại
        $_SESSION["notify-fail"] = "Kích cỡ đã tồn tại";
        header("Location: ../index.php?page=them-san-pham");
    }
    //Thêm hình ảnh
    $resultHinhAnh = helper::themHinhAnh($hinhAnh);
    if (!is_string($resultHinhAnh)) {
        //Thêm hình thất bại
        $_SESSION["notify-fail"] = "Thêm hình thất bại";
        header("Location: ../index.php?page=them-san-pham");
    }
    //Thêm sản phẩm
    $temp = clsSanPham::them($mauSacCu, $loaiSanPham, $resulutKichCo, $hangSanXuat, $tenSP, $giaBan, $chatLieu, $resultHinhAnh, $thongTin, $ngayHienTai, $soLuong);
    if ($temp) {
        $_SESSION["focus"] = $tenSP;
        $_SESSION["notify-success"] = "Thêm sản phẩm <strong>$tenSP</strong> thành công";
        header("Location: ../index.php?page=san-pham");
    }
} elseif (!empty($kiemtraKichCoMoi) && !empty($kiemTraMauMoi)) {//Kiểm tra màu và kích cỡ mới
    //Thêm màu
    $mauSacMoi = $_REQUEST["txtMauMoi"];
    $resultMauSac = clsMauSac::them($mauSacMoi);
    if (!is_integer($resultMauSac)) {
        $_SESSION["notify-fail"] = "Màu sắc đã tồn tại";
        header("Location: ../index.php?page=them-san-pham");
    }
    //Thêm kích cỡ
    $kichCoMoi = $_REQUEST["txtKichCoMoi"];
    $resultKichCo = clsKichCo::them($kichCoMoi);
    if (!is_integer($resultKichCo)) {
        $_SESSION["notify-fail"] = "Kích cỡ đã tồn tại";
        header("Location: ../index.php?page=them-san-pham");
    }

    //Thêm hình ảnh
    $resultHinhAnh = helper::themHinhAnh($hinhAnh);
    if (!is_string($resultHinhAnh)) {
        $_SESSION["notify-fail"] = "Thêm hình ảnh thất bại";
        header("Location: ../index.php?page=them-san-pham");
    }

    //Thêm sản phẩm
    $temp = clsSanPham::them($resultMauSac, $loaiSanPham, $resultKichCo, $hangSanXuat, $tenSP, $giaBan, $chatLieu, $resultHinhAnh, $thongTin, $ngayHienTai, $soLuong);
    if ($temp) {
        $_SESSION["focus"] = $tenSP;
        $_SESSION["notify-success"] = "Thêm sản phẩm <strong>$tenSP</strong> thành công";
        header("Location: ../index.php?page=san-pham");
    }
} else { // màu cũ kích cỡ cũ

    //Thêm hình ảnh
    $resultHinhAnh = helper::themHinhAnh($hinhAnh);
    if (!is_string($resultHinhAnh)) {
        $_SESSION["notify-fail"] = "Thêm hình ảnh thất bại";
        header("Location: ../index.php?page=them-san-pham");
    }
    //thêm sản phẩm
    $temp = clsSanPham::them($mauSacCu, $loaiSanPham, $kichCoCu, $hangSanXuat, $tenSP, $giaBan, $chatLieu, $resultHinhAnh, $thongTin, $ngayHienTai, $soLuong);
    if ($temp) {
        $_SESSION["focus"] = $tenSP;
        $_SESSION["notify-success"] = "Thêm sản phẩm <strong>$tenSP</strong> thành công";
        header("Location: ../index.php?page=san-pham");
    }
}

clsDataBase::closeConnect();


