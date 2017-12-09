<?php
?>
<div class="header">
    <h1 class="page-header">
        Thêm tài khoản
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="index.html">Trang chủ</a>
        </li>
        <li>
            <a href="#">Tables</a>
        </li>
        <li class="active">tài khoản</li>
    </ol>

</div>
<div id="page-inner">
    <div class="panel panel-default">
        <div class="panel-heading">
            Thêm tài khoản
        </div>
        <div class="panel-body">
            <form class="frmThemTaiKhoan" action="handle_php/h_add_account.php" method="post" id="frmThemTaiKhoan">
                <div class="form-group">
                    <label for="_tenDangNhap">Tên đăng nhập</label>
                    <input class="form-control" id="_tenDangNhap" name="txtTenDangNhap" placeholder="Tên đăng nhập"
                           required>
                </div>
                <div class="form-group">
                    <label for="_email">Email</label>
                    <input type="text" class="form-control" id="_email" name="txtEmail" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="_hoTen">Họ tên</label>
                    <input type="text" class="form-control" id="_hoTen" name="txtHoTen" placeholder="text" required>
                </div>
                <div class="form-group">
                    <label for="_matKhau">Mật khẩu</label>
                    <input type="password" class="form-control" id="_matKhau" name="txtMatKhau" placeholder="Mật khẩu"
                           required>
                </div>
                <div class="form-group">
                    <label for="_soDienThoai">Số điện thoại</label>
                    <input type="text" class="form-control" id="_soDienThoai" name="txtSoDienThoai"
                           placeholder="Số điện thoại" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Quyền</label>
                    <br>
                    <select name="txtQuyen" id="_quyen" class="form-control" required="required">
                        <option value="0">Admin</option>
                        <option value="1">User</option>
                    </select>
                </div>
                <a class="btn btn-default" href="index.php?page=tai-khoan"><i class="fa fa-arrow-left"></i> Quay
                    lại</a>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Thêm tài khoản</button>
            </form>
        </div>
    </div>
    <div class="result"></div>
</div>

