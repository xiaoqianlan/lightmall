<?php
$title = "公告配置";
include "head.php";
?>
  <div class="row">
<?php

if($_POST){
$notice = $_POST['notice'];
$result = Query("UPDATE `mall_config` SET `notice`='{$notice}' where id = 1");
if($result){
Alert('保存配置成功','notice.php');
}else{
Alert('保存配置失败','notice.php','error');
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
                      <label for="config_group">前台公告</label>
                      <textarea class="form-control" name="notice" rows="5" placeholder="......" ><?=$conf['notice']?></textarea>
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