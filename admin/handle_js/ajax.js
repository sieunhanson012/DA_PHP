/*
    Khóa tài khoản trang tai_khoan
*/
function trangThaiTaiKhoan(id) {
    name = document.getElementById("ckbTrangThaiTK" + id).value;
    if (document.getElementById("ckbTrangThaiTK" + id).checked == true) {
        $.post(
            "handle_php/ajax_status_account.php", {
                ma_tai_khoan: id,
                ac: "lock",
                ten_tai_khoan: name
            },
            function (data) {
                $(".result").html(data);
            });
    } else {
        $.post(
            "handle_php/ajax_status_account.php", {
                ma_tai_khoan: id,
                ac: "unlock",
                ten_tai_khoan: name
            },
            function (data) {
                $(".result").html(data);
            });
    }
}


/*
    Sửa tài khoản trang sua_tai_khoan
    POST: maTK, hoTen, matKhau, soDienThoai, quyen
*/
$('#submit-edit-account').click(function (e) {
    $.confirm({
        icon: 'glyphicon glyphicon-edit',
        title: 'Thông báo',
        content: 'Bạn có muốn lưu không?',
        type: 'green',
        typeAnimated: true,
        buttons: {
            Yes: {
                text: 'Đồng ý',
                btnClass: 'btn-success',
                action: function () {
                    $.post("handle_php/ajax_edit_account.php", {
                            maTK: $('#_maTK').val(),
                            hoTen: $('#_hoTen').val(),
                            tenDangNhap: $('#_tenDangNhap').val(),
                            matKhau: $('#_matKhau').val(),
                            soDienThoai: $('#_soDienThoai').val(),
                            quyen: $('#_quyen').val()
                        },
                        function (data) {
                            $(".result").html(data);
                        });
                }
            },
            Close: {
                text: "Quay lại",
                close: function () {
                }
            }
        }
    });
});


/*
    Sản phẩm hot
*/
function sanPhamHot(id) {
    if (document.getElementById("ckbSanPhamHot" + id).checked == true) {
        $.post(
            "handle_php/ajax_status_product.php", {
                ma_san_pham: id,
                ten_san_pham: name,
                ac: "hot"
            },
            function (data) {
                $(".result").html(data);
            });
    } else {
        $.post(
            "handle_php/ajax_status_product.php", {
                ma_san_pham: id,
                ten_san_pham: name,
                ac: "normal"
            },
            function (data) {
                $(".result").html(data);
            });
    }
}

/*
    Trạng thái sản phẩm
*/
function trangThaiSanPham(id) {
    name = document.getElementById("ckbTrangThaiSP" + id).value;
    if (document.getElementById("ckbTrangThaiSP" + id).checked == true) {
        $.post(
            "handle_php/ajax_status_product.php", {
                ma_san_pham: id,
                ten_san_pham: name,
                ac: "visible"
            },
            function (data) {
                $(".result").html(data);
            });
    } else {
        $.post(
            "handle_php/ajax_status_product.php", {
                ma_san_pham: id,
                ten_san_pham: name,
                ac: "invisible"
            },
            function (data) {
                $(".result").html(data);
            });
    }
}


/*
    Trạng thái hsx
    lấy qua từng id của input + id của hãng sx
*/
function trangThaiHSX(id) {
    name = document.getElementById("ckbTrangThaiHSX" + id).value;
    if (document.getElementById("ckbTrangThaiHSX" + id).checked == true) {
        $.post(
            "handle_php/ajax_status_hsx.php", {
                ma_hsx: id,
                ten_hsx: name,
                ac: "visible"
            },
            function (data) {
                $(".result").html(data);
            });
    } else {
        $.post(
            "handle_php/ajax_status_hsx.php", {
                ma_hsx: id,
                ten_hsx: name,
                ac: "invisible"
            },
            function (data) {
                $(".result").html(data);
            });
    }
}

