<?php

class clsHoaDon {
    public static function layTatCaHoaDon(){
        clsDataBase::query("SELECT * FROM hoadon");
		if (clsDataBase::numRows() > 0)
			return clsDataBase::fetchAll();
		return str_replace("'","",clsDataBase::getError());
	}
	
	public static function layHoaDonTheoMa($maHD){
		clsDataBase::query("SELECT * FROM hoadon WHERE ma_hoa_don = '$maHD'");
		if (clsDataBase::numRows() > 0)
			return clsDataBase::fetch();
		return str_replace("'","",clsDataBase::getError());
	}

	public static function sua($maHD,$tenKH,$diaChi,$sdt){
		clsDataBase::query("UPDATE hoadon SET ten_khach_hang = '$tenKH', dia_chi = '$diaChi', so_dien_thoai ='$sdt' WHERE ma_hoa_don = '$maHD'");
		if(clsDataBase::effectRow()>0)
			return true;
		return str_replace("'","",clsDataBase::getError());
	}


	public static function trangThai($maHD,$bool){
		if($bool){
			// Xác nhận
			clsDataBase::query("UPDATE hoadon SET tinh_trang = 1   WHERE ma_hoa_don = '$maHD'");
			if(clsDataBase::effectRow()>0)
			return true;
		}else{
			//Hủy
			clsDataBase::query("UPDATE hoadon SET tinh_trang = -1   WHERE ma_hoa_don = '$maHD'");
			if(clsDataBase::effectRow()>0)
			return true;
		}
		return str_replace("'","",clsDataBase::getError());
	}

	public static function huyHoaDon($maHD){
		clsDataBase::query("SELECT chitiethoadon.ma_san_pham,chitiethoadon.so_luong_mua,sanpham.so_luong FROM `chitiethoadon`,`sanpham`,`hoadon` WHERE chitiethoadon.ma_hoa_don = hoadon.ma_hoa_don AND chitiethoadon.ma_san_pham=sanpham.ma_san_pham and hoadon.ma_hoa_don = '$maHD'");
		if(clsDataBase::numRows()>0){
			$dataChiTietHoaDon = clsDataBase::fetchAll();
			foreach ($dataChiTietHoaDon as $key => $rows) {
				$soLuong = 0 ;
				//Khôi phục lại số lượng sản phẩm ban đầu
				//Số lượng = số lượng sp hiện tại + số lượng trong chi tiết
				$soLuong = $rows["so_luong_mua"]+$rows["so_luong"];
				$maSP = $rows["ma_san_pham"];
				clsDataBase::query("UPDATE sanpham SET so_luong= '$soLuong' WHERE ma_san_pham = '$maSP' ");
				if(clsDataBase::effectRow()<0){
					return str_replace("'","",clsDataBase::getError());
				}
			}
		}
		return true;
		
    }
}