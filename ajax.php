<?php
include './Inc/core.php';
$act = isset($_GET['act']) ? $_GET['act'] : null;
header('Content-Type: application/json; charset=UTF-8');

switch($act) {
    
    case "get_shop": # 选择商品
    $get_id = intval($_GET['id']);
    $SQL = Query("SELECT * FROM `mall_shop` where id = '{$get_id}'");
    $res = Fetch($SQL);    
	$result = ['code'=>1,'money'=>$res['money'],'msg'=>$res['msg'],'name'=>$res['name']];
	break;
	
	case "get_user_shop":
    $get_id = intval($_GET['id']);
    $type = Safe($_GET['user_type']);
    $SQL = Query("SELECT * FROM `mall_shop` where id = '{$get_id}'");
    $res = Fetch($SQL);
    if($type == "common"){
	$result = ['code'=>1,'money'=>$res['fenzhan_common_money'],'msg'=>$res['msg'],'name'=>$res['name']];
	}else{
	$result = ['code'=>1,'money'=>$res['fenzhan_major_money'],'msg'=>$res['msg'],'name'=>$res['name']];
	}
	break;
	
	case "get_order": # 查询订单
    $user = Safe(intval($_GET['user']));
    $SQL = Query("SELECT * FROM `mall_order` where user = '{$user}' limit 10");
    $res = Fetch($SQL);
    if($res['active'] == 0){
      $active = '<span class="label label-warning">待处理</span>';
    } else if($res['active'] == 1){
      $active = '<span class="label label-success">已处理</span>';
     }
    if($res['user'] == $user){
	$result = ['code'=>1,'user'=>$res['user'],'name'=>$res['name'],'ddh'=>$res['ddh'],'date'=>$res['date'],'active'=>$active];
	}else{
	$result = ['code'=>-1,'msg'=>'无此账号下单记录'];
	}
	break;
   
   case "clone": # 克隆站点
   $key=Safe($_GET['key']);
   if($key == $conf['apikey']){
   $rs=Query("SELECT * FROM mall_shop order by id asc");
   $shop=array();
   while($res = Fetch($rs)){
   	 $shop[]=$res;
	}
	$result = ['code'=>1,'shop'=>$shop];
	}else{
	$result = ['code'=>-1,'msg'=>'克隆密钥错误或非同系统'];
	}
	break;
	
	//------------------------------------------------------------//
		 
    default:
    $result = ['code'=>-1,'msg'=>'非法操作 ! '];
    break;
        
}


exit(json_encode($result));//传参
