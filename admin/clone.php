<?php
$title = '同系统克隆';
include('./head.php');
if ($_POST) {
    $url = $_POST['url'];
    $key = $_POST['key'];
    $url_arr = parse_url($url);
    if ($url_arr['host']==$_SERVER['HTTP_HOST']) {
        Alert('无法自己克隆自己', './clone.php', 'info');
    }
    $data = file_get_contents('http://'.$url.'/ajax.php?act=clone&key='.$key);
    $arr = json_decode($data, true);
    if ((array_key_exists('code', $arr) && $arr['code']==1)) {
        $success = count($arr['mall_shop']);
        if ((count($arr['mall_shop']) < 5)) {
            Alert('对方网站数据量过少。', 'clone.php', 'info');
        }
        
        Query('TRUNCATE TABLE `mall_shop`');
        foreach ($arr['mall_shop'] as $row) {
            Query("INSERT INTO `mall_shop` (`id`,`name`,`money`,`msg`,`active`) VALUES ('".$row['id']."', '".$row['name']."', '".$row['money']."', '".$row['msg']."', '".$row['active']."')");
        }

     Alert('克隆完成，SQL成功执行' . $success . '句。', 'clone.php');
    } elseif (array_key_exists('code', $arr)) {
        Alert('克隆失败，原因：' . $arr['msg'], 'clone.php', 'error');
    } else {
        Alert('克隆失败，返回数据解析错误。', 'clone.php', 'error');
    }
}
echo '
	  <div class="col-lg-12">
            <div class="card border">
              <div class="card-body clearfix">
		<div class="alert alert-info">
            使用此功能可一键克隆目标站点的商品，方便站长快速丰富网站内容。
        </div>
		<div class="alert alert-danger">
            克隆后将会清空本站所有商品数据，请谨慎操作！
        </div>
          <form action="?" method="POST" role="form">
		    <div class="form-group">
				<div class="input-group"><div class="input-group-addon">站点URL</div>
				<input type="text" name="url" value="" class="form-control" placeholder="www.qq.com" required/>
			</div></div>
			<div class="form-group">
				<div class="input-group"><div class="input-group-addon">克隆密钥</div>
				<input type="text" name="key" value="" class="form-control" placeholder="联系目标站点取得" required/>
			</div></div>
            <p><input type="submit" name="submit" value="确定克隆" class="btn btn-primary form-control"/></p>
          </form>
        </div>
		<div class="panel-footer">
          <span class="mdi mdi-alert-circle"></span>本站克隆密钥<a href="./set.php?step=clone">点此获取</a>
        </div>
      </div>
    </div>
  </div></div>
';
include "foot.php";