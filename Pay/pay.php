<?php
require_once("core.php");

if($_SERVER['REQUEST_METHOD'] == "GET"){

//-------------------GET 请求--------------------//

$_SESSION['MY_URL'] = $_SERVER['HTTP_REFERER'];
$name = $_GET['name'];//get方式名称
$out_trade_no = $_GET['ddh'];//get方式订单号
$_SESSION['DDH'] = $out_trade_no;
$type = $_GET['type'];//get方式支付方式
$_SESSION['USER'] = $_GET['user'];//联系方式
$money = $_GET['money'];//get方式金额

}else{

//-------------------POST 请求--------------------//

$out_trade_no = $_POST['ddh'];//post方式订单号
$type = $_POST['type'];//post方式支付方式
$money = $_POST['money'];//post方式金额
$name = $_POST['name'];//post方式名称

//-------------------搭建分站元素--------------------//

$_SESSION['FZ_USER'] = $_POST['user'];//分站账号
$_SESSION['FZ_PWD'] = $_POST['pwd'];//分站密码
setcookie("FZ_TYPE", $_POST['types'], time() + 120);//分站类型
$_SESSION['FZ_QZ'] = $_POST['qz'];//分站前缀
$_SESSION['FZ_NAME'] = $_POST['fz_name'];//分站名称

//--------------------------------------------------//

}

$parameter = array(
		"pid" => trim($alipay_config['partner']),
		"type" => $type,
		"out_trade_no"	=> $out_trade_no,
		"name"	=> $name,
		"money"	=> $money,
		"notify_url"	=> $siteurl.'notify_url.php',
		"sitename"	=> $conf['title'],
		"return_url"	=> $siteurl.'return_url.php'
);
$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestForm($parameter);
echo $html_text;
?>