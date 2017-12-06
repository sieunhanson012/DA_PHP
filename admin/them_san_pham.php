<?php
if (isset($_SESSION["notify"])) {
	helper::onloadAlertDanger($_SESSION["notify"]);
	unset($_SESSION["notify"]);
}

// lấy dữ liệu
clsDataBase::openConnect();
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
			Thêm sản phẩm
		</div>
		<div class="panel-body">
			<form action="" id="frmThemHSX" method="POST">
				<div class="form-group">
					<label for="tenSP">Tên sản phẩm</label>
					<input type="text" class="form-control" id="tenSP" name="txtTenSP" placeholder="nhập tên hãng sản xuất" value=""  required >
				</div>
				<div class="form-group">
					<label for="hinhAnh">Hình ảnh</label>
					<div class="input-group image-preview">
						<input id="hinhAnh" type="text" class="form-control image-preview-filename" name="txtHinhAnh" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
						<span class="input-group-btn">
							<!-- image-preview-clear button -->
							<button type="button" class="btn btn-default image-preview-clear" style="display:none;">
							<span class="glyphicon glyphicon-remove"></span> Clear
							</button>
							<!-- image-preview-input -->
							<div class="btn btn-default image-preview-input">
								<span class="glyphicon glyphicon-folder-open"></span>
								<span class="image-preview-input-title">Browse</span>
								<input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/> <!-- rename it -->
							</div>
						</span>
						</div><!-- /input-group image-preview [TO HERE]-->
					</div>
					<div class="form-group">
						<label for="giaBan">Giá bán</label>
						<input type="text" class="form-control" id="giaBan" name="txtGiaBan" placeholder="nhập giá bán" value="" >
					</div>
					<div class="form-group">
						<label for="chatLieu">Chất liệu</label>
						<input type="text" class="form-control" id="chatLieu" name="txtChatLieu" placeholder="nhập chất liệu" value="" >
					</div>
					<div class="form-group">
						<label for="thongTin">Thông tin</label>
						<textarea name="thongTin" id="thongTin" class="form-control" rows="3" required="required"></textarea>
					</div>
					<div class="form-group">
						<label for="soLuong">Số lượng</label>
						<input type="text" class="form-control" id="soLuong" name="txtSoLuong" placeholder="nhập thông tin" value="" >
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label for="mauSac">Màu sắc</label><br>
								<select class="form-control" id="sltMauSac">
									<?php foreach ($dataMauSac as $rows): ?>
									<option value="<?=$rows["ma_mau"]?>"><?=$rows["ten_mau"]?></option>
									<?php endforeach?>
								</select>

								   <div class="checkbox">
							          <label style="padding-left: 0px;">
							            <input type="checkbox" id="ckbMauMoi" >
							            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
							            Màu mới
							          </label>
							        </div>
								<input type="text" class="form-control" id="txtMauMoi" name="txtMauMoi" placeholder="nhập màu sắc" value="" >
							</div>
							<div class="col-sm-6">
								<label for="">Kích cỡ</label><br>
								<select class="form-control" id="sltKichCo">
									<?php foreach ($dataKichCo as $rows): ?>
									<option value="<?=$rows["ma_kich_co"]?>"><?=$rows["kich_co"]?></option>
									<?php endforeach?>
								</select>
								<div class="checkbox">
							          <label style="padding-left: 0px;">
							            <input type="checkbox" id="chkKichThuocMoi">
							            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
							            Kích cỡ mới
							          </label>
							        </div>
								<input type="text" class="form-control" id="txtKichCoMoi" name="txtKichCoMoi" placeholder="nhập kích cỡ" value="" >
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label for="">Loại sản phẩm</label><br>
								<select class="form-control" id="sltLoaiSP">
									<?php foreach ($dataLoaiSP as $rows): ?>
									<option value="<?=$rows["ma_loai"]?>"><?=$rows["ten_loai"]?></option>
									<?php endforeach?>
								</select>
							</div>
							<div class="col-sm-6">
								<label for="">Hãng sản xuất</label><br>
								<select class="form-control" id="sltHSX">
									<?php foreach ($dataHSX as $rows): ?>
									<option value="<?=$rows["ma_hang_sx"]?>"><?=$rows["ten_hang_sx"]?></option>
									<?php endforeach?>

								</select>
							</div>
						</div>
					</div>
					<a class="btn btn-default" href="index.php?page=hang-san-xuat"><i class="fa fa-arrow-left"></i> Quay lại</a>
					<button class="btn btn-primary"><i class="fa fa-save"></i> Lưu hãng sản xuất</button>
				</form>
			</div>
		</div>
		<div class="result"></div>
	</div>
	<script>
		// ẩn input thêm màu mới
		$("#txtMauMoi").toggle(false);
		//click vào checkbox để hiện input
		$("#ckbMauMoi").click(function(){
			//hiện input
		    $("#txtMauMoi").toggle("slow","swing",this.checked)
		    //ẩn select
		    $("#sltMauSac").toggle("slow","swing",!this.checked)
		});

		// ẩn input thêm kích thước mới
		$("#txtKichCoMoi").toggle(false);
		//click vào checkbox để hiện input
		$("#chkKichThuocMoi").click(function(){
			//hiện input
		    $("#txtKichCoMoi").toggle("slow","swing",this.checked)
		    //ẩn select
		    $("#sltKichCo").toggle("slow","swing",!this.checked)
		});
	</script>
	<script>
	CKEDITOR.replace( 'editorThongTin' );


	</script>
