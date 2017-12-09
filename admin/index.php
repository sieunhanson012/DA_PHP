<?php include 'header.php';
?>
<div id="page-wrapper">
    <?php
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case "tai-khoan":
                include_once "tai_khoan.php";
                break;
            case "sua-tai-khoan":
                include_once "sua_tai_khoan.php";
                break;
            case "them-tai-khoan":
                include_once "them_tai_khoan.php";
                break;
            case "san-pham":
                include_once "san_pham.php";
                break;
            case "sua-san-pham":
                include_once "sua_san_pham.php";
                break;
            case "them-san-pham":
                include_once "them_san_pham.php";
                break;
            case "hang-san-xuat":
                include_once "hang_san_xuat.php";
                break;
            case "sua-hang-sx":
                include_once "sua_hang_sx.php";
                break;
            case "them-hang-sx":
                include_once "them_hang_sx.php";
                break;
            case "loai-san-pham":
                include_once "loai_san_pham.php";
                break;
            case "sua-loai-san-pham":
                include_once "sua_loai_sp.php";
                break;
            case "quang-cao":
                include_once "quang_cao.php";
                break;
            case "them-quang-cao":
                include_once "them_quang_cao.php";
                break;
            case "sua-quang-cao":
                include_once "sua_quang_cao.php";
                break;
            case "hoa-don":
                include_once "hoa_don.php";
                break;
            case "thong-tin-hoa-don":
                include_once "thong_tin_hd.php";
                break;
            default:
                include_once "home.php";
        }
    } else {
        include 'home.php';
    }
    ?>
</div>
<?php include 'footer.php'; ?>
