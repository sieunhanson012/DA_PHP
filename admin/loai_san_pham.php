<?php
//thông báo thành công
if (isset($_SESSION["notify-success"])) {
	helper::onloadAlertSuccess($_SESSION["notify-success"]);
	unset($_SESSION["notify-success"]);
}
//thông báo thất bại
if (isset($_SESSION["notify-fail"])) {
	helper::onloadAlertDanger($_SESSION["notify-fail"]);
	unset($_SESSION["notify-fail"]);
}
clsDataBase::openConnect();
$data = clsLoaiSanPham::layTatCaLoaiSanPham();
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
                            
                            <form action="handle_php/h_add_loai.php" method="POST" role="form" id="frmThemLoaiSP">
                                <legend>Thêm loại sản phẩm</legend>
                                <div class="form-group">
                                    <label for="">Tên loại</label>
                                    <input type="text" name="txtTenLoai" class="form-control" id="" placeholder="Nhập tên loại" required>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu loại sản phẩm</button>
                            </form>
                            
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover" style="text-align:center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Họ tên</th>
                                            <th>Ẩn/Hiện</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($data as $key => $rows): ?>
                                        <tr>
                                            <td><?= $key?></td>
                                            <td><?= $rows["ten_loai"] ?></td>
                                            <td><label class="switch">
                                            <input type="checkbox" <?=($rows["trang_thai"] == 1) ? "checked" : ""?> 
                                            id="chkTrangThaiLoai<?=$rows["ma_loai"]?>" 
                                            onchange=trangThaiLoaiSP(<?=$rows["ma_loai"]?>) value="<?=$rows["ten_loai"]?>" >
                                            <span class="slider round"></span></td>
                                            <td>
                                            <a href="index.php?page=sua-loai-san-pham&&id=<?= $rows["ma_loai"] ?>" id="btnEdit"
                                                class="btn btn-primary btn-circle fa fa-pencil"></a>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="result"></div>
</div>

<script>
</script>