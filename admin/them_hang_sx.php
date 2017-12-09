<?php
?>
<div class="header">
    <h1 class="page-header">
    Thêm hãng sản xuất
    </h1>
    <ol class="breadcrumb">
    <li>
        <a href="index.html">Trang chủ</a>
    </li>
    <li>
        <a href="#">Tables</a>
    </li>
    <li class="active">hãng sản xuất</li>
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
                    <input type="text" class="form-control" id="_TenHSX" name="txtTenHSX"
                           placeholder="Tên hãng sản xuất" value="" required>
                </div>
                <div class="form-group">
                    <label for="_GhiChu">Ghi chú</label>

                    <textarea name="txtGhiChu" id="ghiChu" class="form-control" rows="3"></textarea>
                </div>
                <a class="btn btn-default" href="index.php?page=hang-san-xuat"><i class="fa fa-arrow-left"></i> Quay
                    lại</a>
                <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu hãng sản xuất</button>
            </form>
        </div>
    </div>
    <div class="result"></div>
</div>


