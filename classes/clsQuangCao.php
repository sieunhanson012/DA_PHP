<?php


class clsQuangCao{


    public static function layBangQuangCao(){
        clsDataBase::query("SELECT * FROM quangcao ORDER BY ma_quang_cao DESC");
        if(clsDataBase::numRows()>0)
            return clsDataBase::fetchAll();
        return str_replace("'","",clsDataBase::getError());
    }

    public static function them($hinhAnh){
        clsDataBase::query("INSERT INTO quangcao(hinh_anh) VALUES('$hinhAnh')");
        if(clsDataBase::effectRow()>=0)
            return true;
        return str_replace("'","",clsDataBase::getError());
    }

    public static function sua($maQC,$hinhAnh){
        clsDataBase::query("UPDATE quangcao SET hinh_anh = '$hinhAnh' WHERE ma_quang_cao = '$maQC' ");
        if(clsDataBase::effectRow()>=0)
            return true;
        return str_replace("'","",clsDataBase::getError());
    }

    public static function trangThai($maQC,$bool){
        if ($bool) {
            //Hiện QC
        clsDataBase::query("UPDATE quangcao SET trang_thai = 1 WHERE ma_quang_cao = '$maQC'");
			if (clsDataBase::effectRow() > 0) 
				return true;
			return str_replace("'","",clsDataBase::getError());
		} else {
			//Ẩn QC
			clsDataBase::query("UPDATE quangcao SET trang_thai = 0 WHERE ma_quang_cao = '$maQC'");
			if (clsDataBase::effectRow() > 0) 
				return true;
			return str_replace("'","",clsDataBase::getError());
		}
    }

}