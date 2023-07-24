<?php
include "../Inc/core.php";
if($_SESSION['islogin2'] == "user"){}else{exit('<!DOCTYPE html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><link href="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"><script src="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.js"></script><script src="https://cdn.bootcss.com/sweetalert/1.1.3/sweetalert-dev.min.js"></script></head><body></body><script type="text/javascript">swal({title: "系统提示",text: "您还未登陆", type: "info"},function(){ window.location.href="./login.php";});</script></body></html>');}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <title><?=$title?> - <?=$usered['name']?></title>
  <meta name="keywords" content="<?=$conf['keywords']?>"/>
  <meta name="description" content="<?=$conf['description']?>"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <link rel="stylesheet" href="./other/dhyui/css/font-awesome.min_1.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="./other/dhyui/css/bootstrap.css" type="text/css" /> 
  <link rel="stylesheet" href="./other/uiskin/Backstage/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="./other/uiskin/Backstage/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="./other/uiskin/Backstage/css/font-awesome.min.css" type="text/css" />  
  <link rel="stylesheet" href="./other/uiskin/Backstage/css/font.css" type="text/css" />
  <link rel="stylesheet" href="./other/uiskin/Backstage/css/app.css" type="text/css" />
  <link rel="stylesheet" href="./other/dhyui/css/simple-line-icons.css" type="text/css" />
  <script src="./other/uiskin/Backstage/js/jquery.min.js"></script>
