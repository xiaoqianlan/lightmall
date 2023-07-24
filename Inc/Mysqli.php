<?php
# 索引一下
$SQL = Query("SELECT * FROM `mall_config` where id = 1");
$conf = Fetch($SQL);

# 索引一下
$usered = $_SESSION['usered'];
$SQL = Query("SELECT * FROM `mall_users` where user = '{$usered}'");
$usered = Fetch($SQL);

# 获取订单号总量
$SQL = Query("SELECT * FROM `mall_order` where 1");
$order = Rows($SQL);

# 获取商品总量
$SQL = Query("SELECT * FROM `mall_shop` where 1");
$shop = Rows($SQL);

# 获取分站总量
$SQL = Query("SELECT * FROM `mall_users` where 1");
$users = Rows($SQL);

# 获取旗下分站总量
$SQL = Query("SELECT * FROM `mall_users` where superior='{$usered['uid']}'");
$my_qx = Rows($SQL);

# 获取商品总量
$SQL = Query("SELECT sum(money) as `moneys` FROM `mall_order` where 1");
$arr = Fetch($SQL);
$money = $arr['moneys'] ? $arr['moneys'] : 0;