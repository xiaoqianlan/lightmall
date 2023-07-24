<?php
$title='修改个人信息';
include './head.php';

if($_POST){
$user = $_POST['user'];
$pwd = $_POST['pwd'];
$qq = $_POST['qq'];
$result = Query("UPDATE `mall_users` SET `user`='{$user}',`pwd`='{$pwd}',`qq`='{$qq}' where user = '{$usered['user']}'");
if($result){
alert('修改信息成功','login.php?out');
}else{
alert('修改信息失败','pwd.php','error');
}
}
?>
<div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
      <div class="panel panel-primary">
			<div class="panel-heading" style="background: linear-gradient(to right,#87CEEB,#FF83FA);"><h3 class="panel-title">修改个人信息</h3></div>
        <div class="panel-body">
          <form action="" method="post" class="form-horizontal" role="form">
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
              <input type="text" name="user" value="<?php echo $usered['user'];?>" class="form-control" placeholder="账号" required="required"/>
            </div><br/>
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
              <input type="text" name="pwd" class="form-control" value="<?php echo $usered['pwd'];?>" placeholder="密码" required="required"/>
            </div><br/>
            <div class="input-group">
              <span class="input-group-addon">分站长QQ</span>
              <input type="text" name="qq" class="form-control" value="<?php echo $usered['qq'];?>" placeholder="QQ" required="required"/>
            </div><br/>
				<input type="submit" class="btn btn-info btn-block" value="确定修改">
			</form>
        </div>
      </div>
    </div>
  </div>