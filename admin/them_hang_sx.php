<?php
if (isset($_SESSION["notify"])) {
	helper::onloadAlertDanger($_SESSION["notify"]);
	unset($_SESSION["notify"]);
}
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
            Thêm hãng sản xuất
        </div>
        <div class="panel-body">
        	<form action="handle_php/h_add_hsx.php" id="frmThemHSX" method="POST">
                <div class="form-group">
                    <label for="_TenHSX">Tên hãng sản xuất</label>
                    <input type="text" class="form-control" id="_TenHSX" name="txtTenHSX" placeholder="Tên hãng sản xuất" value=""  required >
                </div>
                <div class="form-group">
                    <label for="_GhiChu">Ghi chú</label>
                    <input type="text" class="form-control" id="_GhiChu" name="txtGhiChu" placeholder="Ghi chú" value="" >
                </div>
                <a class="btn btn-default" href="index.php?page=hang-san-xuat"><i class="fa fa-arrow-left"></i> Quay lại</a>
                <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu hãng sản xuất</button>
              </form>
        </div>
    </div>
    <div class="result"></div>
</div>


