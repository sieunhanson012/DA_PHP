<?php 
	
	clsDataBase::OpenConnect();
	if(isset($_POST['dangnhap'])){
		$username=$_POST['tendangnhap'];
		$matkhau=$_POST['matkhau'];
		$bien=clsTaiKhoan::dangNhap($username,$matkhau);
		
		if(is_bool($bien)==true){
			echo "<script> $(document).ready(function(){
			history.go(-2);
		});</script>";
			if(isset($_SESSION['user_error'])){
				session_unset($_SESSION['user_error']);
				
			}
		}else{
				if($bien=="invalid"){
				$_SESSION['user_error']="Tên đăng nhập không tồn tại";
				
				}elseif ($bien=="lock") {
					$_SESSION['user_error']="Tài khoản bị khóa";
				}else{
					$_SESSION['user_error']="Mật khẩu không đúng";
				}

				echo "<script> $(document).ready(function(){
			alertify.error('$_SESSION[user_error]');
		});</script>";
				
			}
		}

 ?>
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập với tài khoản hiện có</h2>
						<form action="#" method="POST">
							<input type="text" placeholder="Tên đăng nhập" name="tendangnhap"/>
							<input placeholder="Mật khẩu" name="matkhau" type="password"/>
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default" name="dangnhap">Đăng nhập</button>
						</form>
						
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">Hoặc</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Tạo tài khoản mới!</h2>
						<form action="xuly_code/xuly_themtaikhoan.php" method="POST">
							<input type="text" placeholder="Họ tên"txtHoTen"/>
							<input type="text" placeholder="Tên đăng nhập" name="txtTenDangNhap"/>
							<input type="email" placeholder="Email" name="txtEmail"/>
							<input  placeholder="Số điện thoại" name="txtSoDienThoai"/>
							<input type="password" placeholder="Mật khẩu" name="txtMatKhau"/>
						
							<button type="submit" name="dangky" class="btn btn-default">Đăng ký</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
</section><!--/form-->
	