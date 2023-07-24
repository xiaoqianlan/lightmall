<?php
error_reporting(0); # 屏蔽不致命的错误
session_start(); # 开启会话
define('ROOT', dirname(__FILE__)."/"); # 定义目录
define('ROOTS', dirname(ROOT).'/'); # 定义目录
date_default_timezone_set("PRC"); # 设置时区

if(is_file(ROOT.'360safe/360webscan.php')){ # 360网站卫士
    require_once(ROOT.'360safe/360webscan.php');
	require_once(ROOT.'360safe/xss.php');
}


if(!file_exists(ROOTS."Install/install.lock")) { # 判断安装
$URLs = $_SERVER['HTTP_HOST'];
exit("<script language='javascript'>alert('您还未安装');window.location.href='http://{$URLs}/Install';</script>");
}

# 引入数据库信息
require_once(ROOT."Config.php");

# 创建数据库连接
$DB = mysqli_connect($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);

# 引入函数文件
include_once(ROOT."Function.php");

# 引入分页类
include_once(ROOT."Page.php");

# 引入mysqli文件
include_once(ROOT."Mysqli.php");

# 引入配置文件
include ROOT."member.php";