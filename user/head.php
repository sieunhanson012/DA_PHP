<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="../components/user/css/bootstrap.min.css" rel="stylesheet">
    <link href="../components/user/css/font-awesome.min.css" rel="stylesheet">
    <link href="../components/user/css/prettyPhoto.css" rel="stylesheet">
    <link href="../components/user/css/price-range.css" rel="stylesheet">
    <link href="../components/user/css/animate.css" rel="stylesheet">
	<link href="../components/user/css/main.css" rel="stylesheet">
	<link href="../components/user/css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="../components/admin/assets/css/jquery-confirm.min.css">
    
    
    <link rel="stylesheet" href="../components/user/alertify/themes/alertify.core.css" />
    <link rel="stylesheet" href="../components/user/alertify/themes/alertify.default.css" id="toggleCSS" />
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../components/user/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../components/user/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../components/user/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../components/user/images/ico/apple-touch-icon-57-precomposed.png">
    <script src="../components/user/js/jquery.js"></script>
    <style>
        .select {
  display: block;
  position: relative;
  overflow: hidden;
  background: white;
  border: 1px solid #d2e2e7;
  border-bottom-color: #c5d4d9;
  border-radius: 2px;
  background-image: -webkit-linear-gradient(top, #fcfdff, #f2f7f7);
  background-image: -moz-linear-gradient(top, #fcfdff, #f2f7f7);
  background-image: -o-linear-gradient(top, #fcfdff, #f2f7f7);
  background-image: linear-gradient(to bottom, #fcfdff, #f2f7f7);
  -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.06);
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.06);
}
.select:before, .select:after {
  content: '';
  position: absolute;
  right: 11px;
  width: 0;
  height: 0;
  border-left: 3px outset transparent;
  border-right: 3px outset transparent;
}
.select:before {
  top: 10px;
  border-bottom: 3px solid #7f9298;
}
.select:after {
  top: 16px;
  border-top: 3px solid #7f9298;
}
.select > select {
  position: relative;
  z-index: 2;
  width: 112%;
  height: 29px;
  line-height: 17px;
  padding: 5px 9px;
  padding-right: 0;
  color: #80989f;
  background: transparent;
  background: rgba(0, 0, 0, 0);
  border: 0;
  -webkit-appearance: none;
}
.select > select:focus {
  color: #4d5a5e;
  outline: 0;
}
    </style>

    <?php 

include_once "../classes/helper.php";
include_once "../classes/clsDataBase.php";
include_once "../classes/user/clsTaiKhoan.php";
include_once "../classes/user/clsSanPham.php";
include_once "../classes/helper.php";

     ?>

</head><!--/head-->