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
        if (clsSanPham::tinhTrangHot($maSP, true)) {
            helper::alertPrimaryString("Cập nhật sản phẩm hot");
        }
    } elseif ($_REQUEST["ac"] == "normal") {
        //sp binh thuong
        if (clsSanPham::tinhTrangHot($maSP, false)) {
            helper::alertPrimaryString("Cập nhật sản phẩm bình thường");
        }
    } elseif ($_REQUEST["ac"] == "visible") {
        //Hiện sản phẩm
        if (clsSanPham::trangThai($maSP, true)) {
            helper::alertSuccessString("Đã hiện sản phẩm <strong>$tenSP</strong>");
        }
    } elseif ($_REQUEST["ac"] == "invisible") {
        if (clsSanPham::trangThai($maSP, false)) {
            helper::alertDangerString("Đã ẩn sản phẩm <strong>$tenSP</strong>");
        }
    }
}
clsDataBase::closeConnect();
