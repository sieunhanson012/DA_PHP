<?php

clsDataBase::openConnect();
$data = clsLoaiSanPham::layTatCaLoaiSanPham();
clsDataBase::closeConnect();

?>
<div class="header">
    <h1 class="page-header">
        Bảng loại sản phẩm
    </h1>
    <ol class="breadcrumb">
    <li>
    <a href="index.php">Trang chủ</a>
</li>
<li>
    <a href="#">Bảng dữ liệu</a>
</li>
<li class="active">Loại sản phẩm</li>
    </ol>

</div>
<div id="page-inner">
    <div class="panel panel-default">
        <div class="panel-heading">

            <form action="handle_php/h_add_loai.php" method="POST" role="form" id="frmThemLoaiSP">
                <legend>Thêm loại sản phẩm</legend>
                <div class="form-group">
                    <label for="">Tên loại</label>
                    <input type="text" name="txtTenLoai" class="form-control" id="" placeholder="Nhập tên loại"
                           required>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu loại sản phẩm</button>
            </form>

        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover" id="tableLoaiSP" style="text-align:center">
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
                        <tr
                        <?= ($rows["trang_thai"] == 0) ? 'class="danger"' : ''; ?>
                            <?= ($rows["ten_loai"] == $focus) ? 'class="success"' : ""; ?>
                        >
                            <td><?= $key ?></td>
                            <td><?= $rows["ten_loai"] ?></td>
                            <td><label class="switch">
                                    <input type="checkbox" <?= ($rows["trang_thai"] == 1) ? "checked" : "" ?>
                                           id="chkTrangThaiLoai<?= $rows["ma_loai"] ?>"
                                           onchange=trangThaiLoaiSP(<?= $rows["ma_loai"] ?>)
                                           value="<?= $rows["ten_loai"] ?>">
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