<?php

class clsSanPham {

	public static function layBangSangPham() {
		clsDataBase::query("SELECT sanpham.*,mausac.ten_mau,kichco.kich_co,loaisanpham.ten_loai,hangsanxuat.ten_hang_sx FROM sanpham,mausac,kichco,loaisanpham,hangsanxuat WHERE sanpham.ma_mau = mausac.ma_mau AND sanpham.ma_loai = loaisanpham.ma_loai AND sanpham.ma_kich_co = kichco.ma_kich_co AND sanpham.ma_hang_sx = hangsanxuat.ma_hang_sx");
		if (clsDataBase::numRows() > 0) {
			return clsDataBase::fetchAll();
		} else {
			return false;
		}
	}

	public static function tinhTrangHot($maSP, $bool) {
		if ($bool) {
			//Cap nhat sp hot
			clsDataBase::query("UPDATE sanpham SET san_pham_hot = 1 WHERE ma_san_pham = '$maSP'");
			if (clsDataBase::effectRow() > 0) {
				return true;
			}
			return false;
		} else {
			//Cap nhat sp binh thuong
			clsDataBase::query("UPDATE sanpham SET san_pham_hot = 0 WHERE ma_san_pham = '$maSP'");
			if (clsDataBase::effectRow() > 0) {
				return true;
			}
			return false;
		}
	}

	public static function trangThai($maSP, $bool) {
		if ($bool) {
			//Hiện sản phẩm
			clsDataBase::query("UPDATE sanpham SET trang_thai = 1 WHERE ma_san_pham = '$maSP'");
			if (clsDataBase::effectRow() > 0) {
				return true;
			}
			return false;
		} else {
			//Ẩn sản phẩm
			clsDataBase::query("UPDATE sanpham SET trang_thai = 0 WHERE ma_san_pham = '$maSP'");
			if (clsDataBase::effectRow() > 0) {
				return true;
			}
			return false;
		}
	}
}
