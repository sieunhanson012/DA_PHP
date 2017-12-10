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
		public static function LayTatCaSanPham(){
				
				clsDataBase::query("SELECT * FROM sanpham sp,hangsanxuat hsx,loaisanpham lsp,kichco kc,mausac ms where sp.ma_mau=ms.ma_mau and sp.ma_kich_co=kc.ma_kich_co and sp.ma_loai=lsp.ma_loai and sp.ma_hang_sx=hsx.ma_hang_sx");	
				if(clsDataBase::numRows()>0){
					return clsDataBase::fetchAll();
				}else{
					return false;
				}
		}
		public static function LaySanPhamTheoId($ID){
			clsDataBase::query("SELECT * FROM sanpham sp,hangsanxuat hsx,loaisanpham lsp,kichco kc,mausac ms where sp.ma_mau=ms.ma_mau and sp.ma_kich_co=kc.ma_kich_co and sp.ma_loai=lsp.ma_loai and sp.ma_hang_sx=hsx.ma_hang_sx and sp.ma_san_pham=$ID");
			if(clsDataBase::numRows()>0){
				return clsDataBase::fetch();
			}else{
				return false;
			}
		}
		public static function LayKichCoTheoSanPham($ID){
			clsDataBase::query("SELECT kich_co FROM sanpham sp,kichco kc WHERE sp.ma_kich_co=kc.ma_kich_co and sp.ma_san_pham=$ID");
			if(clsDataBase::numRows()>0){
				return clsDataBase::fetchAll();
			}else{
				return false;
			}
		}

		

	}


 ?>