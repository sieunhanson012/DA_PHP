<?php
clsDataBase::openConnect();
$data = clsTaiKhoan::layBangTaiKhoan();
clsDataBase::closeConnect();
?>
<div class="header">
    <h1 class="page-header">
        Bảng tài khoản
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">Trang chủ</a>
        </li>
        <li>
            <a href="#">Bảng dữ liệu</a>
        </li>
        <li class="active">Tài khoản</li>
    </ol>
</div>
<div id="page-inner">
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="index.php?page=them-tai-khoan"><i class="fa fa-plus"></i> Thêm tài khoản</a>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover" id="tableTaiKhoan" style="text-align:center">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên đăng nhập</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Lần đăng nhập cuối</th>
                        <th>Khóa</th>
                        <th>Chức năng</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $values => $rows): ?>
                        <tr <?= ($rows["trang_thai"] == 0) ? 'class="danger"' : ''; ?>
                            <?= ($rows["ten_dang_nhap"] == $focus) ? 'class="success"' : ""; ?>
                        >
                            <td><?= $values; ?></td>
                            <td><?= $rows["ten_dang_nhap"]; ?></td>
                            <td><?= $rows["ho_ten"]; ?></td>
                            <td><?= $rows["email"]; ?></td>
                            <td><?= $rows["so_dien_thoai"]; ?></td>
                            <td><?= date('d / m / Y', strtotime($rows["lan_dang_nhap_cuoi"])); ?></td>
                            <td><label class="switch"><input id="ckbTrangThaiTK<?= $rows['ma_tai_khoan']; ?>"
                                                             value="<?= $rows['ten_dang_nhap']; ?>"
                                                             type="checkbox" <?= ($rows["trang_thai"] == 0) ? 'checked' : "" ?>
                                                             onchange=trangThaiTaiKhoan(<?= $rows['ma_tai_khoan']; ?>)><span
                                            class="slider round"></span></label></td>
                            <td>
                                <a href="index.php?page=sua-tai-khoan&&id=<?= $rows["ma_tai_khoan"] ?>" id="btnEdit"
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
    