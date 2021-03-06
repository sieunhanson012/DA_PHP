<?php
class clsTaiKhoan {

	/*
		thêm tài khoản
		Đúng ==> trả về true
		Lỗi Insert ==> trả về false
		Tồn tại tên đăng nhập ==> trả về 'username'
		Tồn tại email ==> trả về 'email'
	*/
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
					return str_replace("'","",clsDataBase::getError());
				}
			}
		}
	}

//	public function Xoa() {
//		$Query("UPDATE taikhoan SET trang_thai = 0 WHERE ma_tai_khoan = $_MaTK");
//		//Kiểm tra số dòng bị ảnh hưởng trong database
//		//Trả về true nếu tồn tại
//		if ($EffectRow() > 0) {
//			return true;
//		} else {
//			return str_replace("'","",clsDataBase::getError());
//		}
//	}

	public static function Sua($_MaTK, $_HoTen, $_MatKhau, $_SoDienThoai, $_Quyen) {
		clsDataBase::Query("UPDATE taikhoan SET ho_ten = '$_HoTen', mat_khau = '$_MatKhau', so_dien_thoai = '$_SoDienThoai', quyen = '$_Quyen' WHERE ma_tai_khoan = '$_MaTK' ");
		//Kiểm tra số dòng bị ảnh hưởng trong database
		//Trả về true nếu tồn tại
		if (clsDataBase::EffectRow() > 0) {
			return true;
		} else {
			return str_replace("'","",clsDataBase::getError());
		}
	}

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
					$NgayHienTai = date('Y-m-d');
					//Cập nhật lần đăng nhập cuối của tài khoản
					clsDataBase::query("UPDATE taikhoan SET lan_dang_nhap_cuoi = '$NgayHienTai' WHERE ma_tai_khoan = $MaTKUPDATE FROM taikhoan SET lan_dang_nhap_cuoi = '$NgayHienTai' WHERE ma_tai_khoan = $MaTK");
					if (clsDatabase::effectRow() > 0) {
						return true;
					} else {
						return str_replace("'","",clsDataBase::getError());
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

	public function dangXuat() {
		if (isset($_SESSION["ten_dang_nhap"]) && isset($_SESSION["quyen"]) && isset($_SESSION["ho_ten"])) {
			unset($_SESSION["ten_dang_nhap"]);
			unset($_SESSION["quyen"]);
			unset($_SESSION["ho_ten"]);
			return true;
		}
		return str_replace("'","",clsDataBase::getError());
	}

	public static function layBangTaiKhoan() {
		clsDataBase::query("SELECT * FROM taikhoan");
		if (clsDataBase::numRows() > 0) {
			return clsDataBase::fetchAll();
		} else {
			return str_replace("'","",clsDataBase::getError());
		}
	}

	public static function layBangTaiKhoanTheoMa($maTK) {
		clsDataBase::query("SELECT * FROM taikhoan WHERE ma_tai_khoan = '$maTK'");
		if (clsDataBase::numRows() > 0) {
			return clsDataBase::Fetch();
		} else {
			return str_replace("'","",clsDataBase::getError());
		}
	}

	public static function khoaTaiKhoan($maTK) {
		clsDataBase::query("UPDATE taikhoan SET trang_thai = 0 WHERE ma_tai_khoan = '$maTK'");
		if (clsDataBase::effectRow() > 0) {
			return true;
		}
		return str_replace("'","",clsDataBase::getError());
	}

	public static function moKhoaTaiKhoan($maTK) {
		clsDataBase::query("UPDATE taikhoan SET trang_thai = 1 WHERE ma_tai_khoan = '$maTK'");
		if (clsDataBase::effectRow() > 0) {
			return true;
		}
		return str_replace("'","",clsDataBase::getError());
	}
}