<style>
.zoomify{cursor:pointer;cursor:-webkit-zoom-in;cursor:zoom-in}.zoomify.zoomed{cursor:-webkit-zoom-out;cursor:zoom-out;padding:0;margin:0;border:none;border-radius:0;box-shadow:none;position:relative;z-index:1501}.zoomify-shadow{position:fixed;top:0;left:0;right:0;bottom:0;width:100%;height:100%;display:block;z-index:1500;background:rgba(0,0,0 ,.3);opacity:0}.zoomify-shadow.zoomed{opacity:1;cursor:pointer;cursor:-webkit-zoom-out;cursor:zoom-out}
.mdui-textfield-label{
 display:unset;
}
.mdui-explode{height:12px;}.mdui-card {border-radius: 8px;}.sideImg {position: relative;width: 100%;height: 150px;background-position: center center;background-size: cover;}.side-info-head {position: absolute;top: 20px;left: 20px;width: 65px;height: 65px;border-radius: 65px;background-position: center center;background-size: cover;}.side-info-more {position: absolute;bottom: 0;left: 0;box-sizing: border-box;padding: 20px;color: #fff;font-size: 17px;}.side-info-oth {color: hsla(0,0%,100%,.7);font-size: 13px;}
::-webkit-scrollbar {
 width: 6px;
 background-color: transparent;
}
::-webkit-scrollbar-thumb {
 -webkit-border-radius: 8px;
 background-color: rgba(0,0,0,.16);
}
::-webkit-scrollbar-thumb:hover {
 background-color: rgba(0,0,0,.2);
}
.panel{border-radius:10px;border-color:#cfdbe2}
.panel-title {
font-size:15px;
color:#fff;
}
.panel-heading{
 border-top-left-radius: 8px;
 border-top-right-radius: 8px;
}
body{
    font-family:"微软雅黑";
}
.addclass_black{
 border:3px solid #000;
}
.addclass_red{
 color:red;
}
.addclass_pink{
 border:3px solid pink;
}
.modal{
 z-index:5999;
}
.gradient{
    background: linear-gradient(to right, #5ccdde,#A23F99, #75445F, #807275, #2CAB41,#33B88B,#CFDD34,#6B0F08);
    background-size: 2000%;
    animation: gradientBackground 5s alternate ease-out;
    animation-iteration-count: infinite;
}
.gradient0{
    background: linear-gradient(to right, #5ccdde,#9BA267, #89901E, #E91238, #2C542D,#103B36,#037E94,#D037E0);
    background-size: 1954%;
    animation: gradientBackground 8s alternate ease-out;
    animation-iteration-count: infinite;
}
.gradient1{
    background: linear-gradient(to right, #5ccdde,#2147DB, #E7A8DA, #ABD7A7, #8BFF86,#7C7237,#A6947C,#DEFA77);
    background-size: 1604%;
    animation: gradientBackground 10s alternate ease-out;
    animation-iteration-count: infinite;
}
.gradient2{
    background: linear-gradient(to right, #5ccdde,#041B80, #3B91D0, #4FD1A4, #94F87D,#7D019C,#E1418E,#A119A0);
    background-size: 1911%;
    animation: gradientBackground 8s alternate ease-out;
    animation-iteration-count: infinite;
}
.gradient3{
    background: linear-gradient(to right, #5ccdde,#5EEF91, #481E29, #A1A24B, #784157,#6946EA,#A8C407,#EAC455);
    background-size: 1737%;
    animation: gradientBackground 9s alternate ease-out;
    animation-iteration-count: infinite;
}
.gradient4{
    background: linear-gradient(to right, #5ccdde,#1C15B1, #43033E, #DF4DC9, #5DAD58,#18C9F5,#B56456,#DF2EA6);
    background-size: 1975%;
    animation: gradientBackground 9s alternate ease-out;
    animation-iteration-count: infinite;
}
.gradient5{
    background: linear-gradient(to right, #5ccdde,#82BC6D, #BDE513, #3D87D7, #05E18A,#62B604,#D652B5,#DBA658);
    background-size: 1630%;
    animation: gradientBackground 9s alternate ease-out;
    animation-iteration-count: infinite;
}
label{
 font-weight:unset;
}
tbody>tr>td{
 /*white-space: nowrap;*/
}
#desc_text img{
 max-width:100%;
}
</style>
 </head> 
<body>
<div class="app app-header-fixed">
  <header id="header" class="app-header navbar ng-scope" role="menu">
      <div class="navbar-header bg-primary"style="background: linear-gradient(to right,#87CEEB,#FF83FA);">
        <button class="pull-right visible-xs" ui-toggle="off-screen" target=".app-aside" ui-scroll="app">
          <i class="glyphicon glyphicon-align-justify"></i>
        </button>
        <a href="./" class="navbar-brand text-lt">
          <i class="fa fa-desktop hidden-xs"></i>
          <span class="hidden-folded m-l-xs">系统管理中心</span>
        </a>
      </div>

      <div class="collapse pos-rlt navbar-collapse box-shadow bg-primary"style="background: linear-gradient(to right,#FF83FA,#87CEEB);">
        <!-- buttons -->
        <div class="nav navbar-nav hidden-xs">
          <a href="#" class="btn no-shadow navbar-btn" ui-toggle="app-aside-folded" target=".app">
            <i class="fa fa-dedent fa-fw text"></i>
            <i class="fa fa-indent fa-fw text-active"></i>
          </a>
        </div>
        <!-- / buttons -->

        <!-- nabar right -->
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle clear" data-toggle="dropdown">
              <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                <img src="http://q2.qlogo.cn/g?b=qq&nk=<?=$usered['qq']?>&s=100&t=20170603">
                <i class="on md b-white bottom"></i>
              </span>
              <span class="hidden-sm hidden-md" style="text-transform:uppercase;"><?=$usered['user']?></span><b class="caret"></b>
            </a>
            <!-- dropdown -->
            <ul class="dropdown-menu animated fadeInRight w">
              <li>
                <a href="./">
                  <span>用户中心</span>
                </a>
              </li>
              <li>
                <a href="./pwd.php">
                  <span>修改信息</span>
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="./login.php?logout">退出登录</a>
              </li>
            </ul>
            <!-- / dropdown -->
          </li>
        </ul>
        <!-- / navbar right -->
      </div>
      <!-- / navbar collapse -->
  </header>
  <!-- / header -->
    <!-- aside --> 
   <aside id="aside" class="app-aside hidden-xs bg-light dker"> 
    <div class="aside-wrap"> 
     <div class="navi-wrap"> 
      <!-- nav --> 
      <nav ui-nav="" class="navi"> 
       <ul class="nav"> 
        <li class="line dk hidden-folded"></li> 
        <li class="hidden-folded padder m-t m-b-sm text-muted text-xs"> <span>导航</span> </li> 
        <li class="active"> <a href="./"> <i class="icon-user"></i> <span>分站中心</span> </a> </li> 
        <li class=""> <a href="./buy.php"> <i class="icon-basket"></i> <span>低价下单</span> </a> </li>
        <li class=""> <a href="./tixian.php"> <i class="icon-wallet"></i> <span>余额提现</span> </a> </li>
        <?php
     if($conf['fenzhan_qqqun'] == ""){}else{
     ?>
        <li class=""> <a href="<?=$conf['fenzhan_qqqun']?>"> <i class="icon-home"></i> <span>分站售后群</span> </a> </li>
        <?php } ?>
         
         
       <?php
     if($usered['type'] == "common"){}else{
     ?>
      <li> 
      <a href="userlist.php" class="auto"><i class="icon-user"></i> <span>我的旗下</span> </a>
     </li>  
      <li> 
      <a href="userlist.php?step=add" class="auto"><i class="icon-heart"></i> <span>添加旗下</span> </a>
     </li>  
   <?php } ?>
        <li class="line dk hidden-folded"></li> 
        <li class=""> <a href="./set.php"> <i class="icon-settings"></i> <span>网站信息</span> </a> </li>
        <li class="line dk hidden-folded"></li> 
        <li><a ui-sref="access.signin" href="./login.php?out"> <i class="icon-power"></i> <span>退出登录</span> </a> </li> 
        
       </ul> 
      </nav> 
     </div> 
    </div> 
   </aside> 
  <!-- / aside -->
  <!-- content -->
    
 <div id="content" class="app-content" role="main">
    <div class="app-content-body ">
    <div class="bg-light lter b-b wrapper-sm ng-scope">
     <ul class="breadcrumb">
      <li><i class="fa fa-home"></i><a href="./">管理中心</a></li>
      <li><?=$title?></li>
     </ul>
    </div><br>
<script src="//lib.baomitu.com/jquery/3.3.1/jquery.min.js"></script>
<script src="./other/uiskin/Backstage/js/bootstrap.js"></script>
<script src="./other/uiskin/Backstage/js/ui-load.js"></script>
<script src="./other/uiskin/Backstage/js/ui-jp.config.js"></script>
<script src="./other/uiskin/Backstage/js/ui-jp.js"></script>
<script src="./other/uiskin/Backstage/js/ui-nav.js"></script>
<script src="./other/uiskin/Backstage/js/ui-toggle.js"></script>
<script src="./other/uiskin/Backstage/js/ie.js"></script>
<script src="//lib.baomitu.com/layer/3.1.1/layer.js"></script>
<script src="//lib.baomitu.com/clipboard.js/1.7.1/clipboard.min.js"></script>
<script src="//lib.baomitu.com/layer/2.3/layer.js"></script>
<script src="//lib.baomitu.com/clipboard.js/1.7.1/clipboard.min.js"></script>