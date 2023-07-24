<?php
$title = "模板配置";
include "head.php";
$step = isset($_GET['step']) ? $_GET['step'] : "set";
?>
<?php
if($step == "set"){

if($_POST){
$muban = $_POST['muban'];
$result = Query("UPDATE `mall_config` SET `muban`='{$muban}' where id = 1");
if($result){
Alert('保存配置成功','muban.php');
}else{
Alert('保存配置失败','muban.php','error');
}
}}
?>
<div class="col-lg-12">
            <div class="card border">
             <ul class="nav nav-tabs page-tabs">
                <li class="active"> <a href="set.php">模板设置</a> </li>
           </ul>
           <form action="" method="post" class="edit-form">
              <div class="tab-content">
                <div class="tab-pane active">
                    <div class="form-group">
                      <label for="type">模板设置</label> 
                    <select name="muban" class="form-control">
                     <option value="default" <?php if ($conf["muban"] == "default") echo "selected";?>>默认模板</option>
                      <option value="color" <?php if ($conf["muban"] == "color") echo "selected";?>>七彩模板</option>                                      
                                                    </select>
                                                </div>    
                   <br>
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
?>
</div>        
<?php
include "foot.php";
?>
                  