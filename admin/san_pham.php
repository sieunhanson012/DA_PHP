<?php
clsDataBase::openConnect();
$data = clsSanPham::layBangSangPham();
clsDataBase::closeConnect();
?>
<div class="header">
    <h1 class="page-header">
    Sản phẩm
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
            <a href="index.php?page=them-san-pham"><i class="fa fa-plus"></i> Thêm sản phẩm</a>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover" style="text-align:center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Giá bán</th>
                            <th>Kích cỡ</th>
                            <th>Màu sắc</th>
                            <th>Hãng sản xuất</th>
                            <th>Số lượng</th>
                            <th>Sản phẩm hot</th>
                            <th>Ẩn/Hiện</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $keys => $rows): ?>
                        <tr>
                            <td><?=$keys;?></td>
                            <td><?=$rows["ten_san_pham"]?></td>
                            <td><?=$rows["hinh_anh"]?></td>
                            <td><?=$rows["gia_ban"]?></td>
                            <td><?=$rows["kich_co"]?></td>
                            <td><?=$rows["ten_mau"]?></td>
                            <td><?=$rows["ten_hang_sx"]?></td>
                            <td><?=$rows["so_luong"]?></td>
                            <td><label class="switch">
                                <input type="checkbox" id="ckbSanPhamHot<?=$rows["ma_san_pham"]?>" <?=($rows["san_pham_hot"] == 1) ? 'checked' : ""?> onchange=sanPhamHot(<?=$rows["ma_san_pham"]?>) >
                                <span class="slider round"></span>
                            </label></td>
                            <td><label class="switch">
                                <input type="checkbox" id="ckbTrangThaiSP<?=$rows["ma_san_pham"]?>"  <?=($rows["trang_thai"] == 1) ? 'checked' : ""?> onchange= trangThaiSanPham(<?=$rows["ma_san_pham"]?>) value="<?=$rows["ten_san_pham"]?>" >
                                <span class="slider round"></span>
                            </label></td>
                            <td>
                                <a href="index.php?page=sua-san-pham&&id=<?=$rows["ma_san_pham"]?>" id="btnEdit" class="btn btn-primary btn-circle fa fa-pencil"></a>
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
<script>
</script>
