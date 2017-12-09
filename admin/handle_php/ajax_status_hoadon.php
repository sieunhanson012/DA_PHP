<?php
include_once '../../classes/helper.php';
include_once '../../classes/clsHoaDon.php';
include_once '../../classes/clsDataBase.php';

if (!isset($_REQUEST["maHD"]))
    die('404');
$maHD = $_REQUEST["maHD"];

clsDataBase::openConnect();

//hủy hóa đơn
if($_REQUEST["ac"]=="del"){
    //Cap nhat trang thai
    $resultHoaDon = clsHoaDon::trangThai($maHD,false);
    if(is_bool($resultHoaDon)&&$resultHoaDon){
        //Update lai so luong san pham
        $resultHuyHoaDon = clsHoaDon::huyHoaDon($maHD);
        if(is_bool($resultHoaDon)&& $resultHoaDon){
            helper::alertDangerString("Đã hủy đơn hàng");
        }else{
            helper::alertDangerString($resultHoaDon);
        }
    }else{
        helper::alertDangerString($resultHoaDon);
    }
}

//xác nhận hóa đơn
if($_REQUEST["ac"]=="check"){
    $resultHoaDon = clsHoaDon::trangThai($maHD,true);
    if(is_bool($resultHoaDon)&&$resultHoaDon){
        helper::alertSuccessString("Đã xác nhận đơn hàng");
    }else{
        helper::alertDangerString($resultHoaDon);
    }
}

clsDataBase::closeConnect();
