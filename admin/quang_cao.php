<?php
//thông báo thành công
if (isset($_SESSION["notify"])) {
    helper::onloadAlertSuccess($_SESSION["notify"]);
    unset($_SESSION["notify"]);
}
//thông báo thất bại
if (isset($_SESSION["notify-fail"])) {
    helper::onloadAlertDanger($_SESSION["notify-fail"]);
    unset($_SESSION["notify-fail"]);
}
clsDataBase::openConnect();

$data = clsQuangCao::layBangQuangCao();

clsDataBase::closeConnect();
?>
<div class="header">
    <h1 class="page-header">
        Bảng quảng cáo
    </h1>
    <ol class="breadcrumb">
    <li>
    <a href="index.php">Trang chủ</a>
</li>
<li>
    <a href="#">Bảng dữ liệu</a>
</li>
<li class="active">Quảng cáo</li>
    </ol>

</div>
<div id="page-inner">
    <div class="panel panel-default">
        <div class="panel-heading">
            <form action="handle_php/h_add_qc.php" id="frmThemQC" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="_TenHSX">Thêm quảng cáo mới</label>
                    <div class="input-group image-preview">
                        <input type="text" id="hinhAnh" class="form-control image-preview-filename" disabled="disabled">
                        <!-- don't give a name === doesn't send on POST/GET -->
                        <span class="input-group-btn">
                                <!-- image-preview-clear button -->
                                <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                    <span class="glyphicon glyphicon-remove"></span> Hủy
                                </button>
                            <!-- image-preview-input -->
                                <div class="btn btn-default image-preview-input">
                                    <span class="glyphicon glyphicon-folder-open"></span>
                                    <span class="image-preview-input-title">Chọn hình</span>
                                    <input type="file" accept="image/png, image/jpeg, image/gif" value=""
                                           name="txtHinhAnh"/>
                                    <!-- rename it -->
                                </div>
                            </span>
                    </div>
                    <!-- /input-group image-preview [TO HERE]-->
                </div>
                <button class="btn btn-primary">
                    <i class="fa fa-save"></i> Lưu quảng cáo
                </button>
            </form>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover" id="tableQuangCao" style="text-align:center">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Hình ảnh</th>
                        <th>Ẩn/Hiện</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $key => $rows): ?>
                        <tr>
                            <td>
                                <?= $key ?>
                            </td>
                            <td>
                                <img src="../images/<?= $rows["hinh_anh"] ?>" alt="" width="400px" heigh="400px">
                            </td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox" <?= ($rows["trang_thai"] == 1) ? "checked" : "" ?>
                                           id="chkTrangThaiQC<?= $rows["ma_quang_cao"] ?>"
                                           onchange=trangThaiQC(<?= $rows["ma_quang_cao"] ?>)>
                                    <span class="slider round"></span>
                                </label>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="result"></div>
    </div>
</div>

