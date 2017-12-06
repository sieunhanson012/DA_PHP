<?php

class helper {

	public static function alertPrimaryString($stringNotify) {
		echo "<script>
            $.notify({
                icon: 'glyphicon glyphicon-ok',
                title : '<strong>Thông báo: </strong>',
                message: '" . $stringNotify . "'
            });
                </script>";
	}

	public static function alertSuccessString($stringNotify) {
		echo "<script>
            $.notify({
                icon: 'glyphicon glyphicon-ok',
                title : '<strong>Thông báo: </strong>',
                message: '" . $stringNotify . "'
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
                message:'" . $stringNotify . "'
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
                message:'" . $stringNotify . "'
            },{
                type: 'danger'
            });
        })
        </script>";
	}

}
