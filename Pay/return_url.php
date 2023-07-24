<?php
require_once("core.php");

$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyReturn();
if($verify_result) {

//-------------------搭建分站元素 写入users表--------------------//

if($_COOKIE['FZ_TYPE'] !== null){

$FZ_USER = $_SESSION['FZ_USER'];
$FZ_PWD = $_SESSION['FZ_PWD'];
$FZ_TYPE = $_COOKIE['FZ_TYPE'];
$FZ_NAME = $_SESSION['FZ_NAME'];
$FZ_QZ = $_SESSION['FZ_QZ'];
$FZ_QZ = $FZ_QZ.".".$_SERVER['HTTP_HOST'];

if($FZ_TYPE == "common"){
$TYPE = "common";
}else{
$TYPE = "major";
}

$SQL = Query("insert into `mall_users` (`user`, `pwd`, `type`, `url`, `name`) value ('".$FZ_USER."', '".$FZ_PWD."', '".$TYPE."', '".$FZ_QZ."', '".$FZ_NAME."')"); 
Alert("恭喜你，开通分站成功", "../user");

} else {

//-------------------分站返利块代码区域-------------------//

$MY_URL = $_SESSION['MY_URL'];
$arr = parse_url($MY_URL);
$HOST = $arr['host'];
$Query = Query("select * from `mall_users` where `url` = '{$HOST}' limit 1");
$row = Fetch($Query);
if($row['url'] == $HOST){

if($row['type'] == "common"){
$fenzhan = $conf['fenzhan_common_fl'];
}else{
$fenzhan = $conf['fenzhan_major_fl'];
}

$SQL = Query("UPDATE `mall_users` SET money=money+'{$fenzhan}' WHERE url = '{$HOST}'");
}

//-------------------下单商品元素 写入order表--------------------//

$user = $_SESSION['USER'];
$date = date('Y-m-d H:i:s');
$ddh = $_SESSION['DDH'];
$money = $_GET['money'];
$name = $_GET['name'];

Alert("恭喜你购买商品成功", "../");

}
}else{
Alert("支付失败，请重新购买", "../", "error");
}
?>