<?php

class clsLoaiSanPham {

	public static function layLoaiSanPham() {
		clsDataBase::query("SELECT * FROM loaisanpham WHERE trang_thai = 1");
		if (clsDataBase::numRows() > 0) {
			return clsDataBase::fetchAll();
		}
		return str_replace("'","",clsDataBase::getError());
	}

	public static function layTatCaLoaiSanPham(){
		clsDataBase::query("SELECT * FROM loaisanpham ORDER BY ma_loai DESC ");
		if (clsDataBase::numRows() > 0) {
			return clsDataBase::fetchAll();
		}
		return str_replace("'","",clsDataBase::getError());
	}

	public static function layLoaiSanPhamTheoMa($maLoai){
		clsDataBase::query("SELECT * FROM loaisanpham WHERE ma_loai = '$maLoai' ");
		if (clsDataBase::numRows() > 0) {
			return clsDataBase::fetch();
		}
		return str_replace("'","",clsDataBase::getError());
	}

	public static function trangThai($maLoai, $bool) {
		if ($bool) {
			//Hiện hãng sản xuất
			clsDataBase::query("UPDATE loaisanpham SET trang_thai = 1 WHERE ma_loai = '$maLoai'");
			if (clsDataBase::effectRow() > 0) {
				return true;
			}
		} else {
			//Ẩn hãng sản xuất
			clsDataBase::query("UPDATE loaisanpham SET trang_thai = 0 WHERE ma_loai = '$maLoai'");
			if (clsDataBase::effectRow() > 0) {
				return true;
			}
		}
		return str_replace("'","",clsDataBase::getError());
	}

	/**
	 * Sửa loại sản phẩm 
	 * trùng => false
	 * lỗi => errorString
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
		}
		return str_replace("'","",clsDataBase::getError());
	}

	/**
	 * Sửa loại sản phẩm 
	 * trùng => false
	 * lỗi => errorString
	 */
	public static function sua($maLoai,$tenLoai) {
		clsDataBase::query("SELECT ten_loai FROM loaisanpham WHERE ten_loai = '$tenLoai'");
		if (clsDataBase::numRows() > 0) {
			return false;
		}else{
			clsDataBase::query("UPDATE loaisanpham SET ten_loai = '$tenLoai' WHERE ma_loai = '$maLoai' ");
			if (clsDataBase::effectRow() > 0) {
				return true;
			}
		}
		return str_replace("'","",clsDataBase::getError());
	}
}
