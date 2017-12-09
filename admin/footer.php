
<script src="../components/admin/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../components/admin/assets/js/dataTables/dataTables.bootstrap.js"></script>
<script src="../components/admin/assets/js/bootstrap.min.js"></script>
<script src="../components/admin/assets/js/custom.js"></script>
<script src="../components/admin/assets/js/jquery-confirm.min.js"></script>
<script src="../components/admin/assets/js/bootstrap-notify.js"></script>
<script type="text/javascript" src="../components/admin/assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="handle_js/ajax.js"></script>
<script type="text/javascript" src="handle_js/validation.js"></script>
<script>
            $('#tableTaiKhoan').dataTable();  
            $('#tableHSX').dataTable();
            $('#tableLoaiSP').dataTable();
            $('#tableQuangCao').dataTable();
            $('#tableSanPham').dataTable();
            $('#tableHoaDon').dataTable();
</script>
<?php
/**
 * Thông báo
 */
//thông báo thành công
if (isset($_SESSION["notify-success"])) {
    helper::onloadAlertSuccess($_SESSION["notify-success"]);
    unset($_SESSION["notify-success"]);
}
//thông báo thất bại
if (isset($_SESSION["notify-fail"])) {
    helper::onloadAlertDanger($_SESSION["notify-fail"]);
    unset($_SESSION["notify-fail"]);
}
?>

</body>
</html>
