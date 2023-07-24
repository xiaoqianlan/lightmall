<?php
include "Inc/core.php";
$URL = $_SERVER['HTTP_HOST'];
$SQL = Query("SELECT * FROM mall_users WHERE `url` = '{$URL}' limit 1");
$row = Fetch($SQL);
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title><?php echo $row['name'] ? $row['name'] : $conf['title']; ?> - <?=$conf['title_next']?></title>
  <meta name="keywords" content="<?php echo $conf['keywords']?>">
  <meta name="description" content="<?php echo $conf['description']?>">
  <link href="https://lib.baomitu.com/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://lib.baomitu.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
  <link rel="icon" href="favicon.ico">
  <link rel="stylesheet" href="Assets/simple/css/plugins.css">
  <link rel="stylesheet" href="Assets/simple/css/main.css">
  <link rel="stylesheet" href="Assets/css/common.css">
  <script src="https://lib.baomitu.com/modernizr/2.8.3/modernizr.min.js"></script>
  <!--[if lt IE 9]>
    <script src="//lib.baomitu.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="//lib.baomitu.com/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
  div{filter:alpha(Opacity=98);-moz-opacity:0.98;opacity: 0.98;}
  </style>
</head>
<body>
<!-- 模态框（Modal） -->
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
<!-- /.modal -->

<img src="<?php echo $conf['bg_url']?>" alt="Full Background" class="full-bg full-bg-bottom animation-pulseSlow" ondragstart="return false;" oncontextmenu="return false;">
<div class="col-xs-12 col-sm-10 col-md-8 col-lg-4 center-block " style="float: none;">
  <br /><br /><br />
  
    <div class="widget">

    <div class="block">
    
        <div class="block-title">
            <h2 id="title"><i class="fa fa-linux"></i>&nbsp;&nbsp;<b><?php echo $row['name'] ? $row['name'] : "在线购物"; ?></b></h2>
        </div>
        	
        <!-- 前台公告 -->
        <?=$conf['notice']?>
            
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
              </select></div><br></div>
              
            <div class="form-group">
              <input type="button" onclick="submit()" value="确定下单" class="btn btn-primary btn-block"/>
            </div>


            </div>
  
  
			<hr>
			<div class="form-group">
			<button data-toggle="modal" data-target="#myModal" class="btn btn-info btn-rounded"><i class="fa fa-search"></i>&nbsp;在线查单</button>
			<a href="./user/" class="btn btn-danger btn-rounded" style="float:right;"><i class="fa fa-user"></i>&nbsp;用户中心</a>
		</div>
    </div>
  </div>
</div>
            <div style="text-align:center">
            Copyright &copy <a href="#" target="_blank"><?=$conf['title']?></a>
            </div>

<script src="https://lib.baomitu.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://lib.baomitu.com/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//cdn.bootcss.com/layer/3.0.3/layer.min.js"></script>
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
			url : "ajax.php?act=get_shop&id="+shop,
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
    } else {
    <?php
    if($conf['yzf_api'] != null){
   ?>    
	window.location.href="Pay/pay.php?user="+user+"&ddh="+ddh+"&name="+name+"&money="+money+"&type="+type;
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
			url : "ajax.php?act=get_order&user="+usered,
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
</body>
</html>