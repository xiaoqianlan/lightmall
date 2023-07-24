<?php
$title = "低价下单";
include "head.php";
$URL = $_SERVER['HTTP_HOST'];
$SQL = Query("SELECT * FROM mall_users WHERE `url` = '{$URL}' limit 1");
$row = Fetch($SQL);

if($_GET['act']=='submit'){
    $name = $_GET['name'];//商品名称
    $ddh = $_GET['ddh'];//商品订单号
    $user = $_GET['user'];//下单账号
    $money = $_GET['money'];//支付金额
    $date = date('Y-m-d'); //下单日期
   
   if($money>$usered['money']){ Alert('你的余额不足 ！', './buy.php','error');} else {
       $SQL = Query("INSERT INTO `mall_order` (`user`,`name`,`ddh`,`date`,`money`) values ('".$user."','".$name."','".$ddh."','".$date."','".$money."')");
      $SQL = Query("update `mall_users` set money=money-'{$money}' where user = '{$usered['user']}'");
      if($SQL){
      Alert('您所购买的商品已付款成功，感谢购买！','./buy.php');
     } 
  }
}
?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">在线查单</h4>
            </div>
            <div class="modal-body">
            
            <div class="input-group">
             <div class="input-group-addon">下单账号</div>
                <input type="text" id="usered" value="" placeholder="下单时的账号" class="form-control" required="required"/>
            </div><br/>
            
            <div class="form-group">
              <input type="button" id="query" value="查单" class="btn btn-primary btn-block"/>
            </div>
            
            <hr>
            <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>下单账号</th>
                        <th>商品名称</th>
                        <th>订单号</th>
                        <th>下单日期</th>
                        <th>订单状态</th>
                      </tr>
                    </thead>
                    <tbody id="search">

                   
                    </tbody>
                  </table>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">关闭页面</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


   <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
      <div class="panel panel-primary">
			<div class="panel-heading" style="background: linear-gradient(to right,#87CEEB,#FF83FA);"><h3 class="panel-title"><b><?php echo $row['name'] ? $row['name'] : "在线购物"; ?></b></h3></div>
        <div class="panel-body">
             	
						<p>
<li class="list-group-item"><span class="btn btn-danger btn-xs">1</span> 订单问题可直接联系平台在线QQ客服</li>
<li class="list-group-item"><span class="btn btn-success btn-xs">2</span> 温馨提示: 下单前请认真查看商品介绍后再进行下单，避免出错，有问题及时与客服沟通！</li>
<li class="list-group-item"><span class="btn btn-warning btn-xs">3</span> 站点公告：本站所有业务均为平台自营，可给您提供最优质服务及价格，有问题可以联系客服咨询！</li>
<div class="btn-group btn-group-justified">
<a target="_blank" class="btn btn-info" href="http://wpa.qq.com/msgrd?v=3&uin=<?=$conf['qq']?>&site=qq&menu=yes"><i class="fa fa-qq"></i> 联系客服</a>
<a target="_blank" class="btn btn-warning" href="<?=$conf['qqq']?>"><i class="fa fa-users"></i> 官方Q群</a>
</div></p>
            
        <!-- 第一面板 -->
        <div id="main">
        
              <div class="input-group">
              <div class="input-group-addon">选择商品</div>  
              <select id="shop" class="form-control">
               <option value="0">选择商品</option>
                 <?php
                 $SQL = mysqli_query($DB,"select * from mall_shop where active = 1");
                 while($row = mysqli_fetch_assoc($SQL)){
                 ?>
                 <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php
                }
                ?>
              </select></div><br>
              <input type="hidden" id="ddh" value="<?php echo date('YmdHis').rand(123,999); ?>" />
            <div id="input">
            </div>
            <div id="inputs">
            </div>
            <div id="msg">
            </div>
            
            <div  id="types">
            <div class="input-group">
              <div class="input-group-addon">支付方式</div>  
              <select id="type" class="form-control">
               <option value="alipay">支付宝</option>
               <option value="wxpay">微信支付</option>
               <option value="qqpay">QQ支付</option>
               <option value="money">余额支付</option>
              </select></div><br></div>
              
            <div class="form-group">
              <input type="button" onclick="submit()" value="确定下单" class="btn btn-primary btn-block"/>
            </div>


            </div>
  
  
			<hr>
			<div class="form-group">
			<button data-toggle="modal" data-target="#myModal" class="btn btn-info btn-rounded"><i class="fa fa-search"></i>&nbsp;在线查单</button>
		</div>
    </div>
  </div>


<script>
$("#input").css("display","none");
$("#inputs").css("display","none");
$("#msg").css("display","none");
$("#types").css("display","none");

$('#shop').change(function () {
        var ii = layer.msg('正在获取商品请稍候...', {icon: 16,shade: 0.5,time: 30000});
        var shop=$("#shop").val();
		$.ajax({
			type : "GET",
			url : "../ajax.php?act=get_user_shop&id="+shop+"&user_type=<?=$usered['type']?>",
			dataType : 'json',
			success:function(data){
			layer.close(ii);
				if(data.code == 1)
				{
				    $("#input").css("display","inherit");
				    $("#inputs").css("display","inherit");
				    $("#types").css("display","inherit");
					$("#input").html('<div class="input-group"><div class="input-group-addon">商品价格</div><input type="text" id="money" disabled value="'+data.money+'" class="form-control" required="required"/><input type="hidden" id="name" value="'+data.name+'" /></div><br/>');
					$("#msg").html(layer.alert(data.msg));
					$("#inputs").html('<div class="input-group"><div class="input-group-addon">下单账号</div><input type="text" id="user" value="" class="form-control" required="required"/></div><br/>');
				}
			},
			error:function(data){
				layer.msg("服务器错误");
				return false;
			},
		});
});

function submit() {
    var user=$("#user").val();
    var ddh=$("#ddh").val();
    var name=$("#name").val();
    var money=$("#money").val();
    var type=$("#type").val();
    
    if (user.length < 5 || user.length > 10 || isNaN(user)) {
        layer.msg('请输入5~10位QQ账号');
        return false;
    } else if(type == "money") {
    
    window.location.href="buy.php?act=submit&user="+user+"&ddh="+ddh+"&name="+name+"&money="+money;
    
    } else {
    <?php
    if($conf['yzf_api'] != null){
   ?>    
	window.location.href="../Pay/pay.php?user="+user+"&ddh="+ddh+"&name="+name+"&money="+money+"&type="+type;
  <?php
		}else{
		?>
		layer.alert('站长还未配置支付接口,禁止下单');
		<?php
		}
		?>
	
  }
  
};

$('#query').click(function () {
        var ii = layer.msg('正在获取订单号请稍候...', {icon: 16,shade: 0.5,time: 30000});
        var usered=$("#usered").val();
        
        if (usered.length < 5 || usered.length > 10 || isNaN(usered)) {
        layer.msg('请输入下单账号');
        return false;
        }
        
		$.ajax({
			type : "GET",
			url : "../ajax.php?act=get_order&user="+usered,
			dataType : 'json',
			success:function(data){
			layer.close(ii);
				if(data.code == 1)
				{
					$("#search").html('<tr><td>'+data.user+'</td><td>'+data.name+'</td><td>'+data.ddh+'</td><td>'+data.date+'</td><td>'+data.active+'</td></tr>');
				} else{
				   layer.alert(data.msg);
				}
			},
			error:function(data){
				layer.msg("服务器错误");
				return false;
			},
		});
});
</script>