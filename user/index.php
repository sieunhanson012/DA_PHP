<?php ob_start();
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php include_once('head.php') ?>
<?php include('header.php') ?>
<?php 
	if(isset($_GET['page'])){
		switch ($_GET['page']) {
			case 'trang-chu.php':
				include_once('trang-chu.php');
				break;
			case 'chi-tiet-san-pham.php':
				include_once('chi-tiet-san-pham.php');
				break;
			case 'dang-nhap.php':
				include_once('dang-nhap.php');
				break;
			case 'gio-hang.php':
				include_once('gio-hang.php');
				break;
			case '404.php':
				include_once('404.php');
				break;
			case 'trang-danh-muc.php':
				include_once('trang-danh-muc.php');
				break;
			default:
				include_once('404.php');
				break;
		}
	}
	else{
		include_once('trang-chu.php');
	}

 ?>

<?php include('footer.php') ?>
</body>
</html>