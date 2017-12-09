<?php
include_once '../../classes/helper.php';
include_once '../../classes/clsSanPham.php';
include_once '../../classes/clsDataBase.php';

if (isset($_REQUEST["ma_san_pham"])) {
    $maSP = $_REQUEST["ma_san_pham"];
    $tenSP = $_REQUEST["ten_san_pham"];
} else {
    die(404);
}

clsDataBase::openConnect();
if (isset($_REQUEST["ac"])) {
    if ($_REQUEST["ac"] == "hot") {
        //sp hot
        $resultSanPham = clsSanPham::tinhTrangHot($maSP, true);
        if (is_bool($resultSanPham)) {
            helper::alertPrimaryString("Cập nhật sản phẩm hot");
        }else{
            helper::alertDangerString($resultSanPham);
        }
    } elseif ($_REQUEST["ac"] == "normal") {
        //sp binh thuong
        $resultSanPham = clsSanPham::tinhTrangHot($maSP, false);
        if (is_bool($resultSanPham)) {
            helper::alertPrimaryString("Cập nhật sản phẩm bình thường");
        }else{
            helper::alertDangerString($resultSanPham);
        }
    } elseif ($_REQUEST["ac"] == "visible") {
        //Hiện sản phẩm
        $resultSanPham = clsSanPham::trangThai($maSP, true);
        if (is_bool($resultSanPham)) {
            helper::alertSuccessString("Đã hiện sản phẩm <strong>$tenSP</strong>");
        }else{
            helper::alertDangerString($resultSanPham);
        }
    } elseif ($_REQUEST["ac"] == "invisible") {
        $resultSanPham = clsSanPham::trangThai($maSP, false);
        if (is_bool($resultSanPham)) {
            helper::alertDangerString("Đã ẩn sản phẩm <strong>$tenSP</strong>");
        }else{
            helper::alertDangerString($resultSanPham);
        }
    }
}
clsDataBase::closeConnect();
