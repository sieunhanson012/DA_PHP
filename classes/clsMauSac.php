<?php

class clsMauSac {

	public static function layMauSac() {
		clsDataBase::query("SELECT * FROM mausac");
		if (clsDataBase::numRows() > 0) {
			return clsDataBase::fetchAll();
		}
		return false;
	}
}
