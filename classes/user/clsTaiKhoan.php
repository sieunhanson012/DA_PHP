<?php 
	class clsTaiKhoan{

		public function dangNhap($_TenDangNhap,$_MatKhau) {
		clsDataBase::query("SELECT ma_tai_khoan,ho_ten,ten_dang_nhap,mat_khau,quyen,trang_thai FROM taikhoan WHERE ten_dang_nhap = '$_TenDangNhap' AND trang_thai = 1");
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
	}
 ?>