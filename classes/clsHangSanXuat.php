<?php

class clsHangSanXuat {

	public static function layHangSanXuat() {
		clsDataBase::query("SELECT * FROM hangsanxuat");
		if (clsDataBase::numRows() > 0) {
			return clsDataBase::fetchAll();
		} else {
			return false;
		}
	}

	public static function layHangSanXuatTonTai() {
		clsDataBase::query("SELECT * FROM hangsanxuat WHERE trang_thai = 1");
		if (clsDataBase::numRows() > 0) {
			return clsDataBase::fetchAll();
		} else {
			return false;
		}
	}

	public static function layHangSanXuatTheoMa($maHSX) {
		clsDataBase::query("SELECT * FROM hangsanxuat WHERE ma_hang_sx = '$maHSX'");
		if (clsDataBase::numRows() > 0) {
			return clsDataBase::fetch();
		} else {
			return false;
		}
	}

	public static function trangThai($maHSX, $bool) {
		if ($bool) {
			//Hiện hãng sản xuất
			clsDataBase::query("UPDATE hangsanxuat SET trang_thai = 1 WHERE ma_hang_sx = '$maHSX'");
			if (clsDataBase::effectRow() > 0) {
				return true;
			}
			return false;
		} else {
			//Ẩn hãng sản xuất
			clsDataBase::query("UPDATE hangsanxuat SET trang_thai = 0 WHERE ma_hang_sx = '$maHSX'");
			if (clsDataBase::effectRow() > 0) {
				return true;
			}
			return false;
		}
	}

	public static function Sua($_maHSX, $_tenHang, $_ghiChu) {
		clsDataBase::query("UPDATE hangsanxuat SET ten_hang_sx = '$_tenHang', ghi_chu = '$_ghiChu' WHERE ma_hang_sx = '$_maHSX' ");
		//Kiểm tra số dòng bị ảnh hưởng trong database
		//Trả về true nếu tồn tại
		if (clsDataBase::effectRow() > 0) {
			return true;
		}
		return false;
	}

	/*
		Thêm hãng sản xuất
		Đúng ==> trả về true
		Tồn tại ==> trả về false
	*/
	public static function Them($_tenHang, $_ghiChu, $_trangThai) {
		clsDataBase::query("SELECT ten_hang_sx FROM hangsanxuat WHERE ten_hang_sx = '$_tenHang'");
		if (clsDataBase::numRows() > 0) {
			return false;
		} else {
			clsDataBase::query("INSERT INTO hangsanxuat(ten_hang_sx,ghi_chu,trang_thai) VALUES ('$_tenHang','$_ghiChu','$_trangThai')");
			if (clsDataBase::effectRow() > 0) {
				return true;
			}
			return false;
		}
	}
}
