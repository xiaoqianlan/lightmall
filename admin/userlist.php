<?php
$title = "分站列表";
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
            <div class="panel-footer">什么 ? 分站用户不够理想 ? <a href="?step=add" class="label label-success">点我去添加</a></div><br>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>分站账号</th>
                        <th>分站密码</th>
                        <th>分站权限</th>
                        <th>分站状态</th>
                        <th>操作Ta</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $SQL = Query("select * from `mall_users` where 1");
                    while($row = Fetch($SQL)){
                        if($row['active'] == 0){
                            $type = '<span class="label label-warning">封禁中</span>';
                        } else if($row['active'] == 1){
                            $type = '<span class="label label-success">正常</span>';
                        }

                        if($row['type'] == "common"){
                            $qx = '<span class="label label-warning">普通分站</span>';
                        } else if($row['type'] == "major"){
                            $qx = '<span class="label label-success">专业分站</span>';
                        }

                        if($row['active'] == 0){
                            $active = '<a href="?active=jj&uid='.$row['uid'].'" class="label label-warning">解禁站点</a>';
                        } else if($row['active'] == 1){
                            $active = '<a href="?active=fj&uid='.$row['uid'].'" class="label label-success">封禁站点</a>';
                        }
                        ?>
                        <tr>
                            <td><?=$row['uid']?></td>
                            <td><?=$row['user']?></td>
                            <td><?=$row['pwd']?></td>
                            <td><?=$qx?></td>
                            <td><?=$type?></td>
                            <td><?=$active?> / <a href="?step=update&uid=<?=$row['uid']?>" class="label label-info">编辑</a> / <a href="?step=delete&uid=<?=$row['uid']?>" class="label label-danger">删除Ta</a></td>
                        </tr>
                        <?php
                    }
                    if($_GET['active'] == "jj"){
                        $uid = $_GET['uid'];
                        $SQL = Query("update mall_users set `active` = 1 where uid = '{$uid}'");
                        Alert('解禁分站成功','./userlist.php');
                    } else if($_GET['active'] == "fj"){
                        $uid = $_GET['uid'];
                        $SQL = Query("update mall_users set `active` = 0 where uid = '{$uid}'");
                        Alert('封禁分站成功','./userlist.php');
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <?php
            $Page = new Page($users,10);
            echo "<center>".$Page->showPage()."</center>";
            ?>
        </div>
    </div>


    <?php
} else if($step == "add"){

    if(!empty($_POST['qz']) && !empty($_POST['name']) && !empty($_POST['user']) && !empty($_POST['pwd']) && !empty($_POST['type'])){
        if($_POST){
            $qz = Safe($_POST['qz']);
            $name = Safe($_POST['name']);
            $user = Safe($_POST['user']);
            $pwd = Safe($_POST['pwd']);
            $qq = Safe($_POST['qq']);
            $type = Safe($_POST['type']);
            $money = Safe($_POST['money']);
            $urls = $qz.".".$_SERVER['HTTP_HOST'];

            $SQL = Query("select * from `mall_users` where user = '{$user}'");
            $res = Fetch($SQL);
            $urled = explode(".".$_SERVER['HTTP_HOST'], $res['url']);
            if($res['user'] === $user or $urls === $urled[0]){
                alert('已有此前缀或账号','userlist.php?step=add','error');
            }else{

                $SQL = Query("INSERT INTO `mall_users` (`user`,`pwd`,`qq`,`name`,`url`,`type`,`money`) values ('".$user."','".$pwd."','".$qq."','".$name."','".$urls."','".$type."','".$money."')");

                if($SQL){
                    Alert('添加分站成功','./userlist.php');
                }else{
                    Alert('添加失败','./userlist.php?step=add','error');
                }
            }
        }
    }

    ?>


    <div class="col-lg-12">
        <div class="card border">
            <div class="card-header">
                <h4>添加分站</h4>
            </div>
            <div class="card-body">

                <form action="" method="post" class="edit-form">

                    <div class="form-group">
                        <label for="config_group">分站前缀域名</label>
                        <input class="form-control" name="qz">
                    </div>

                    <div class="form-group">
                        <label for="config_group">站点名称</label>
                        <input class="form-control" name="name">
                    </div>

                    <div class="form-group">
                        <label for="config_group">用户余额</label>
                        <input class="form-control" name="money">
                    </div>

                    <div class="form-group">
                        <label for="config_group">分站账号</label>
                        <input class="form-control" name="user">
                    </div>

                    <div class="form-group">
                        <label for="config_group">分站密码</label>
                        <input class="form-control" name="pwd">
                    </div>

                    <div class="form-group">
                        <label for="config_group">分站长QQ</label>
                        <input class="form-control" name="qq">
                    </div>

                    <div class="form-group">
                        <label for="type">分站类型</label>
                        <select name="type" class="form-control">
                            <option value="0">请选择分站类型</option>
                            <option value="common">普通版</option>
                            <option value="major">专业版</option>
                        </select></div><br>

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
    $uid = $_GET['uid'];
    $query = Query("select * from `mall_users` where uid='{$uid}'");
    $row = Fetch($query);
    $urls = explode(".".$_SERVER['HTTP_HOST'], $row['url']);
    ?>


    <div class="col-lg-12">
        <div class="card border">
            <div class="card-header">
                <h4>编辑分站</h4>
            </div>
            <div class="card-body">

                <form action="?step=submit_update&uid=<?=$uid?>" method="post" class="edit-form">

                    <div class="form-group">
                        <label for="config_group">分站前缀域名</label>
                        <input class="form-control" name="qz" value="<?=$urls[0]?>">
                    </div>

                    <div class="form-group">
                        <label for="config_group">站点名称</label>
                        <input class="form-control" name="name" value="<?=$row['name']?>">
                    </div>

                    <div class="form-group">
                        <label for="config_group">用户余额</label>
                        <input class="form-control" name="money" value="<?=$row['money']?>">
                    </div>

                    <div class="form-group">
                        <label for="config_group">分站账号</label>
                        <input class="form-control" name="user" value="<?=$row['user']?>">
                    </div>

                    <div class="form-group">
                        <label for="config_group">分站密码</label>
                        <input class="form-control" name="pwd" value="<?=$row['pwd']?>">
                    </div>

                    <div class="form-group">
                        <label for="config_group">分站长QQ</label>
                        <input class="form-control" name="qq" value="<?=$row['qq']?>">
                    </div>

                    <div class="form-group">
                        <label for="type">分站类型</label>
                        <select name="type" class="form-control">
                            <option value="0">请选择分站类型</option>
                            <option value="common">普通版</option>
                            <option value="major">专业版</option>
                        </select></div><br>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary m-r-5">修改Ta</button>
                        <button type="button" class="btn btn-default" onclick="javascript:history.back(-1);return false;">返 回</button>
                    </div>
                </form>

            </div>
        </div>

    </div>


    <?php
}else if($step == "submit_update"){
    $uid = $_GET['uid'];
    if(!empty($_POST['qz']) && !empty($_POST['name']) && !empty($_POST['user']) && !empty($_POST['pwd']) && !empty($_POST['qq']) && !empty($_POST['type'])){
        $qz = Safe($_POST['qz']);
        $name = Safe($_POST['name']);
        $user = Safe($_POST['user']);
        $pwd = Safe($_POST['pwd']);
        $qq = Safe($_POST['qq']);
        $money = Safe($_POST['money']);
        $type = Safe($_POST['type']);
        $urls = $qz.".".$_SERVER['HTTP_HOST'];

        $SQL = Query("UPDATE `mall_users` set `user`='{$user}', `pwd`='{$pwd}', `qq`='{$qq}', `name`='{$name}', `url`='{$urls}', `type`='{$type}',`money`='{$money}' where uid = '{$uid}'");

        if($SQL){
            Alert('编辑分站成功','./userlist.php');
        }else{
            Alert("编辑分站失败","./userlist.php?step=update&uid={$uid}","error");
        }
    }
}else if($step == "delete"){
    $uid = $_GET['uid'];
    $Query = Query("delete from mall_users where uid='{$uid}'");
    if($Query){
        Alert('删除分站成功','./userlist.php');
    }else{
        Alert("删除分站失败","./userlist.php","error");
    }
}
?>
    </div>
<?php
include "foot.php";
?>