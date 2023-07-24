<?php
$title = "网站配置";
include "head.php";
$step = isset($_GET['step']) ? $_GET['step'] : "set";
?>
  <div class="row">
<?php
if($step == "set"){

if($_POST){
$title = $_POST['title'];
$qq = $_POST['qq'];
$keywords = $_POST['keywords'];
$description = $_POST['description'];
$key = $_POST['key'];
$qqq = $_POST['qqq'];
$title_next = $_POST['title_next'];
$result = Query("UPDATE `mall_config` SET `title`='{$title}',`qq`='{$qq}',`title_next`='{$title_next}',`keywords`='{$keywords}',`description`='{$description}',`qqq`='{$qqq}',`apikey`='{$key}' where id = 1");
if($result){
Alert('保存配置成功','set.php');
}else{
Alert('保存配置失败','set.php','error');
}
}
?>
          <div class="col-lg-12">
            <div class="card border">
             <ul class="nav nav-tabs page-tabs">
                <li class="active"> <a href="set.php">网站设置</a> </li>
                <li> <a href="set.php?step=pay">支付配置</a> </li>
                <li> <a href="set.php?step=pwd">个人信息</a> </li>
                <li> <a href="set.php?step=pic">分站配置</a> </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active">
                  
                  <form action="" method="post" class="edit-form">
                   <div class="form-group">
                      <label for="config_group">网站名称</label>
                      <input class="form-control" name="title" value="<?=$conf['title']?>" >
                    </div>
                    
                    <div class="form-group">
                      <label for="config_group">同系统克隆key</label>
                      <input class="form-control" name="key" value="<?=$conf['apikey']?>" >
                    </div>

                    <div class="form-group">
                      <label for="config_group">站长QQ</label>
                      <input class="form-control" name="qq" value="<?=$conf['qq']?>" >
                    </div>

                      <div class="form-group">
                      <label for="config_group">标题后缀</label>
                      <input class="form-control" name="title_next" value="<?=$conf['title_next']?>" >
                    </div>
                    
                    <div class="form-group">
                      <label for="config_group">网站关键词</label>
                      <textarea class="form-control" name="keywords" rows="5" placeholder="网站关键词" ><?=$conf['keywords']?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="config_group">网站SEO</label>
                      <textarea class="form-control" name="description" rows="5" placeholder="网站SEO" ><?=$conf['description']?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="config_group">QQ群链接</label>
                      <textarea class="form-control" name="qqq" rows="3" placeholder="http://" ><?=$conf['qqq']?></textarea>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary m-r-5">确 定</button>
                      <button type="button" class="btn btn-default" onclick="javascript:history.back(-1);return false;">返 回</button>
                    </div>
                  </form>
                  
                </div>
              </div>

            </div>
          </div>
          

<?php
} else if($step == "pay"){

if($_POST){
$yzf_api = $_POST['yzf_api'];
$yzf_id = $_POST['yzf_id'];
$yzf_key = $_POST['yzf_key'];
$result = Query("UPDATE `mall_config` SET `yzf_api`='{$yzf_api}',`yzf_id`='{$yzf_id}',`yzf_key`='{$yzf_key}' where id = 1");
if($result){
Alert('对接支付成功','set.php?step=pay');
}else{
Alert('对接支付失败','set.php?step=pay','error');
}
}
?>

          <div class="col-lg-12">
            <div class="card border">
             <ul class="nav nav-tabs page-tabs">
                <li> <a href="set.php">网站设置</a> </li>
                <li class="active"> <a href="set.php?step=pay">支付配置</a> </li>
                <li> <a href="set.php?step=pwd">个人信息</a> </li>
                <li> <a href="set.php?step=pic">分站配置</a> </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active">
                  
                  <form action="" method="post" class="edit-form">
		<div class="alert alert-danger">
            易支付URL请加上http://或https:// <br/>
            例如http://hbqpy.cn/
        </div>
                   <div class="form-group">
                      <label for="config_group">易支付URL</label>
                      <input class="form-control" name="yzf_api" placeholder="链接" value="<?=$conf['yzf_api']?>" >
                    </div>
                    <div class="form-group">
                      <label for="config_group">易支付ID</label>
                      <input class="form-control" name="yzf_id" placeholder="uid" value="<?=$conf['yzf_id']?>" >
                    </div>
                    <div class="form-group">
                      <label for="config_group">易支付KEY</label>
                      <input class="form-control" name="yzf_key" placeholder="秘钥" value="<?=$conf['yzf_key']?>" >
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary m-r-5">确 定</button>
                      <button type="button" class="btn btn-default" onclick="javascript:history.back(-1);return false;">返 回</button>
                    </div>
                  </form>
                  
                </div>
              </div>

            </div>
          </div>
          



<?php
} else if($step == "pwd"){

if($_POST){
$user = $_POST['user'];
$pwd = $_POST['pwd'];
$result = Query("UPDATE `mall_config` SET `user`='{$user}',`pwd`='{$pwd}' where id = 1");
if($result){
alert('修改账号成功','login.php?out');
}else{
alert('修改账号失败','set.php?step=pwd','error');
}
}

?>



          <div class="col-lg-12">
            <div class="card border">
              <ul class="nav nav-tabs page-tabs">
                <li> <a href="set.php">网站设置</a> </li>
                <li> <a href="set.php?step=pay">支付配置</a> </li>
                <li class="active"> <a href="set.php?step=pwd">个人信息</a> </li>
                <li> <a href="set.php?step=pic">分站配置</a> </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active">
                  
                  <form action="" method="post" class="edit-form">
                   <div class="form-group">
                      <label for="config_group">站长账号</label>
                      <input class="form-control" name="user" placeholder="您这家伙好懒，啥都没写" value="<?=$conf['user']?>" >
                    </div>
                    <div class="form-group">
                      <label for="config_group">站长密码</label>
                      <input class="form-control" name="pwd" placeholder="您这家伙好懒，啥都没写" value="<?=$conf['pwd']?>" >
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary m-r-5">确 定</button>
                      <button type="button" class="btn btn-default" onclick="javascript:history.back(-1);return false;">返 回</button>
                    </div>
                  </form>
                  
                </div>
              </div>

            </div>
          </div>
          


<?php
}else if($step == "clone"){
?>


<div class="col-lg-12">
  <div class="card border">
 <div class="card-body clearfix">
 <form action="./set.php?mod=shequ_n" method="post" class="form-horizontal" role="form"><input type="hidden" name="do" value="submit"/>
	<div class="form-group">
	 <label class="col-sm-2 control-label">克隆密钥</label>
	 <div class="col-sm-10"><input type="text" name="key" value="<?=$conf['apikey']?>" class="form-control" disabled/></div>
	</div>
 </form>
 
</div>
<div class="panel-footer">
<span class="mdi mdi-alert-circle"></span>
此密钥是用于其他站点克隆本站商品<br/>
提示：修改API对接密钥可同时重置克隆密钥。<br/>
</div>
</div>


<?php
} else if($step == "fh"){

if($_POST){
$fh_url = $_POST['fh_url'];
$result = Query("UPDATE `mall_config` SET `fh_url`='{$fh_url}' where id = 1");
if($result){
Alert('保存配置成功','set.php?step=fh');
}else{
Alert('保存配置失败','set.php?step=fh','error');
}
}
?>

          <div class="col-lg-12">
            <div class="card border">
              <div class="card-header">
                <h4>防红接口配置</h4>
              </div>
                  
              <div class="tab-content">
                <div class="tab-pane active">
                  <form action="" method="post" class="edit-form">
                   <div class="form-group">
                      <label for="config_group">防红接口</label>
                      <input class="form-control" name="fh_url" placeholder="网址" value="<?=$conf['fh_url']?>" >
                    </div>
                      <div class="panel-footer">
                      <span class="mdi mdi-alert-circle"></span>
一般防红接口地址为 http://防红网站域名/dwz.php?longurl= 具体可以咨询相应站长</div></br>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary m-r-5">确 定</button>
                      <button type="button" class="btn btn-default" onclick="javascript:history.back(-1);return false;">返 回</button>
                    </div>
                  </form>
                  
                </div>
              </div>

            </div>
          </div>
          

<?php
} else if($step == "pic"){

if($_POST){
$fenzhan_major = $_POST['fenzhan_major'];
$fenzhan_qqqun = $_POST['fenzhan_qqqun'];
$fenzhan_common = $_POST['fenzhan_common'];
$fenzhan_common_fl = $_POST['fenzhan_common_fl'];
$fenzhan_major_fl = $_POST['fenzhan_major_fl'];
$fenzhan_open = $_POST['fenzhan_open'];
$tixian_money = $_POST['tixian_money'];
$host = $_POST['host'];
$result = Query("UPDATE `mall_config` SET `fenzhan_major`='{$fenzhan_major}',`fenzhan_qqqun`='{$fenzhan_qqqun}',`fenzhan_common`='{$fenzhan_common}',`fenzhan_common_fl`='{$fenzhan_common_fl}',`fenzhan_major_fl`='{$fenzhan_major_fl}', `fenzhan_open`='{$fenzhan_open}',`host`='{$host}',`tixian_money`='{$tixian_money}' where id = 1");
if($result){
alert('配置分站成功','set.php?step=pic');
}else{
alert('配置分站失败','set.php?step=pic','error');
}
}

?>


          <div class="col-lg-12">
            <div class="card border">
              <ul class="nav nav-tabs page-tabs">
                <li> <a href="set.php">网站设置</a> </li>
                <li> <a href="set.php?step=pay">支付配置</a> </li>
                <li> <a href="set.php?step=pwd">个人信息</a> </li>
                <li class="active"> <a href="set.php?step=pic">分站配置</a> </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active">
                  
                  <form action="" method="post" class="edit-form">
                  
                   <div class="form-group">
                      <label for="type">是否开放搭建分站</label> 
                    <select name="fenzhan_open" class="form-control">
                    <?php
                    if($conf['fenzhan_open'] == "on"){
                    ?>
                        <option value="on">开放</option>
                       <option value="off">不开放</option>
                   <?php
                   } else if($conf['fenzhan_open'] == "off"){
                    ?> 
                   <option value="off">不开放</option>
                       <option value="on">开放</option>
                  <?php } ?>
                    </select></div><br>
                    
                    <div class="form-group">
                      <label for="config_group">可用域名</label>
                      <input class="form-control" name="host" placeholder="您这家伙好懒，啥都没写" value="<?php echo $conf['host'] ? $conf['host'] : $_SERVER['HTTP_HOST']; ?>" >
                    </div>
                    <div class="form-group">
                      <label for="config_group">通知群链接</label>
                      <input class="form-control" name="fenzhan_qqqun" placeholder="http://" value="<?=$conf['fenzhan_qqqun']?>" >
                    </div>
                    <div class="form-group">
                      <label for="config_group">分站满多少提现</label>
                      <input class="form-control" name="tixian_money" placeholder="您这家伙好懒，啥都没写" value="<?=$conf['tixian_money']?>" >
                    </div>
                   <div class="form-group">
                      <label for="config_group">专业分站</label>
                      <input class="form-control" name="fenzhan_major" placeholder="您这家伙好懒，啥都没写" value="<?=$conf['fenzhan_major']?>" >
                    </div>
                    <div class="form-group">
                      <label for="config_group">普通分站</label>
                      <input class="form-control" name="fenzhan_common" placeholder="您这家伙好懒，啥都没写" value="<?=$conf['fenzhan_common']?>" >
                    </div>
                    <div class="form-group">
                      <label for="config_group">普通返利分站[ 购买操作后 ]</label>
                      <input class="form-control" name="fenzhan_common_fl" placeholder="您这家伙好懒，啥都没写" value="<?=$conf['fenzhan_common_fl']?>" >
                      <small>用户每单购买后，余额加多少元; 如: 1元</small>
                    </div>
                     <div class="form-group">
                      <label for="config_group">专业返利分站[ 购买操作后 ]</label>
                      <input class="form-control" name="fenzhan_major_fl" placeholder="您这家伙好懒，啥都没写" value="<?=$conf['fenzhan_major_fl']?>" >
                      <small>用户每单购买后，余额加多少元; 如: 1元</small>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary m-r-5">确 定</button>
                      <button type="button" class="btn btn-default" onclick="javascript:history.back(-1);return false;">返 回</button>
                    </div>
                  </form>
                  
                </div>
              </div>

            </div>
          </div>


<?php
}
?>
</div>        
<?php
include "foot.php";
?>