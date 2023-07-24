<?php
$title = "控制台";
include "head.php";
?>
        
        <div class="row">
          <div class="col-sm-6 col-lg-3">
            <div class="card bg-primary border">
              <div class="card-body clearfix">
                <div class="pull-right">
                  <p class="h6 text-white m-t-0">总收入</p>
                  <p class="h3 text-white m-b-0"><?=$money?></p>
                </div>
                <div class="pull-left"> <span class="img-avatar img-avatar-48 bg-translucent"><i class="mdi mdi-currency-cny fa-1-5x"></i></span> </div>
              </div>
            </div>
          </div>
          
          <div class="col-sm-6 col-lg-3">
            <div class="card bg-danger border">
              <div class="card-body clearfix">
                <div class="pull-right">
                  <p class="h6 text-white m-t-0">商品总数</p>
                  <p class="h3 text-white m-b-0"><?=$shop?></p>
                </div>
                <div class="pull-left"> <span class="img-avatar img-avatar-48 bg-translucent"><i class="mdi mdi-comment-outline fa-1-5x"></i></span> </div>
              </div>
            </div>
          </div>
          
          <div class="col-sm-6 col-lg-3">
            <div class="card bg-info border">
              <div class="card-body clearfix">
                <div class="pull-right">
                  <p class="h6 text-white m-t-0">分站总数</p>
                  <p class="h3 text-white m-b-0"><?=$users?></p>
                </div>
                <div class="pull-left"> <span class="img-avatar img-avatar-48 bg-translucent"><i class="mdi mdi-account fa-1-5x"></i></span> </div>
              </div>
            </div>
          </div>
          
          <div class="col-sm-6 col-lg-3">
            <div class="card bg-success border">
              <div class="card-body clearfix">
                <div class="pull-right">
                  <p class="h6 text-white m-t-0">下单总量</p>
                  <p class="h3 text-white m-b-0"><?=$order?></p>
                </div>
                <div class="pull-left"> <span class="img-avatar img-avatar-48 bg-translucent"><i class="mdi mdi-arrow-down-bold fa-1-5x"></i></span> </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="row">
          
          <div class="col-lg-12">
            <div class="card border">
              <div class="card-header">
                <h4>远程公告</h4>
              </div>
              <div class="card-body">
              <!-- 链接 -->
              <p><iframe src="http://hbqpy.cn/mall/2.0.html?r=<?php echo time()?>" style="width:100%;height:250px;"></iframe></p>
               </div>
            </div>
          </div>
          
        </div>
        
<?php
include "foot.php"
?>