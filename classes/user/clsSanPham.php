<?php 
	class clsSanPham{

		public static function LayBangLoaiSanPham() {

				clsDataBase::query("SELECT * FROM loaisanpham WHERE trang_thai = 1");
				if (clsDataBase::numRows() > 0) {
					return clsDataBase::fetchAll();
				} else {
					return false;
				}
		}
		public static function LayBangHangSX() {
			
				clsDataBase::query("SELECT * FROM hangsanxuat WHERE trang_thai = 1");
				if (clsDataBase::numRows() > 0) {
					return clsDataBase::fetchAll();
				} else {
					return false;
				}
		}
	}

 ?>