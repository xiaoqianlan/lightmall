<?php
$title = '余额提现处理';
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
                        <th>账号uid</th>
                        <th>提现金额</th>
                        <th>订单状态</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php
                     $SQL = Query("select * from `mall_tixian` where 1");
                     $query = Query("select * from `mall_users` where qq='{$qq}'");
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
                      if($_GET['active'] == "cl"){
                      $id = $_GET['id'];
                      $SQL = Query("update `mall_tixian` set `status` = 1 where id = '{$id}'");
                      Alert('处理成功','./tixian.php');
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