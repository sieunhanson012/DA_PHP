<?php
clsDataBase::openConnect();
$data = clsHoaDon::layTatCaHoaDon();
clsDataBase::closeConnect();
?>

<div class="header">
    <h1 class="page-header">
        Bảng hóa đơn
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
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="tableHoaDon" style="text-align:center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Họ tên</th>
                                            <th>Số điện thoại</th>
                                            <th>Tổng tiền</th>
                                            <th>Tổng số lượng</th>
                                            <th>Ngày đặt</th>
                                            <th>Tình trạng</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($data as $key => $rows): ?>
                                        <tr>
                                            <td><?=$key?></td>
                                            <td><?=$rows["ten_khach_hang"]?></td>
                                            <td><?=$rows["so_dien_thoai"]?></td>
                                            <td><?=$rows["tong_tien"]?></td>
                                            <td><?=$rows["tong_so_luong"]?></td>
                                            <td><?=$rows["ngay_tao"]?></td>
                                            <td>
                                            <?php if($rows["tinh_trang"]==1):?>
                                            <span class="label label-success"><i class="fa fa-check"></i> Đã xử lí</span>
                                            <?php elseif($rows["tinh_trang"]==0):?>
                                            <span class="label label-warning"><i class="fa fa-exclamation-circle"></i> Đang chờ</span>
                                            <?php else: ?>
                                            <span class="label label-danger"><i class="fa fa-trash-o"></i> Đã hủy</span>
                                            <?php endif ?>
                                            </td>
                                            <td>
                                                <a href="index.php?page=thong-tin-hoa-don&&id=<?= $rows["ma_hoa_don"] ?>" id="btnEdit"
                                                class="btn btn-primary btn-circle fa fa-info"></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
</div>