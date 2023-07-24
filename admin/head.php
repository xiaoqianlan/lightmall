<?php
include "../Inc/core.php";
if($_SESSION['islogin'] == "admin"){}else{exit('<!DOCTYPE html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><link href="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"><script src="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.js"></script><script src="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert-dev.min.js"></script></head><body></body><script type="text/javascript">swal({title: "系统提示",text: "您还未登陆", type: "info"},function(){ window.location.href="./login.php";});</script></body></html>');}
?>
<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<title><?=$title?> - <?=$conf['title']?></title>
<link rel="icon" href="favicon.ico" type="image/ico">
<meta name="keywords" content=" <?=$conf['keywords']?>">
<meta name="description" content=" <?=$conf['description']?>">
<meta name="author" content="浅蓝ちゃん">
<link href="../Assets/css/bootstrap.min.css" rel="stylesheet">
<link href="../Assets/css/materialdesignicons.min.css" rel="stylesheet">
<link href="../Assets/css/style.min.css" rel="stylesheet">
<style>
.border {
border-radius:15px;
 box-shadow: 1px 1px 5px 5px rgba(169, 169, 169, 0.35);
    -moz-box-shadow: 1px 1px 5px 5px rgba(169, 169, 169, 0.35);
}
</style>
</head>
  
<body>
<div class="lyear-layout-web">
  <div class="lyear-layout-container">
    <!--左侧导航-->
    <aside class="lyear-layout-sidebar">
      
      <!-- logo -->
      <div id="logo" class="sidebar-header">
        <a href="./"><img src="../Assets/images/mall.png" title="浅蓝ちゃん" alt="浅蓝ちゃん" /></a>
      </div>
      <div class="lyear-layout-sidebar-scroll"> 
        
        <nav class="sidebar-main">
          <ul class="nav nav-drawer">
            <li class="nav-item active"> <a href="./"><i class="mdi mdi-home"></i> 控制台</a> </li>
            <li class="nav-item nav-item-has-subnav">
              <a href="javascript:void(0)"><i class="mdi mdi-palette"></i> 商品管理</a>
              <ul class="nav nav-subnav">
                <li> <a href="shoplist.php?step=add">添加商品</a> </li>
                <li> <a href="shoplist.php">商品列表</a> </li>
              </ul>
            </li>
            <li class="nav-item nav-item-has-subnav">
              <a href="javascript:void(0)"><i class="mdi mdi-account"></i> 分站管理</a>
              <ul class="nav nav-subnav">
                <li> <a href="userlist.php?step=add">添加分站</a> </li>
                <li> <a href="userlist.php">分站列表</a> </li>
                <li> <a href="tixian.php">余额提现处理</a> </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="orderlist.php"><i class="mdi mdi-format-align-justify"></i> 订单列表</a>
            </li>
            
            <li class="nav-item">
              <a href="clone.php"><i class="mdi mdi-key"></i> 同系统克隆</a>
            </li>
            
            <li class="nav-item nav-item-has-subnav">
              <a href="javascript:void(0)"><i class="mdi mdi-settings"></i>站点管理</a>
              <ul class="nav nav-subnav">
                <li> <a href="set.php">网站配置</a> </li>
                 <li> <a href="muban.php">模板配置</a> </li>
                <li> <a href="notice.php">公告配置</a> </li>
                <li> <a href="bg.php">壁纸设置</a> </li>
                <li> <a href="set.php?step=pay">易支付配置</a> </li>
                <li> <a href="set.php?step=pic">分站配置</a> </li>
              </ul>
            </li>
            
            <li class="nav-item">
              <a href="update.php"><i class="mdi mdi-cloud-upload"></i> 系统升级</a>
            </li>
            
            <li class="nav-item">
              <a href="about.php"><i class="mdi mdi-more"></i> 关于程序</a>
            </li>
            
          </ul>
        </nav>
        
        <div class="sidebar-footer">
          <p class="copyright">Copyright &copy; <?php echo date('Y'); ?>. <a href=""><?=$conf['title']?></a> All rights reserved.</p>
        </div>
      </div>
      
    </aside>
    <!--End 左侧导航-->
    
    <!--头部信息-->
    <header class="lyear-layout-header">
      
      <nav class="navbar navbar-default">
        <div class="topbar">
          
          <div class="topbar-left">
            <div class="lyear-aside-toggler">
              <span class="lyear-toggler-bar"></span>
              <span class="lyear-toggler-bar"></span>
              <span class="lyear-toggler-bar"></span>
            </div>
            <span class="navbar-page-title"> 后台首页 </span>
          </div>
          
          <ul class="topbar-right">
            <li class="dropdown dropdown-profile">
              <a href="javascript:void(0)" data-toggle="dropdown">
                <img class="img-avatar img-avatar-48 m-r-10" src="https://q4.qlogo.cn/g?b=qq&nk=<?=$conf['qq']?>&s=140" alt="笔下光年" />
                <span>管理员<span class="caret"></span></span>
              </a>
              <ul class="dropdown-menu dropdown-menu-right">
                <li> <a href="set.php?step=pwd"><i class="mdi mdi-account"></i> 个人信息</a> </li>
                <li class="divider"></li>
                <li> <a href="login.php?out"><i class="mdi mdi-logout-variant"></i> 退出登录</a> </li>
              </ul>
            </li>
          </ul>
          
        </div>
      </nav>
      
    </header>
    <!--End 头部信息-->
    
    <!--页面主要内容-->
    <main class="lyear-layout-content">
      
      <div class="container-fluid">