/*
    Sửa hãng sản xuất
    POST: maHSX, tenHSX, ghiChu
*/
$('#submit-edit-hsx').click(function (e) {
    $.confirm({
        icon: 'glyphicon glyphicon-edit',
        title: 'Thông báo',
        content: 'Bạn có muốn lưu không?',
        type: 'green',
        typeAnimated: true,
        buttons: {
            Yes: {
                text: 'Đồng ý',
                btnClass: 'btn-success',
                action: function () {
                    $.post("handle_php/ajax_edit_hsx.php", {
                            maHSX: $('#_maHSX').val(),
                            tenHSX: $('#_tenHSX').val(),
                            ghiChu: $('#_ghiChu').val(),
                        },
                        function (data) {
                            $(".result").html(data);
                        });
                }
            },
            Close: {
                text: "Quay lại",
                close: function () {
                }
            }
        }
    });
});

/*
    Trạng thái loai
    lấy qua từng id của input + id của loai
*/
function trangThaiLoaiSP(id) {
    name = document.getElementById("chkTrangThaiLoai" + id).value;
    if (document.getElementById("chkTrangThaiLoai" + id).checked == true) {
        $.post(
            "handle_php/ajax_status_loai.php", {
                ma_loai: id,
                ten_loai: name,
                ac: "visible"
            },
            function (data) {
                $(".result").html(data);
            });
    } else {
        $.post(
            "handle_php/ajax_status_loai.php", {
                ma_loai: id,
                ten_loai: name,
                ac: "invisible"
            },
            function (data) {
                $(".result").html(data);
            });
    }
}

/**
 * Sửa loại sản phẩm
 */


$('#submit-edit-loai').click(function (e) {
    $.confirm({
        icon: 'glyphicon glyphicon-edit',
        title: 'Thông báo',
        content: 'Bạn có muốn lưu không?',
        type: 'green',
        typeAnimated: true,
        buttons: {
            Yes: {
                text: 'Đồng ý',
                btnClass: 'btn-success',
                action: function () {
                    $.post("handle_php/ajax_edit_loai.php", {
                            maLoai: $('#maLoai').val(),
                            tenLoai: $('#tenLoai').val(),
                        },
                        function (data) {
                            $(".result").html(data);
                        });
                }
            },
            Close: {
                text: "Quay lại",
                close: function () {
                }
            }
        }
    });
});


/*
    Trạng thái QC
    lấy qua từng id của input + id của loai
*/
function trangThaiQC(id) {

    if (document.getElementById("chkTrangThaiQC" + id).checked == true) {
        $.post(
            "handle_php/ajax_status_qc.php", {
                maQC: id,
                ac: "visible"
            },
            function (data) {
                $(".result").html(data);
            });
    } else {
        $.post(
            "handle_php/ajax_status_qc.php", {
                maQC: id,
                ac: "invisible"
            },
            function (data) {
                $(".result").html(data);
            });
    }
}

// Sửa hóa đơn 
$('#btnLuuThongTin').click(function(){
    $.confirm({
    icon: 'glyphicon glyphicon-edit',
    title: 'Thông báo',
    content: 'Bạn có muốn lưu không?',
    type: 'green',
    typeAnimated: true,
    buttons: {
        Yes: {
            text: 'Đồng ý',
            btnClass: 'btn-success',
            action: function () {
                $.post("handle_php/ajax_edit_hoadon.php", {
                        maHD: $('#txtMaHD').val(),
                        tenKH: $('#txtTenKhachHang').val(),
                        diaChi: $('#txtDiaChi').val(),
                        sdt: $('#txtSDT').val(),
                    },
                    function (data) {
                        $(".result").html(data);
                    });
            }
        },
        Close: {
            text: "Quay lại",
            close: function () {
            }
        }
    }
});
});

//hủy đơn hàng
$('#btnHuyHD').click(function(){
    $.confirm({
icon: 'glyphicon glyphicon-edit',
title: 'Thông báo',
content: 'Bạn có chắc không?',
type: 'red',
typeAnimated: true,
buttons: {
    Yes: {
        text: 'Đồng ý',
        btnClass: 'btn-danger',
        action: function () {
            $.post("handle_php/ajax_status_hoadon.php", {
                    maHD: $('#txtMaHD').val(),
                    ac:"del"
                },
                function (data) {
                    $(".result").html(data);
                });
        }
    },
    Close: {
        text: "Quay lại",
        close: function () {
        }
    }
}
});
})

// xác nhận đơn hàng
$("#btnXacNhan").click(function(){
    $.post("handle_php/ajax_status_hoadon.php", {
                maHD: $('#txtMaHD').val(),
                ac:"check"
            },
            function (data) {
                $(".result").html(data);
            });
})
