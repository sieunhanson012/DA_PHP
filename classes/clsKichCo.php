<?php

class clsKichCo {

	public static function layKichCo() {
		clsDataBase::query("SELECT * FROM kichco WHERE trang_thai = 1");
		if (clsDataBase::numRows() > 0) {
			return clsDataBase::fetchAll();
		}
		return false;
	}

	/**
	 * Thêm kích cỡ
	 * Trùng ==> false
	 * Thành công ==> id kich cõ mới thêm
	 */
	public static function them($kichCo){
		clsDataBase::query("SELECT kich_co FROM kichco WHERE kich_co = '$kichCo'");
		if(clsDataBase::numRows()>0){
			return false;
		}else{
			clsDataBase::query("INSERT INTO kichco(kich_co) VALUES('$kichCo')");
			if (clsDataBase::effectRow() > 0) {
				return clsDataBase::lastID();
			}
			return false;
		}
	}
}
