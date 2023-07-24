<?php
$title = "订单列表";
include "head.php";
?>

        <div class="row">
          
          <div class="col-lg-12">
            <div class="card border">
              <div class="card-header">
                <h4><?=$title?></h4>
              </div>
              <div class="card-body">
              <div class="panel-footer">点击状态即可一键处理状态为已处理</div><br>
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>下单账号</th>
                        <th>商品名称</th>
                        <th>订单号</th>
                        <th>下单日期</th>
                        <th>订单状态</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php
                     $SQL = Query("select * from `mall_order` where 1");
                     while($row = Fetch($SQL)){
                     if($row['active'] == 0){
                     $type = '<a href="?active=cl&id='.$row['id'].'" class="label label-warning">待处理</a>';
                     } else if($row['active'] == 1){
                     $type = '<span class="label label-success">已处理</span>';
                     }
                     ?>
                      <tr>
                        <td><?=$row['id']?></td>
                        <td><?=$row['user']?></td>
                        <td><?=$row['name']?></td>
                        <td><?=$row['ddh']?></td>
                        <td><?=$row['date']?></td>
                        <td><?=$type?></td>
                      </tr>
                      <?php
                      }
                      if($_GET['active'] == "cl"){
                      $id = $_GET['id'];
                      $SQL = Query("update `mall_order` set `active` = 1 where id = '{$id}'");
                      Alert('处理成功','./orderlist.php');
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
                <?php
                $Page = new Page($order,10);
                echo "<center>".$Page->showPage()."</center>";
                ?>
              </div>
            </div>
          </div>
          
          
<?php
include "foot.php";
?>