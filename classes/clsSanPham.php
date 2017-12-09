<?php

class clsSanPham {

	public static function layBangSangPham() {
		clsDataBase::query("SELECT sanpham.*,mausac.ten_mau,kichco.kich_co,loaisanpham.ten_loai,hangsanxuat.ten_hang_sx FROM sanpham,mausac,kichco,loaisanpham,hangsanxuat WHERE sanpham.ma_mau = mausac.ma_mau AND sanpham.ma_loai = loaisanpham.ma_loai AND sanpham.ma_kich_co = kichco.ma_kich_co AND sanpham.ma_hang_sx = hangsanxuat.ma_hang_sx ORDER BY ma_san_pham DESC");
		if (clsDataBase::numRows() > 0) {
			return clsDataBase::fetchAll();
		} else {
			return str_replace("'","",clsDataBase::getError());
		}
	}

	public static function layBangSanPhamTheoMa($maSP){
        clsDataBase::query("SELECT sanpham.*,mausac.ten_mau,kichco.kich_co,loaisanpham.ten_loai,hangsanxuat.ten_hang_sx FROM sanpham,mausac,kichco,loaisanpham,hangsanxuat WHERE sanpham.ma_mau = mausac.ma_mau AND sanpham.ma_loai = loaisanpham.ma_loai AND sanpham.ma_kich_co = kichco.ma_kich_co AND sanpham.ma_hang_sx = hangsanxuat.ma_hang_sx and  ma_san_pham = '$maSP'");
        if (clsDataBase::numRows() > 0) {
            return clsDataBase::fetch();
        } else {
            return str_replace("'","",clsDataBase::getError());
        }
    }

	public static function tinhTrangHot($maSP, $bool) {
		if ($bool) {
			//Cap nhat sp hot
			clsDataBase::query("UPDATE sanpham SET san_pham_hot = 1 WHERE ma_san_pham = '$maSP'");
			if (clsDataBase::effectRow() > 0) {
				return true;
			}
			return str_replace("'","",clsDataBase::getError());
		} else {
			//Cap nhat sp binh thuong
			clsDataBase::query("UPDATE sanpham SET san_pham_hot = 0 WHERE ma_san_pham = '$maSP'");
			if (clsDataBase::effectRow() > 0) {
				return true;
			}
			return str_replace("'","",clsDataBase::getError());
		}
	}

	public static function trangThai($maSP, $bool) {
		if ($bool) {
			//Hiện sản phẩm
			clsDataBase::query("UPDATE sanpham SET trang_thai = 1 WHERE ma_san_pham = '$maSP'");
			if (clsDataBase::effectRow() > 0) {
				return true;
			}
			return str_replace("'","",clsDataBase::getError());
		} else {
			//Ẩn sản phẩm
			clsDataBase::query("UPDATE sanpham SET trang_thai = 0 WHERE ma_san_pham = '$maSP'");
			if (clsDataBase::effectRow() > 0) {
				return true;
			}
			return str_replace("'","",clsDataBase::getError());
		}
	}

	/**
	 * Thêm sản phẩm
	 * Thành công ==> true
	 */
	public static function them($maMau,$maLoai,$maKichCo,$maHSX,$tenSP,$giaBan,$chatLieu,$hinhAnh,$thongTin,$ngayTao,$soLuong){
		clsDataBase::query("INSERT INTO sanpham(ma_mau, ma_loai, ma_kich_co, ma_hang_sx, ten_san_pham, gia_ban, chat_lieu, hinh_anh, thong_tin, ngay_tao, so_luong)
										VALUES('$maMau','$maLoai','$maKichCo','$maHSX','$tenSP','$giaBan','$chatLieu','$hinhAnh','$thongTin','$ngayTao','$soLuong')");
		if(clsDataBase::effectRow()>0){
			return true;
		}
		return str_replace("'","",clsDataBase::getError());				
	}

    /*
     * Sửa sản phẩm
     * */

    public static function sua($maSP,$maMau,$maLoai,$maKichCo,$maHangSX,$tenSP,$giaBan,$chatLieu,$hinhAnh,$thongTin,$soLuong){
        clsDataBase::query("UPDATE sanpham SET ma_mau ='$maMau', ma_loai ='$maLoai', ma_kich_co ='$maKichCo', ma_hang_sx ='$maHangSX', ten_san_pham ='$tenSP', gia_ban ='$giaBan', chat_lieu ='$chatLieu', hinh_anh ='$hinhAnh', thong_tin ='$thongTin', so_luong ='$soLuong' WHERE ma_san_pham = '$maSP'");
        if(clsDataBase::effectRow()>=0){
            return true;
        }
        return str_replace("'","",clsDataBase::getError());
    }
}
