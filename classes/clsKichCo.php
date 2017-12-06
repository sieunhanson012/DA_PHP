<?php

class clsKichCo {

	public static function layKichCo() {
		clsDataBase::query("SELECT * FROM kichco WHERE trang_thai = 1");
		if (clsDataBase::numRows() > 0) {
			return clsDataBase::fetchAll();
		}
		return false;
	}
}
