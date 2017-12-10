<?php 
	class clsTaiKhoan{

		public function dangNhap($_TenDangNhap,$_MatKhau) {
		clsDataBase::query("SELECT ma_tai_khoan,ho_ten,ten_dang_nhap,mat_khau,quyen,trang_thai FROM taikhoan WHERE ten_dang_nhap = '$_TenDangNhap'");
		//Kiểm tra có tồn tại tài khoản không?
		if (clsDataBase::numRows() > 0) {
			$data = clsDataBase::fetch();
			//Lấy mật khẩu để kiểm tra với mật khẩu nhập vào
			if ($_MatKhau == $data["mat_khau"]) {
				//Kiểm tra tài khoản có bị khóa không
				if ($data["trang_thai"] == 1) {
					//Đăng nhập thành công
					$_SESSION["ten_dang_nhap"] = $data["ten_dang_nhap"];
					$_SESSION["quyen"] = $data["quyen"];
					$_SESSION["ho_ten"] = $data["ho_ten"];
					$MaTK = $data["ma_tai_khoan"];
					$_SESSION["ma_tai_khoan"]=$data["ma_tai_khoan"];
					$NgayHienTai = date('Y-m-d');
					//Cập nhật lần đăng nhập cuối của tài khoản
					clsDataBase::query("UPDATE taikhoan SET lan_dang_nhap_cuoi = '$NgayHienTai' WHERE ma_tai_khoan = $MaTK ");
					if (clsDatabase::effectRow() > 0) {
						return true;
					} else {
						return false;
					}
				} else {
					//Tài khoản bị khóa
					return "lock";
				}
			} else {
				//Mật khẩu không đúng
				return "wrong";
			}
		} else {
			//Tên đăng nhập không tồn tại
			return "invalid";
		}
	}

	public static function Them($_HoTen, $_TenDangNhap, $_MatKhau, $_Email, $_SoDienThoai, $_NgayTao, $_LanDangNhapCuoi, $_TrangThai, $_Quyen) {
		clsDataBase::Query("SELECT ten_dang_nhap FROM taikhoan WHERE ten_dang_nhap = '$_TenDangNhap'");
		if (clsDataBase::numRows() > 0) {
			//tồn tại tên đăng nhập
			return "username";
		} else {
			//không tồn tại tên đăng nhập => kiểm tra tồn tại email
			clsDataBase::Query("SELECT email FROM taikhoan WHERE email = '$_Email'");
			if (clsDataBase::numRows() > 0) {
				return "email";
			} else {
				clsDataBase::Query("INSERT INTO taikhoan(ho_ten,ten_dang_nhap,mat_khau,email,so_dien_thoai,ngay_tao,lan_dang_nhap_cuoi,trang_thai,quyen) VALUES('$_HoTen','$_TenDangNhap','$_MatKhau','$_Email','$_SoDienThoai','$_NgayTao','$_LanDangNhapCuoi','$_TrangThai','$_Quyen') ");
				if (clsDataBase::effectRow() > 0) {
					return true;
				} else {
					return false;
				}
			}
		}
	}

	

	public static function ThemBinhLuan($mataikhoan,$noidungbinhluan){
		
		$NgayHienTai = date('d-m-Y');
		clsDataBase::query("INSERT INTO binhluan(noi_dung,ngay_binh_luan,ma_tai_khoan) VALUES('$noidungbinhluan','$NgayHienTai',$mataikhoan)");
		if(clsDatabase::effectRow()>0){
			return true;
		}else{
			return false;
		}
	}



	}
 ?>