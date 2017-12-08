<?php

class clsLoaiSanPham {

	public static function layLoaiSanPham() {
		clsDataBase::query("SELECT * FROM loaisanpham WHERE trang_thai = 1");
		if (clsDataBase::numRows() > 0) {
			return clsDataBase::fetchAll();
		}
		return false;
	}

	public static function layTatCaLoaiSanPham(){
		clsDataBase::query("SELECT * FROM loaisanpham ");
		if (clsDataBase::numRows() > 0) {
			return clsDataBase::fetchAll();
		}
		return false;
	}

	public static function layLoaiSanPhamTheoMa($maLoai){
		clsDataBase::query("SELECT * FROM loaisanpham WHERE ma_loai = '$maLoai' ");
		if (clsDataBase::numRows() > 0) {
			return clsDataBase::fetch();
		}
		return false;
	}

	public static function trangThai($maLoai, $bool) {
		if ($bool) {
			//Hiện hãng sản xuất
			clsDataBase::query("UPDATE loaisanpham SET trang_thai = 1 WHERE ma_loai = '$maLoai'");
			if (clsDataBase::effectRow() > 0) {
				return true;
			}
			return false;
		} else {
			//Ẩn hãng sản xuất
			clsDataBase::query("UPDATE loaisanpham SET trang_thai = 0 WHERE ma_loai = '$maLoai'");
			if (clsDataBase::effectRow() > 0) {
				return true;
			}
			return false;
		}
	}

	/*
		Thêm loại
		Đúng ==> trả về true
		Tồn tại ==> trả về false
	*/
	public static function them($tenLoai) {
		clsDataBase::query("SELECT ten_loai FROM loaisanpham WHERE ten_loai = '$tenLoai'");
		if (clsDataBase::numRows() > 0) {
			return false;
		} else {
			clsDataBase::query("INSERT INTO loaisanpham(ten_loai) VALUES ('$tenLoai')");
			if (clsDataBase::effectRow() > 0) {
				return true;
			}
			return false;
		}
	}

	public static function sua($maLoai,$tenLoai) {
		clsDataBase::query("SELECT ten_loai FROM loaisanpham WHERE ten_loai = '$tenLoai'");
		if (clsDataBase::numRows() <= 0) {
			clsDataBase::query("UPDATE loaisanpham SET ten_loai = '$tenLoai' WHERE ma_loai = '$maLoai' ");
			if (clsDataBase::effectRow() > 0) {
				return true;
			}
		}
			return false;
	}
}
