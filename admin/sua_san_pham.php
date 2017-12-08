<?php
if (isset($_SESSION["notify"])) {
    helper::onloadAlertDanger($_SESSION["notify"]);
    unset($_SESSION["notify"]);
}
if(isset($_GET["id"])){
    $maSP = $_GET["id"];
}else{
    die('404');
}
clsDataBase::openConnect();
$dataSanPham = clsSanPham::layBangSanPhamTheoMa($maSP);
$dataMauSac = clsMauSac::layMauSac();
$dataKichCo = clsKichCo::layKichCo();
$dataLoaiSP = clsLoaiSanPham::layLoaiSanPham();
$dataHSX = clsHangSanXuat::layHangSanXuatTonTai();
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
            Sửa sản phẩm
        </div>
        <div class="panel-body">
            <form action="handle_php/h_edit_product.php" id="frmSuaSP" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="txtMaSP" value="<?= $dataSanPham["ma_san_pham"] ?>">
                <div class="form-group">
                    <label for="_TenHSX">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="tenSP" name="txtTenSP" placeholder="nhập tên hãng sản xuất" value="<?= $dataSanPham["ten_san_pham"] ?>"  required >
                </div>
                <div class="form-group">
                    <label for="_GhiChu">Hình ảnh</label>
                    <br>
                    <img src="../images/<?= $dataSanPham['hinh_anh'] ?>" alt="" width="300px" height="300px">
                    <div class="input-group image-preview">
                        <input type="text" id="hinhAnh" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                        <span class="input-group-btn">
							<!-- image-preview-clear button -->
							<button type="button" class="btn btn-default image-preview-clear" style="display:none;">
							<span class="glyphicon glyphicon-remove"></span> Clear
							</button>
                            <!-- image-preview-input -->
							<div class="btn btn-default image-preview-input">
								<span class="glyphicon glyphicon-folder-open"></span>
								<span class="image-preview-input-title">Browse</span>
								<input type="file" accept="image/png, image/jpeg, image/gif" value="" name="txtImage"  /> <!-- rename it -->
                                <input type="hidden" value="<?= $dataSanPham["hinh_anh"] ?>" name ="txtHinhAnhCu"  >
                            </div>
						</span>
                    </div><!-- /input-group image-preview [TO HERE]-->
                </div>
                <div class="form-group">
                    <label for="_GiaBan">Giá bán</label>
                    <input type="text" class="form-control" id="giaBan" name="txtGiaBan" placeholder="nhập giá bán" value="<?= $dataSanPham["gia_ban"] ?>" >
                </div>
                <div class="form-group">
                    <label for="_ChatLieu">Chất liệu</label>
                    <input type="text" class="form-control" id="chatLieu" name="txtChatLieu" placeholder="nhập chất liệu" value="<?= $dataSanPham["chat_lieu"] ?>" >
                </div>
                <div class="form-group">
                    <label for="_GhiChu">Thông tin</label>
                    <textarea name="txtThongTin" id="editorThongTin" class="form-control" rows="3" required="required"><?= $dataSanPham["thong_tin"] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="_SoLuong">Số lượng</label>
                    <input type="number" class="form-control" id="soLuong" name="txtSoLuong" placeholder="nhập thông tin" value="<?= $dataSanPham["so_luong"] ?>" >
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="_GhiChu">Màu sắc</label><br>
                            <select class="form-control" id="sltMauSac" name="sltMauSac">
                                <?php foreach ($dataMauSac as $rows): ?>
                                    <option value="<?= $rows["ma_mau"] ?>" <?=($rows["ma_mau"]==$dataSanPham["ma_mau"])? "selected" : ""?> ><?= $rows["ten_mau"] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="_GhiChu">Kích cỡ</label><br>
                            <select class="form-control" id="sltKichCo" name="sltKichCo">
                                <?php foreach ($dataKichCo as $rows): ?>
                                    <option value="<?= $rows["ma_kich_co"] ?>" <?=($rows["ma_kich_co"]==$dataSanPham["ma_kich_co"])? "selected" : ""?> ><?= $rows["kich_co"] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="_GhiChu">Loại sản phẩm</label><br>
                            <select class="form-control" id="sltLoaiSP" name="sltLoai">
                                <?php foreach ($dataLoaiSP as $rows): ?>
                                    <option value="<?= $rows["ma_loai"] ?>"><?= $rows["ten_loai"] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="_GhiChu">Hãng sản xuất</label><br>
                            <select class="form-control" id="sltHSX" name="sltHSX">
                                <?php foreach ($dataHSX as $rows): ?>
                                    <option value="<?= $rows["ma_hang_sx"] ?>"><?= $rows["ten_hang_sx"] ?></option>
                                <?php endforeach ?>

                            </select>
                        </div>
                    </div>
                </div>
                <a class="btn btn-default" href="index.php?page=san-pham"><i class="fa fa-arrow-left"></i> Quay lại</a>
                <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu sản phẩm</button>
            </form>
        </div>
    </div>
    <div class="result"></div>
</div>
<script>
    CKEDITOR.replace( 'editorThongTin' );
</script>
