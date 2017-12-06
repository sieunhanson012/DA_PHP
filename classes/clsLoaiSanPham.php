<?php

class clsLoaiSanPham {

	public static function layLoaiSanPham() {
		clsDataBase::query("SELECT * FROM loaisanpham WHERE trang_thai = 1");
		if (clsDataBase::numRows() > 0) {
			return clsDataBase::fetchAll();
		}
		return false;
	}
}
