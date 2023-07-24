<?php
include "../Inc/core.php";
error_reporting(0);
session_start();
$alipay_config['apiurl'] = $conf['yzf_api'];//易支付地址
$alipay_config['partner'] = $conf['yzf_id'];//易支付ID
$alipay_config['key'] = $conf['yzf_key'];//易支付密钥
$alipay_config['sign_type'] = strtoupper('MD5');
$alipay_config['input_charset']= strtolower('utf-8');
$alipay_config['transport'] = 'http';
$scriptpath=str_replace('\\','/',$_SERVER['SCRIPT_NAME']);
$sitepath = substr($scriptpath, 0, strrpos($scriptpath, '/'));
$siteurl = ($_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://').$_SERVER['HTTP_HOST'].$sitepath.'/';
require_once("lib/notify.class.php");
require_once("lib/submit.class.php");