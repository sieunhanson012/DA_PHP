<?php
// lÃ¢Ì�y dÆ°Ìƒ liÃªÌ£u
clsDataBase::openConnect();
$dataMauSac = clsMauSac::layMauSac();
$dataKichCo = clsKichCo::layKichCo();
$dataLoaiSP = clsLoaiSanPham::layLoaiSanPham();
$dataHSX = clsHangSanXuat::layHangSanXuatTonTai();
clsDataBase::closeConnect();
?>
<div class="header">
    <h1 class="page-header">
    Thêm sản phẩm
    </h1>
    <ol class="breadcrumb">
    <li>
        <a href="index.html">Trang chủ</a>
    </li>
    <li>
        <a href="#">Tables</a>
    </li>
    <li class="active">sản phẩm</li>
</div>
<div id="page-inner">
    <div class="panel panel-default">
        <div class="panel-heading">
            Thêm sản phẩm
        </div>
        <div class="panel-body">
            <form action="handle_php/h_add_product.php" id="frmThemSP" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="tenSP">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="tenSP" name="txtTenSP"
                           placeholder="Nhập tên sản phẩm" value="" required>
                </div>
                <div class="form-group">
                    <label for="hinhAnh">Hình ảnh</label>
                    <img src="" alt="">
                    <div class="input-group image-preview">
                        <input id="hinhAnh" type="text" class="form-control image-preview-filename" name="txtHinhAnh"
                               disabled="disabled" required> <!-- don't give a name === doesn't send on POST/GET -->
                        <span class="input-group-btn">
							<!-- image-preview-clear button -->
							<button type="button" class="btn btn-default image-preview-clear" style="display:none;">
							<span class="glyphicon glyphicon-remove"></span> Hủy
							</button>
                            <!-- image-preview-input -->
							<div class="btn btn-default image-preview-input">
								<span class="glyphicon glyphicon-folder-open"></span>
								<span class="image-preview-input-title">Chọn hình</span>
								<input type="file" accept="image/png, image/jpeg, image/gif" name="txtImage" required/>
                                <!-- rename it -->
							</div>
							
						</span>
                    </div><!-- /input-group image-preview [TO HERE]-->
                </div>
                <div class="form-group">
                    <label for="giaBan">Giá bán</label>
                    <input type="number" class="form-control" id="giaBan" name="txtGiaBan" placeholder="Nhập giá bán"
                           value="" required>
                </div>
                <div class="form-group">
                    <label for="chatLieu">Chất liệu</label>
                    <input type="text" class="form-control" id="chatLieu" name="txtChatLieu"
                           placeholder="Nhập chất liệu" value="" required>
                </div>
                <div class="form-group">
                    <label for="thongTin">Thông tin sản phẩm</label>
                    <textarea name="txtThongTin" id="thongTin" class="form-control" rows="3"
                              required="required"></textarea>
                    <script>
                        CKEDITOR.replace('thongTin');
                    </script>
                </div>
                <div class="form-group">
                    <label for="soLuong">Số lượng</label>
                    <input type="number" class="form-control" id="soLuong" name="txtSoLuong"
                           placeholder="Nhập số lượng" value="" required>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="mauSac">Màu sắc</label><br>
                            <select class="form-control" id="sltMauSac" name="sltMauSac">
                                <?php foreach ($dataMauSac as $rows): ?>
                                    <option value="<?= $rows["ma_mau"] ?>"><?= $rows["ten_mau"] ?></option>
                                <?php endforeach ?>
                            </select>

                            <div class="checkbox">
                                <label style="padding-left: 0px;">
                                    <input type="checkbox" id="ckbMauMoi" name="ckbMauMoi">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    Màu mới
                                </label>
                            </div>
                            <input type="text" class="form-control" id="txtMauMoi" name="txtMauMoi"
                                   placeholder="Nhập màu mới" value="">
                        </div>
                        <div class="col-sm-6">
                            <label for="">Kích cỡ</label><br>
                            <select class="form-control" id="sltKichCo" name="sltKichCo">
                                <?php foreach ($dataKichCo as $rows): ?>
                                    <option value="<?= $rows["ma_kich_co"] ?>"><?= $rows["kich_co"] ?></option>
                                <?php endforeach ?>
                            </select>
                            <div class="checkbox">
                                <label style="padding-left: 0px;">
                                    <input type="checkbox" id="chkKichThuocMoi" name="chkKichThuocMoi">
                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    Kích cỡ mới
                                </label>
                            </div>
                            <input type="text" class="form-control" id="txtKichCoMoi" name="txtKichCoMoi"
                                   placeholder="Nhập kích cỡ mới" value="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="">Loại sản phẩm</label><br>
                            <select class="form-control" id="sltLoaiSP" name="sltLoai">
                                <?php foreach ($dataLoaiSP as $rows): ?>
                                    <option value="<?= $rows["ma_loai"] ?>"><?= $rows["ten_loai"] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="">Hãng sản xuất</label></label><br>
                            <select class="form-control" id="sltHSX" name="sltHSX">
                                <?php foreach ($dataHSX as $rows): ?>
                                    <option value="<?= $rows["ma_hang_sx"] ?>"><?= $rows["ten_hang_sx"] ?></option>
                                <?php endforeach ?>

                            </select>
                        </div>
                    </div>
                </div>
                <a class="btn btn-default" href="index.php?page=san-pham"><i class="fa fa-arrow-left"></i> Quay
                    Lại</a>
                <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu sản phẩm</button>
            </form>
        </div>
    </div>
    <div class="result"></div>
</div>
<script>
    // Ã¢Ì‰n input thÃªm maÌ€u mÆ¡Ì�i
    $("#txtMauMoi").toggle(false);
    //click vaÌ€o checkbox Ä‘ÃªÌ‰ hiÃªÌ£n input
    $("#ckbMauMoi").click(function () {
        //hiÃªÌ£n input
        $("#txtMauMoi").toggle("slow", "swing", this.checked)
        //Ã¢Ì‰n select
        $("#sltMauSac").toggle("slow", "swing", !this.checked)
    });

    // Ã¢Ì‰n input thÃªm kiÌ�ch thÆ°Æ¡Ì�c mÆ¡Ì�i
    $("#txtKichCoMoi").toggle(false);
    //click vaÌ€o checkbox Ä‘ÃªÌ‰ hiÃªÌ£n input
    $("#chkKichThuocMoi").click(function () {
        //hiÃªÌ£n input
        $("#txtKichCoMoi").toggle("slow", "swing", this.checked)
        //Ã¢Ì‰n select
        $("#sltKichCo").toggle("slow", "swing", !this.checked)
    });
</script>

