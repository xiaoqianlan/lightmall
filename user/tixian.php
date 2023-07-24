<?php
$title='余额提现';
include './head.php';
$step = isset($_GET['step']) ? Safe($_GET['step']) : "list";
if($step == "list"){
$con='提现记录';
?>
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
       <div class="panel-footer"><a href="?step=get" class="btn btn-xs btn-success">我要提现</a></span>
&nbsp;<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $conf['qq']?>&site=qq&menu=yes" class="btn btn-xs btn-info"> 咨询客服</a></div><br>
 <div class="col-lg-12 center-block" style="float: none;">
       <div class="panel panel-primary">
   <div class="panel-heading" style="background: linear-gradient(to right,#87CEEB,#FF83FA);"><h3 class="panel-title"><?=$con?></h3></div>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead><tr><th>提交ID</th><th>账号uid</th><th>申请金额</th><th>提现状态</th></tr></thead>
          <tbody>
          <?php
          $SQL = Query("select * from mall_tixian where uid = '{$usered['uid']}'");
                     while($row = Fetch($SQL)){
                     if($row['status'] == 0){
                     $type = '<a href="?active=cl&id='.$row['id'].'" class="label label-warning">待处理</a>';
                     } else if($row['status'] == 1){
                     $type = '<span class="label label-success">已处理</span>';
                     }
                     ?>
          
          <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['uid']?></td>
            <td><?=$row['money']?></td>
            <td><?=$type?></td>
        </tr>
        <?php
        }
        ?>          
          </tbody>
        </table>
      </div>
    </div>
  </div>
    </div>
<?php 
}else if($step == "get"){

if($_POST){
$money = $_POST['money'];
if($money>$usered['money'] || $money<=0){
	exit("<script language='javascript'>alert('所输入的提现金额大于你所拥有的余额！');history.go(-1);</script>");
}
if($money<$conf['tixian_money']){
	exit("<script language='javascript'>alert('单笔提现金额不能低于{$conf['tixian_money']}元！');history.go(-1);</script>");
}
$sds=$DB->query("INSERT INTO `mall_tixian` (`uid`, `money`) VALUES ('".$usered['uid']."', '".$money."')");
if($sds){
	$DB->query("update mall_users set money=money-{$money} where uid='{$usered['uid']}'");
	exit("<script language='javascript'>alert('提现操作成功，本次实际到账金额:{$money}元，请等待管理员人工转账！');window.location.href='tixian.php';</script>");
}else{
	exit("<script language='javascript'>alert('提现失败！');history.go(-1);</script>");
}
}
?>
 <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
      <div class="panel panel-primary">
			<div class="panel-heading" style="background: linear-gradient(to right,#87CEEB,#FF83FA);"><h3 class="panel-title">申请提现</h3></div>
          <div class="panel-body">
          <form action="" method="post" class="form-horizontal" role="form">

              <div class="input-group">
				<span class="input-group-addon">账户余额</span>
					<input type="text" class="form-control" value="<?=$usered['money']?>元" disabled>
				</div></br>

			<div class="input-group">
				<span class="input-group-addon">提现金额</span>
					<input type="number" name="money" class="form-control" placeholder="输入要提现金额">
				</div><br/>
				<input type="submit" class="btn btn-info btn-block" value="确定添加">
			</form>
        </div>
      </div>
    </div>
  </div>
<?php
}
?>