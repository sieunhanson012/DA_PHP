<?php

class helper {

	public static function alertPrimaryString($stringNotify) {
		echo "<script>
            $.notify({
                icon: 'glyphicon glyphicon-ok',
                title : '<strong>Thông báo: </strong>',
                message: ' $stringNotify '
            });
                </script>";
	}

	public static function alertSuccessString($stringNotify) {
		echo "<script>
            $.notify({
                icon: 'glyphicon glyphicon-ok',
                title : '<strong>Thông báo: </strong>',
                message: ' $stringNotify '
            },{
                type:'success'
            });
        </script>";
	}

	public static function alertDangerString($stringNotify) {
		echo "<script>
            $.notify({
                icon: 'glyphicon glyphicon-remove',
                title: '<strong>Thông báo: </strong>',
                message:' $stringNotify '
            },{
                type: 'danger'
            });
        </script>";
	}

	public static function onloadAlertDanger($stringNotify) {
		echo "<script>
        $(document).ready(function(){
            $.notify({
                icon: 'glyphicon glyphicon-remove',
                title: '<strong>Thông báo: </strong>',
                message:' $stringNotify '
            },{
                type: 'danger'
            });
        })
        </script>";
    }

    public static function onloadAlertSuccess($stringNotify) {
		echo "<script>
        $(document).ready(function(){
            $.notify({
                icon: 'glyphicon glyphicon-remove',
                title: '<strong>Thông báo: </strong>',
                message:' $stringNotify '
            },{
                type: 'success'
            });
        })
        </script>";
    }
    
    /**
     * Thêm hình ảnh
     * Thành công ==> tên file hinh
     */
    public static function themHinhAnh($file){
        if($file['name'] != NULL){ // Đã chọn file
            // Tiến hành code upload file
            if($file['type'] == "image/jpeg"
            || $file['type'] == "image/png"
            || $file['type'] == "image/gif"){
            // là file ảnh
            // Tiến hành code upload    
                if($file['size'] > 1048576){ //Kiểm tra file có lớn hơn 1MB không
                    return false;
                }else{
                    // file hợp lệ, tiến hành upload
                    $path = "../../images/"; // file sẽ lưu vào thư mục data
                    $tmp_name = $file['tmp_name'];
                    $name = $file['name'];
                    // Upload file 
                    move_uploaded_file($tmp_name,$path.$name);
                    //Thành công
                    return $name;
               }
            }else{
               // không phải file ảnh
               return false;
            }
       }else{
            return false;
       }
    }

}
