
    /*
        Validate form them tai khoan
    */
        //khai báo
    $("frmThemTaiKhoan").validate();

    //thông báo reg
    $.validator.addMethod("regx", function (value, element, regexpr) {
        return regexpr.test(value);
    }, "Không được có kí tự đặc biệt");

    $("#frmThemTaiKhoan").validate({
        //Validate
        rules: {
            // simple rule, converted to {required:true}
            txtHoTen: {
                required: true,
            },
            // compound rule
            txtEmail: {
                required: true,
                email: true
            },
            txtMatKhau: {
                required: true,
                regx: /^([\w]+)$/,
                minlength: 6,
                maxlength: 26
            },
            txtSoDienThoai: {
                required: true,
                minlength: 6,
                digits: true
            },
            txtTenDangNhap: {
                required: true,
                regx: /^([\w]+)$/
            }
        },
        //Message
        messages: {
            txtHoTen: {
                required: "Tên không được bỏ trống",
                minlength: "Tên có ít nhất 6 kí tự"
            },
            txtEmail: {
                required: "Email không được bỏ trống",
                email: "Email không đúng định dạng"
            },
            txtMatKhau: {
                required: "Mật khẩu không được bỏ trống",
                minlength: "Mật khẩu ít nhất 6 kí tự",
                maxlength: "Mật khẩu tối đa 26 kí tự"
            },
            txtSoDienThoai: {
                required: "Số điện thoại không được bỏ trống",
                minlength: "Vui lòng nhập đúng số điện thoại",
                digits: "Số điện thoại không đúng định dạng"
            },
            txtTenDangNhap: {
                required: "Tên đăng nhập không được để trống",
            }
        },
    });


    /*
        Validate form them hang san xuat
    */
    $("frmThemHSX").validate();
    $("#frmThemHSX").validate({
        //Validate
        rules: {
            // simple rule, converted to {required:true}
            txtTenHSX: {
                required: true,
            },
        },
        //Message
        messages: {
            txtTenHSX: {
                required: "Tên hãng không được bỏ trống",
            },
        },
    });

    /**
     *  Validate form sửa sản phẩm
     */
    $("frmSuaSP").validate();
    $("#frmSuaSP").validate({
        //Validate
        rules: {
            // simple rule, converted to {required:true}
            txtTenSP: {
                required: true,
            },
            txtGiaBan:{
                required: true,
                number:true,
                digits:true
            },
            txtChatLieu:{
                required: true,
            },
            txtThongTin:{
                required: true,
            },
            txtSoLuong:{
                required: true,
                number:true,
                digits:true
            }
        },
        //Message
        messages: {
            txtTenSP: {
                required: "Tên hãng không được bỏ trống",
            },
            txtGiaBan:{
                required: "Giá bán không được bỏ trống",
                number: "Vui lòng nhập số",
                digits:   "Vui lòng chỉ nhập vào số"
            },
            txtChatLieu:{
                required: "Chất liệu không được bỏ trống",
            },
            txtThongTin:{
                required: "Thông tin không được bỏ trống",
            },
            txtSoLuong:{
                required: "Số lượng không được bỏ trống",
                number: "Vui lòng nhập số",
                digits: "Vui lòng chỉ nhập vào số"
            }
        },
    });

    /**
     *  Validate form thêm sản phẩm
     */
    $("frmThemSP").validate();
    $("#frmThemSP").validate({
        //Validate
        rules: {
            // simple rule, converted to {required:true}
            txtTenSP: {
                required: true,
            },
            txtImage:{
                required: true,
            },
            txtGiaBan:{
                required: true,
                number:true,
                digits:true
            },
            txtChatLieu:{
                required: true,
            },
            txtThongTin:{
                required: true,
            },
            txtSoLuong:{
                required: true,
                number:true,
                digits:true
            }
        },
        //Message
        messages: {
            txtTenSP: {
                required: "Tên hãng không được bỏ trống",
            },
            txtImage:{
                required: "Vui lòng chọn hình ảnh",
            },
            txtGiaBan:{
                required: "Giá bán không được bỏ trống",
                number: "Vui lòng nhập số",
                digits:   "Vui lòng chỉ nhập vào số"
            },
            txtChatLieu:{
                required: "Chất liệu không được bỏ trống",
            },
            txtThongTin:{
                required: "Thông tin không được bỏ trống",
            },
            txtSoLuong:{
                required: "Số lượng không được bỏ trống",
                number: "Vui lòng nhập số",
                digits: "Vui lòng chỉ nhập vào số"
            }
        },
    });


    /*
        Validate form them loai sp
    */
    $("frmThemLoaiSP").validate();
    $("#frmThemLoaiSP").validate({
        //Validate
        rules: {
            // simple rule, converted to {required:true}
            txtTenLoai: {
                required: true,
            },
        },
        //Message
        messages: {
            txtTenLoai: {
                required: "Tên loại không được bỏ trống",
            },
        },
    });


    // validate form thêm quảng cáo
    $("frmThemQC").validate();
    $("#frmThemQC").validate({
        //Validate
        rules: {
            // simple rule, converted to {required:true}
            txtHinhAnh: {
                required: true,
            },
        },
        //Message
        messages: {
            txtHinhAnh: {
                required: "Vui lòng chọn hình ảnh",
            },
        },
    });