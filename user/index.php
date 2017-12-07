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
			case 'gio-hang.php':
				include_once('gio-hang.php');
			default:
				# code...
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