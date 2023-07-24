<?php
$title = '系统更新';
include "head.php";
$file = "http://hbqpy.cn/mall/update/2.1.zip";

?>

        <div class="row">
          
          <div class="col-lg-12">
            <div class="card border">
              <div class="card-header">
                <h4><?=$title?></h4>
              </div>
            <div class="card-body">
            <?php
if($file_exists = (@fopen($file, "r"))){
echo "有新版本可更新，立即去<a href='http://hbqpy.cn/mall/update/2.1.zip'>下载</a>";
}else{
echo "暂无新版本";
}

?>