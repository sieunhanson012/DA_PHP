<?php 
include_once("../../classes/clsDataBase.php");
include_once("../../classes/user/clsSanPham.php");
session_start();
//session_unset($_SESSION['Gio_Hang']);die;
clsDataBase::openConnect();
if(isset($_REQUEST['ThaoTac'])){
	if($_REQUEST['ThaoTac']=="ThemVaoGioHang"){
		$data_sanpham=clsSanPham::LaySanPhamTheoId($_REQUEST['ID']);
		if($data_sanpham['so_luong']>0){
			if(isset($_SESSION['Gio_Hang'])){
				$giohang=$_SESSION['Gio_Hang'];
				//var_dump($_SESSION['Gio_Hang']);	

				for($i=0; $i <= count($giohang); $i++) { 
						
						
					if($i<count($giohang)){
						if($giohang[$i]["masanpham"]==$_REQUEST['ID']){					
							$giohang[$i]["soluong"]+=$_REQUEST['SoLuong'];//tang so luong sp
							$giohang[$i]["tongtien"]=$giohang[$i]["soluong"]*$giohang[$i]["gia"];
							$_SESSION["Gio_Hang"]=$giohang;
							echo "thanh cong";
							break;
						}
					}
						if($i==count($giohang)){
						//chua co sp nay trong gio hang
						$soluong=(isset($giohang[$i-1]["soluong"]))? $giohang[$i-1]["soluong"]:1;
						$sanpham["masanpham"]=$_REQUEST['ID'];
						$sanpham["soluong"]=$_REQUEST['SoLuong'];
						$sanpham["tensanpham"]=$data_sanpham['ten_san_pham'];
						$sanpham["hinhanh"]=$data_sanpham['hinh_anh'];
						$sanpham["gia"]=$data_sanpham['gia_ban'];
						$sanpham["tongtien"]=$soluong*$sanpham["gia"];
						$sanpham["loaisanpham"]="aaa";
						$giohang[]=$sanpham;					
						echo "thanh cong";
						break;
						}
				}	
				$_SESSION["Gio_Hang"]=$giohang;
				

			}else{
						$sanpham["masanpham"]=$_REQUEST['ID'];
						$sanpham["soluong"]=$_REQUEST['SoLuong'];
						$sanpham["tensanpham"]=$data_sanpham['ten_san_pham'];
						$sanpham["hinhanh"]=$data_sanpham['hinh_anh'];
						$sanpham["gia"]=$data_sanpham['gia_ban'];
						$sanpham["loaisanpham"]=$data_sanpham['ten_loai'];
						$sanpham["tongtien"]=$_REQUEST['SoLuong']*($data_sanpham['gia_ban']);

						$giohang[]=$sanpham;
				$_SESSION["Gio_Hang"]=$giohang;
				echo "thanh cong";
				
			}

		}else{
			echo "khong du san pham";
		}
	}

}
//ham xoa san pham trong gio hang

if(isset($_REQUEST['ThaoTac'])){
	if($_REQUEST['ThaoTac']=="XoaSanPhamTrongGioHang"){
		if(isset($_SESSION['Gio_Hang'])){
			$giohang=$_SESSION['Gio_Hang'];
			$ID=$_REQUEST['ID'];
			for ($i=0; $i < count($giohang); $i++) { 
				if($giohang[$i]["masanpham"]==$ID){
					unset($giohang[$i]);
					$_SESSION['Gio_Hang']=$giohang;
					echo "xoa thanh cong";
					break;
				}

			}
		}else{
					echo "khong co san pham";
				}
		


		
	}

}


clsDataBase::closeConnect();
 ?>