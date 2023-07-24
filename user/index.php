<?php
$title='分站中心';
include './head.php';
if($usered['type'] == "common"){
$type = "普通分站";
}else{
$type = "专业分站";
}
?>
 <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
    <div class="panel panel-primary" id="recharge">
   <div class="panel-heading" style="background: linear-gradient(to right,#87CEEB,#FF83FA);padding: 15px;">
     <div class="widget-content text-right clearfix">
    <img src="//q4.qlogo.cn/headimg_dl?dst_uin=<?=$usered['qq']?>&spec=100" alt="Avatar" width="66" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar pull-left">

    <span class="text-muted"> <br>
            <span class="btn btn-xs btn-success">站点等级：<?=$type?></span>
</span>
     </div>
   </div>   
<table class="table table-bordered">
<tbody>

<tr height="25">
<td align="center"><font color="#808080"><b><span class="glyphicon"></span>用户账号：</font><?=$usered['user']?></td>
<td align="center"><font color="#808080"><b><i class="glyphicon"></i>账户金额：<?=$usered['money']?>元</font></a></td>
</tr>

<tr height="25">
<td align="center" colspan="3">
<a href="tixian.php" class="btn btn-xs btn-success">提现金额</a></span>
&nbsp;<a href="pwd.php" class="btn btn-xs btn-info"> 修改密码</a>
<?php
if($usered['type'] == "common"){}else{
echo "&nbsp;<a href=\"userlist.php?step=add\" class=\"btn btn-xs btn-danger\"> 添加分站</a>";
}
?>
</td>
</tr>

</tbody>

</table>
                </div>
      </div>

<div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
      <div class="panel panel-primary">
   <div class="panel-heading" style="background: linear-gradient(to right,#87CEEB,#FF83FA);"><h3 class="panel-title">分站须知</h3></div>
          <li class="list-group-item">
   <b><font color="green">提现说明：</font>
 <b><font color="red">每次提现最低<?=$conf['tixian_money']?>元起</font></b>

  </li> 
              <li class="list-group-item">
 <b><font color="green">提成说明：</font></b>
 <b><font color="red">普通分站每一单提成<?=$conf['fenzhan_common_fl']?>元，专业分站每一单提成<?=$conf['fenzhan_major_fl']?>元</font></b>

  </li>  
  </center>
      </div>
</div>

</div>

