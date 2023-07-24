<?php
$title = '壁纸设置';
include "head.php";
?>
  <div class="row">
<?php

if($_POST){
$bg_url = $_POST['bg_url'];
$result = Query("UPDATE `mall_config` SET `bg_url`='{$bg_url}' where id = 1");
if($result){
Alert('保存配置成功','bg.php');
}else{
Alert('保存配置失败','bg','error');
}
}
?>
          <div class="col-lg-12">
            <div class="card border">
              <div class="card-header">
                <h4><?=$title?></h4>
              </div>
              <div class="tab-content">
                <div class="tab-pane active">
                  
                  <form action="" method="post" class="edit-form">
                   <div class="form-group">
                      <label for="config_group">图片URL</label>
                      <textarea class="form-control" name="bg_url" rows="1" ><?=$conf['bg_url']?></textarea>
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
include "foot.php";
?>