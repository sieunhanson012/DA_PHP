<?php

class clsChiTietHoaDon{
    public static function layChiTietHDTheoMa($maHD){
        clsDataBase::query("SELECT * FROM `chitiethoadon`,`sanpham`,`hoadon` WHERE chitiethoadon.ma_hoa_don = hoadon.ma_hoa_don AND chitiethoadon.ma_san_pham=sanpham.ma_san_pham and hoadon.ma_hoa_don = '$maHD'");
        if(clsDataBase::numRows()>0)
            return clsDataBase::fetchAll();
        return clsDataBase::getError();
    }

    

}