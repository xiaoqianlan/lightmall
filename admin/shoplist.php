<?php
$title = "商品列表";
include "head.php";
$step = isset($_GET['step']) ? $_GET['step'] : "list";
?>
<div class="row">

<?php
if($step == "list"){
?>

          <div class="col-lg-12">
            <div class="card border">
              <div class="card-header">
                <h4><?=$title?></h4>
              </div>
              <div class="card-body">
              <div class="panel-footer">什么 ? 商品数量还不够 ? <a href="?step=add" class="label label-success">点我去添加</a></div><br>
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>商品名称</th>
                        <th>商品价格</th>
                        <th>商品状态</th>
                        <th>操作Ta</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php
                     $SQL = Query("select * from `mall_shop` where 1");
                     while($row = Fetch($SQL)){
                     if($row['active'] == 0){
                     $type = '<span class="label label-warning">下架ing</span>';
                     } else if($row['active'] == 1){
                     $type = '<span class="label label-success">上架ing</span>';
                     }
                     
                     if($row['active'] == 0){
                     $active = '<a href="?active=sj&id='.$row['id'].'" class="label label-warning">上架</a>';
                     } else if($row['active'] == 1){
                     $active = '<a href="?active=xj&id='.$row['id'].'" class="label label-success">下架</a>';
                     }
                     ?>
                      <tr>
                        <td><?=$row['id']?></td>
                        <td><?=$row['name']?></td>
                        <td><?=$row['money']?></td>
                        <td><?=$type?></td>
                        <td><?=$active?> / <a href="?step=update&id=<?=$row['id']?>" class="label label-info">编辑</a> / <a href="?step=delete&id=<?=$row['id']?>" class="label label-danger">删除Ta</a></td>
                      </tr>
                      <?php
                      }
                      if($_GET['active'] == "sj"){
                      $id = $_GET['id'];
                      $SQL = Query("update mall_shop set `active` = 1 where id = '{$id}'");
                      Alert('上架成功','./shoplist.php');
                      } else if($_GET['active'] == "xj"){
                      $id = $_GET['id'];
                      $SQL = Query("update mall_shop set `active` = 0 where id = '{$id}'");
                      Alert('下架成功','./shoplist.php');
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
                <?php
                $Page = new Page($shop,10);
                echo "<center>".$Page->showPage()."</center>";
                ?>
              </div>
            </div>


<?php
} else if($step == "add"){

if(!empty($_POST['name']) && !empty($_POST['money']) && !empty($_POST['msg'])){
if($_POST){
$name = Safe($_POST['name']);
$money = Safe($_POST['money']);
$msg = Safe($_POST['msg']);
$fenzhan_common_money = Safe($_POST['fenzhan_common_money']);
$fenzhan_major_money = Safe($_POST['fenzhan_major_money']);

$SQL = Query("INSERT INTO `mall_shop` (`name`,`money`,`msg`,`fenzhan_common_money`,`fenzhan_major_money`) values ('".$name."','".$money."','".$msg."','".$fenzhan_common_money."','".$fenzhan_major_money."')");

if($SQL){
Alert('添加商品成功','./shoplist.php');
}else{
Alert('添加商品失败','./shoplist.php?step=add','error');
}
}
}

?>


          <div class="col-lg-12">
            <div class="card border">
              <div class="card-header">
                <h4>添加商品</h4>
              </div>
              <div class="card-body">
                  
                  <form action="" method="post" class="edit-form">
                   <div class="form-group">
                      <label for="config_group">商品名称</label>
                      <input class="form-control" name="name">
                    </div>
                    
                    <div class="form-group">
                      <label for="config_group">商品价格</label>
                      <input class="form-control" name="money">
                    </div>
                    
                    <div class="form-group">
                      <label for="config_group">普通分站拿货价格</label>
                      <input class="form-control" name="fenzhan_common_money">
                    </div>
                    
                    <div class="form-group">
                      <label for="config_group">专业分站拿货价格</label>
                      <input class="form-control" name="fenzhan_major_money">
                    </div>

                    <div class="form-group">
                      <label for="config_group">商品描述</label>
                      <textarea class="form-control" name="msg" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary m-r-5">添加Ta</button>
                      <button type="button" class="btn btn-default" onclick="javascript:history.back(-1);return false;">返 回</button>
                    </div>
                  </form>
                  
                </div>
              </div>

            </div>


<?php
} else if($step == "update"){
$id = $_GET['id'];
$query = Query("select * from mall_shop where id='{$id}'");
$row = Fetch($query);
?>


          <div class="col-lg-12">
            <div class="card border">
              <div class="card-header">
                <h4>编辑商品</h4>
              </div>
              <div class="card-body">
                  
                  <form action="?step=submit_update&id=<?=$id?>" method="post" class="edit-form">
                   <div class="form-group">
                      <label for="config_group">商品名称</label>
                      <input class="form-control" value="<?=$row['name']?>" name="name">
                    </div>
                    
                    <div class="form-group">
                      <label for="config_group">商品价格</label>
                      <input class="form-control" value="<?=$row['money']?>" name="money">
                    </div>
                    
                    <div class="form-group">
                      <label for="config_group">普通分站拿货价格</label>
                      <input class="form-control" value="<?=$row['fenzhan_common_money']?>" name="fenzhan_common_money">
                    </div>
                    
                    <div class="form-group">
                      <label for="config_group">专业分站拿货价格</label>
                      <input class="form-control" value="<?=$row['fenzhan_major_money']?>" name="fenzhan_major_money">
                    </div>

                    <div class="form-group">
                      <label for="config_group">商品描述</label>
                      <textarea class="form-control" name="msg" rows="5"><?=$row['msg']?></textarea>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary m-r-5">编辑Ta</button>
                      <button type="button" class="btn btn-default" onclick="javascript:history.back(-1);return false;">返 回</button>
                    </div>
                  </form>
                  
                </div>
              </div>

            </div>
            





<?php
}else if($step == "submit_update"){
$id = $_GET['id'];
if(!empty($_POST['name']) && !empty($_POST['money']) && !empty($_POST['msg'])){
if($_POST){
$name = Safe($_POST['name']);
$money = Safe($_POST['money']);
$msg = Safe($_POST['msg']);
$fenzhan_common_money = Safe($_POST['fenzhan_common_money']);
$fenzhan_major_money = Safe($_POST['fenzhan_major_money']);

$SQL = Query("UPDATE `mall_shop` set `name`='{$name}', `money`='{$money}', `msg`='{$msg}', `fenzhan_common_money`='{$fenzhan_common_money}', `fenzhan_major_money`='{$fenzhan_major_money}' where id = '{$id}'");

if($SQL){
Alert('编辑商品成功','./shoplist.php');
}else{
Alert("编辑商品失败","./shoplist.php?step=update&id={$id}","error");
}
}
}
}else if($step == "delete"){
$id = $_GET['id'];
$Query = Query("delete from mall_shop where id='{$id}'");
if($Query){
Alert('删除商品成功','./shoplist.php');
}else{
Alert("删除商品失败","./shoplist.php","error");
}
}
?>
 </div>
<?php
include "foot.php";
?>