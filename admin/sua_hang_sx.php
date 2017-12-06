<?php

if (!empty($_REQUEST["id"])) {
	$maHSX = $_REQUEST["id"];
} else {
	die("404");
}
clsDataBase::openConnect();
$data = clsHangSanXuat::layHangSanXuatTheoMa($maHSX);
clsDataBase::closeConnect();

?>
<div class="header">
    <h1 class="page-header">
        Tables Page
        <small>Responsive tables</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Tables</a>
        </li>
        <li class="active">Data</li>
    </ol>

</div>
<div id="page-inner">
    <div class="panel panel-default">
        <div class="panel-heading">
            Sửa hãng sản xuất
        </div>
        <div class="panel-body">
            	<input type="hidden" id="_MaHSX" value="<?= $data["ma_hang_sx"] ?>">
                <div class="form-group">
                    <label for="_TenHSX">Tên hãng sản xuất</label>
                    <input type="text" class="form-control" id="_TenHSX" name="txtTenHSX" placeholder="Tên hãng sản xuất" value="<?= $data["ten_hang_sx"]?>"  >
                </div>
                <div class="form-group">
                    <label for="_GhiChu">Ghi chú</label>
                    <input type="text" class="form-control" id="_GhiChu" name="txtGhiChu" placeholder="Ghi chú" value="<?= $data["ghi_chu"]?>" >
                </div>
                <a class="btn btn-default" href="index.php?page=hang-san-xuat"><i class="fa fa-arrow-left"></i> Quay lại</a>
                <a   id="submit-edit-hsx" class="btn btn-primary"><i class="fa fa-save"></i> Lưu hãng sản xuất</a>
        </div>
    </div>
    <div class="result"></div>
</div>


