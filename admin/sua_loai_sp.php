<?php

if (!empty($_REQUEST["id"])) {
    $maHSX = $_REQUEST["id"];
} else {
    die("404");
}
clsDataBase::openConnect();
$data = clsLoaiSanPham::layLoaiSanPhamTheoMa($maHSX);
clsDataBase::closeConnect();

?>
<div class="header">
        <h1 class="page-header">
        Sửa loại sản phẩm
        </h1>
        <ol class="breadcrumb">
        <li>
            <a href="index.html">Trang chủ</a>
        </li>
        <li>
            <a href="#">Tables</a>
        </li>
        <li class="active">loại sản phẩm</li>
        </ol>

</div>
<div id="page-inner">
    <div class="panel panel-default">
        <div class="panel-heading">
            Sửa loại sản phẩm
        </div>
        <div class="panel-body">
            <input type="hidden" id="maLoai" value="<?= $data["ma_loai"] ?>">
            <div class="form-group">
                <label for="_TenHSX">Tên loại</label>
                <input type="text" class="form-control" id="tenLoai" name="txtTenHSX" placeholder="Tên hãng sản xuất"
                       value="<?= $data["ten_loai"] ?>">
            </div>
            <a class="btn btn-default" href="index.php?page=loai-san-pham"><i class="fa fa-arrow-left"></i> Quay
                lại</a>
            <a id="submit-edit-loai" class="btn btn-primary"><i class="fa fa-save"></i> Lưu loại sản phẩm</a>
        </div>
    </div>
    <div class="result"></div>
</div>


