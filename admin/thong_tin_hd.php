<?php
if(!isset($_GET["id"]))
    die('404');
$maHD = $_GET["id"];
clsDataBase::openConnect();
$data = clsHoaDon::layHoaDonTheoMa($maHD);
$dataChiTiet= clsChiTietHoaDon::layChiTietHDTheoMa($maHD);
clsDataBase::closeConnect();
?>
<div class="header">
    <h1 class="page-header">
        Thông tin hóa đơn
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="index.html">Trang chủ</a>
        </li>
        <li>
            <a href="#">Tables</a>
        </li>
        <li class="active">hóa đơn</li>
    </ol>

</div>
<div id="page-inner">
<div class="panel panel-default">
    <div class="panel-heading">Chi tiết hóa đơn</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <div class="title">
                            <h3>Thông tin khách hàng</h3>
                        </div><br>                                        
                        <form role="form">
                        <input type="hidden" id="txtMaHD" value="<?= $data["ma_hoa_don"] ?>">
                            <div class="form-group">
                                <label for="">Họ tên</label>
                                <input type="text" class="form-control" id="txtTenKhachHang" value="<?= $data["ten_khach_hang"]?>" disabled >
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ</label>
                                <input type="text" class="form-control" id="txtDiaChi" value="<?= $data["dia_chi"]?>" disabled >
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="number" class="form-control" id="txtSDT" value="0<?= $data["so_dien_thoai"]?>" disabled  >
                            </div>
                            <a id="btnSuaThongTin" class="btn btn-default"><i class="fa fa-pencil"></i> Sửa thông tin</a>
                            <a id="btnHuy" class="btn btn-danger"><i class="fa fa-times" ></i> Hủy</a>
                            <a id="btnLuuThongTin" type="submit" class=" btn btn-primary"><i class="fa fa-check"></i> Lưu thông tin</a>
                        </form>
                    </div>
                    <div class="col-sm-6">
                        <div class="title">
                            <h3>Thông tin hóa đơn</h3>
                        </div><br>
                        <h4><strong>Ngày đặt hàng: </strong><?= date("d-m-Y",strtotime($data["ngay_tao"])) ?></h4><br>
                        <h4><strong>Số lượng: </strong><?= $data["tong_so_luong"] ?></h4><br>
                        <h4><strong>Tổng tiền: </strong><?=number_format($data["tong_tien"]) ?> VND</h4><br>
                        <h4><strong>Tình trạng: </strong>
                            <?php if($data["tinh_trang"]==1):?>
                            <span class="label label-success"><i class="fa fa-check"></i> Đã xử lí</span>
                            <?php elseif($data["tinh_trang"]==0):?>
                            <span class="label label-warning"><i class="fa fa-exclamation-circle"></i> Đang chờ</span>
                            <?php else: ?>
                            <span class="label label-danger"><i class="fa fa-trash-o"></i> Đã hủy</span>
                            <?php endif ?>
                        </h4><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="title">
                        <h3>Thông tin đặt hàng</h3>
                    </div><br>
                    <div class="table-responsive">
                                <table class="table table-hover" style="text-align:center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng mua</th>
                                            <th>Đơn giá</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($dataChiTiet as $key => $row): ?>
                                        <tr>
                                            <td><?= $key ?></td>
                                            <td><?= $row["ten_san_pham"]?></td>
                                            <td><?= $row["so_luong_mua"]?></td>
                                            <td><?= $row["gia_ban"]?></td>
                                            <td><?= $row["thanh_tien"]?></td>
                                        </tr>
                                    <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div> 
                            <a href="index.php?page=hoa-don" class="btn btn-default"><i class="fa fa-arrow-left"></i> Quay lại</a>
                            <button id="btnHuyHD" class="btn btn-danger <?= ($data["tinh_trang"]==-1)? "hidden":"" ?>"><i class="fa fa-times"></i> Hủy hóa đơn</button>
                            <button id="btnXacNhan" class="btn btn-primary <?= ($data["tinh_trang"]==1 || $data["tinh_trang"]==-1)? "hidden":"" ?>"><i class="fa fa-check"></i> Xác nhận hóa đơn</button>        
                </div>
            </div>
        </div>
        <div class="result"></div>
    </div>
</div>
<script>
    $('#btnLuuThongTin').toggle(false);
    $('#btnHuy').toggle(false);
    $(document).ready(function(){
        $("#btnSuaThongTin").click(function(){
            //hiện input
            $("#txtTenKhachHang").prop('disabled', false);
            $("#txtDiaChi").prop('disabled', false);
            $("#txtSDT").prop('disabled', false);
            //hiện nút lưu
            $('#btnLuuThongTin').toggle("slow","swing",true);
            $('#btnHuy').toggle("slow","swing",true);
            $('#btnSuaThongTin').toggle("slow","swing",false);
        });
        $('#btnHuy').click(function(){
            //ẩn input
            $("#txtTenKhachHang").prop('disabled', true);
            $("#txtDiaChi").prop('disabled', true);
            $("#txtSDT").prop('disabled', true);
            //ẩn nút lưu
            $('#btnLuuThongTin').toggle("slow","swing",false);
            $('#btnHuy').toggle("slow","swing",false);
            $('#btnSuaThongTin').toggle("slow","swing",true);
        });
    })
</script>