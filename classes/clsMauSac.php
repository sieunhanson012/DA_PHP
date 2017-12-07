<?php

class clsMauSac {

	public static function layMauSac() {
		clsDataBase::query("SELECT * FROM mausac");
		if (clsDataBase::numRows() > 0) {
			return clsDataBase::fetchAll();
		}
		return false;
	}

	/**
	 * Thêm màu sắc
	 * Trùng ==> false
	 * Thành công ==> id màu mới thêm
	 */
	public static function them($tenMau){
		clsDataBase::query("SELECT ten_mau FROM mausac WHERE ten_mau = '$tenMau'");
		if(clsDataBase::numRows()>0){
			return false;
		}else{
			clsDataBase::query("INSERT INTO mausac(ten_mau) VALUES('$tenMau')");
			if (clsDataBase::effectRow() > 0) {
				return clsDataBase::lastID();
			}
			return false;
		}
	}
}
