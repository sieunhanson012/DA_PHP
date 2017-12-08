<?php


class clsQuangCao{


    public static function layBangQuangCao(){
        clsDataBase::query("SELECT * FROM quangcao");
        if(clsDataBase::numRows()>0)
            return clsDataBase::fetchAll();
        return false;
    }

    public static function them($hinhAnh){
        clsDataBase::query("INSERT INTO quangcao(hinh_anh) VALUES('$hinhAnh')");
        if(clsDataBase::effectRow()>=0)
            return true;
        return false;
    }

    public static function sua($maQC,$hinhAnh){
        clsDataBase::query("UPDATE quangcao SET hinh_anh = '$hinhAnh' WHERE ma_quang_cao = '$maQC' ");
        if(clsDataBase::effectRow()>=0)
            return true;
        return false;
    }

    public static function trangThai($maQC,$bool){
        if ($bool) {
            //Hiện QC
        clsDataBase::query("UPDATE quangcao SET trang_thai = 1 WHERE ma_quang_cao = '$maQC'");
			if (clsDataBase::effectRow() > 0) 
				return true;
			return false;
		} else {
			//Ẩn QC
			clsDataBase::query("UPDATE quangcao SET trang_thai = 0 WHERE ma_quang_cao = '$maQC'");
			if (clsDataBase::effectRow() > 0) 
				return true;
			return false;
		}
    }

}