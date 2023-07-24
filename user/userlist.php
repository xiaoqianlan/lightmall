<?php
$title='我的旗下';
include './head.php';
$step = isset($_GET['step']) ? Safe($_GET['step']) : "list";
if($step == "list"){
$con='我共添加 <b>'.$my_qx.'</b> 个分站';
?>
<div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
      <div class="panel panel-primary">
   <div class="panel-heading" style="background: linear-gradient(to right,#87CEEB,#FF83FA);"><h3 class="panel-title"><?=$con?></h3></div>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead><tr><th>ID</th><th>分站账号</th><th>分站长QQ</th><th>操作</th></tr></thead>
          <tbody>
          <?php
          $SQL = Query("select * from mall_users where superior = '{$usered['uid']}'");
          while($row = Fetch($SQL)){
          ?>
          <tr>
            <td><?=$row['uid']?></td>
            <td><?=$row['user']?></td>
            <td><?=$row['qq']?></td>
            <td><a onclick="layer.alert('无权限');" class="label label-danger">删除Ta</a></td>
        </tr>
        <?php
        }
        ?>          
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php 
}else if($step == "add"){

if($_POST){
$qz = $_POST['qz'];
$user = $_POST['user'];
$pwd = $_POST['pwd'];
$qq = $_POST['qq'];
$name = $_POST['name'];
$URL = $qz.".".$_SERVER['HTTP_HOST'];
$SQL = Query("select * from `mall_users` where user = '{$user}'");
$res = Fetch($SQL);
$urls = explode(".".$_SERVER['HTTP_HOST'], $res['url']);
if($res['user'] === $user or $URL === $urls[0]){
alert('已有此前缀或账号','userlist.php?step=add','error');
}else{
$result = Query("insert into `mall_users` (`url`,`type`,`user`,`pwd`,`qq`,`name`) values ('".$URL."', 'common', '".$user."', '".$pwd."', '".$qq."', '".$name."')");
if($result){
alert('添加旗下成功','userlist.php');
}else{
alert('添加旗下失败','userlist.php?step=add','error');
}
}
}
?>
 <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
      <div class="panel panel-primary">
			<div class="panel-heading" style="background: linear-gradient(to right,#87CEEB,#FF83FA);"><h3 class="panel-title">添加旗下站点</h3></div>
        <div class="panel-body">
          <form action="" method="post" class="form-horizontal" role="form">
            <div class="input-group">
              <span class="input-group-addon">分站前缀</span>
              <input type="text" name="qz" value="" class="form-control" placeholder="例如 : wow" required="required"/>
            </div><br/>
             <div class="input-group">
              <span class="input-group-addon">站点名称</span>
              <input type="text" name="name" value="" class="form-control" placeholder="例如 : xx商城" required="required"/>
            </div><br/>
             <div class="input-group">
              <span class="input-group-addon">分站账号</span>
              <input type="text" name="user" value="" class="form-control" placeholder="例如 : user" required="required"/>
            </div><br/>
             <div class="input-group">
              <span class="input-group-addon">分站密码</span>
              <input type="text" name="pwd" value="" class="form-control" placeholder="例如 : 123456" required="required"/>
            </div><br/>
             <div class="input-group">
              <span class="input-group-addon">分站长QQ</span>
              <input type="text" name="qq" value="" class="form-control" placeholder="没有例如，直接填QQ号" required="required"/>
            </div><br/>
				<input type="submit" class="btn btn-info btn-block" value="确定添加">
			</form>
        </div>
      </div>
    </div>
  </div>
<script>
$(document).ready(function(){
    $("input[name='qz']").change(function(){
        var qz = $(this).val();
		if(qz=='www'){layer.alert('www为系统保留域名！');return false;}
		if(qz=='ds'){layer.alert('ds为系统保留域名！');return false;}
    });
    
});   
</script>
<?php
}
?>