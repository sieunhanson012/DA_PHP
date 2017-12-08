<?php
//thông báo thành công
if (isset($_SESSION["notify"])) {
	helper::onloadAlertSuccess($_SESSION["notify"]);
	unset($_SESSION["notify"]);
}
clsDataBase::openConnect();
$data = clsHangSanXuat::layHangSanXuat();
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
                            <a href="index.php?page=them-hang-sx"><i class="fa fa-plus"></i> Thêm hãng sản xuất</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover" style="text-align:center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên hãng</th>
                                            <th>Ghi chú</th>
                                            <th>Ẩn/Hiện</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php foreach ($data as $keys => $rows): ?>
                                        <tr>
                                            <td><?=$keys?></td>
                                            <td><?=$rows["ten_hang_sx"]?></td>
                                            <td><?=$rows["ghi_chu"]?></td>
                                            <td><label class="switch">
<input type="checkbox" <?=($rows["trang_thai"] == 1) ? "checked" : ""?> id="ckbTrangThaiHSX<?=$rows["ma_hang_sx"]?>" onchange=trangThaiHSX(<?=$rows["ma_hang_sx"]?>,"<?=$rows["ten_hang_sx"]?>") >
                                            <span class="slider round"></span>
                                            </label></td>
                                            <td>
                                            <a href="index.php?page=sua-hang-sx&&id=<?=$rows["ma_hang_sx"]?>" id="btnEdit" class="btn btn-primary btn-circle fa fa-pencil"></a>
                                            </td>
                                        </tr>
                                    <?php endforeach?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="result"></div>
</div>
