<?php
$title = "分站搭建";
include "../Inc/core.php";
$URL = $_SERVER['HTTP_HOST'];
$SQL = Query("SELECT * FROM mall_users WHERE `url` = '{$URL}' limit 1");
$row = Fetch($SQL);

if($row['url'] == $URL){
Alert("您已搭建过分站", "../", "error");
}else{
if($conf['fenzhan_open'] == "off"){
Alert("站长未开启分站搭建", "../", "error");
}else{
$act = $_GET['act'];
if ($act == 'check')
{
    $domain = Safe($_GET['qz']).'.'.$_SERVER['HTTP_HOST'];
    $SQLs = Query("SELECT * FROM `mall_users` WHERE `url`='{$domain}' limit 1");
    $rows = Fetch($SQLs);
    $urls = explode(".".$_SERVER['HTTP_HOST'], $rows['url']);
     if ($urls[0] == $_GET['qz']){
        echo '1';
        die;
    } else {
        echo '0';
        die;
    }
}else if ($act == 'checkuser')
{
    $user = Safe($_GET['user']);
    $SQLs = Query("SELECT * FROM `mall_users` WHERE `user`='{$user}' limit 1");
    $rows = Fetch($SQLs);
     if ($rows['user'] == $_GET['user']){
        echo '1';
        die;
    } else {
        echo '0';
        die;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="浅蓝ちゃん">

	<title><?=$title?> -<?=$conf['title']?></title>

	<link href="../Assets/css/app.css" rel="stylesheet">
</head>

<body>
<main class="content">
<div class="container-fluid p-0">
<div class="row">
<div class="col-lg-12">
     <div class="card">
		<div class="card-header">
			<center><h2 class="card-title mb-0"><?=$title?></h2></center>
		</div><hr>
		<div class="card-body">
		<form method="post" action="../Pay/pay.php">
		 <input type="hidden" name="ddh" value="<?php echo date('YmdHis').rand(123,999); ?>" />
		  <input type="hidden" name="name" value="搭建分站" />
		  
		  <div id="money"></div>
		  
            <div class="input-group">
              <label class="col-sm-2 control-label">分站类型</label> 
              <select id="types" name="types" class="form-control">
                <option value="0">请选择分站类型</option>
               <option value="common">普通版 - <?=$conf["fenzhan_common"]?>元</option>
               <option value="major">专业版 - <?=$conf["fenzhan_major"]?>元</option>
              </select></div><br>
              
	<div class="form-group">
	  <label class="col-sm-2 control-label">搭建域名前缀</label>
	  <div class="col-lg-12">
	  <input type="text" name="qz" value="" class="form-control" required/>
	  </div>
	</div><br/>
	
	<div class="form-group">
	  <label class="col-sm-2 control-label">网站名称</label>
	  <div class="col-lg-12"><input type="text" name="fz_name" value="" class="form-control" required/></div>
	</div><br/>
	
	<div class="form-group">
	  <label class="col-sm-2 control-label">您的账号</label>
	  <div class="col-lg-12"><input type="text" id="user" name="user" value="" class="form-control" required/></div>
	</div><br/>
	
	<div class="form-group">
	  <label class="col-sm-2 control-label">您的密码</label>
	  <div class="col-lg-12"><input type="password" name="pwd" value="" class="form-control" required/></div>
	</div><br/>
	 <div class="input-group">
              <label class="col-sm-2 control-label">支付类型</label> 
              <select name="type" class="form-control">
               <option value="alipay">支付宝</option>
               <option value="qqpay">QQ支付</option>
               <option value="wxpay">微信支付</option>
           
            
              </select></div><br>
              
	<div class="form-group">
	  <div class="col-lg-12"><input type="submit" value="搭建分站" class="btn btn-primary form-control"/><br/>
	 </div>
    <div class="mt-5 text-center">
      <p>已有一个账户? <a href="login.php" class="font-weight-medium text-primary"> 登录</a> </p>
    </div>
	 
	 </form>	 
		</div>
	</div>
  </div>
</div>
</div>
        <div style="text-align:center">
            Copyright &copy <a href="#" target="_blank"><?=$conf['title']?></a>
            </div>


<script src="https://lib.baomitu.com/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdn.bootcss.com/layer/3.0.3/layer.min.js"></script>
<script>
$("#money").css("display","none");
$('#types').change(function () {
   var types=$("#types").val();
   $("#money").css("display","inherit");
   if(types == "common"){
   $("#money").html('<input type="hidden" name="money" id="money" value="<?=$conf["fenzhan_common"]?>" />');
   }else if(types == "major"){
   $("#money").html('<input type="hidden" name="money" id="money" value="<?=$conf["fenzhan_major"]?>" />');
   }
});


$(document).ready(function(){
    $("input[name='qz']").change(function(){
        var qz = $(this).val();
		if(qz=='www'){layer.alert('www为系统保留域名！');return false;}
		if(qz=='ds'){layer.alert('ds为系统保留域名！');return false;}
        if(qz != ''){
            $.get("?act=check", { 'qz' : qz},function(data){
                    if( data == 1 ){
                        layer.alert('你所填写的域名已被使用，请更换一个！');
						$("input[name='qz']").focus();
                    }
            });
            
        }
    });
    
    $("input[name='user']").change(function(){
        var user = $(this).val();
        if(user != ''){
            $.get("?act=checkuser", { 'user' : user},function(data){
                    if( data == 1 ){
                        layer.alert('你所填写的账号已被搭建，请更换一个！');
						$("input[name='user']").focus();
                    }
            });
            
        }
    });
    
});   
</script>
<?php
}}
?>