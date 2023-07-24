DROP TABLE IF EXISTS `mall_config`;
CREATE TABLE `mall_config` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `user` varchar(250) NOT NULL,
  `pwd` varchar(250) NOT NULL,
  `title` varchar(50) NOT NULL,
  `qq` varchar(32) NOT NULL,
  `title_next` text NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `notice` text NOT NULL,
  `yzf_api` text NOT NULL,
  `qqq` text NOT NULL,
  `host` text NOT NULL,
  `bg_url` text NOT NULL,
  `fenzhan_common` text NOT NULL,
  `fenzhan_qqqun` text NOT NULL,
  `fenzhan_major` text NOT NULL,
  `fenzhan_common_fl` text NOT NULL,
  `fenzhan_major_fl` text NOT NULL,
  `fenzhan_open` varchar(32) NOT NULL DEFAULT 'off',
  `tixian_money` varchar(15) NOT NULL DEFAULT '10',
  `apikey` text NOT NULL,
  `yzf_id` text NOT NULL,
  `yzf_key` text NOT NULL,
  `muban` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `mall_config`(`id`, `user`, `pwd`, `title`, `keywords`, `description`, `notice`, `qq`, `bg_url`, `title_next`, `apikey`, `fenzhan_common`, `fenzhan_major`, `fenzhan_common_fl`, `fenzhan_major_fl`, `muban`) VALUES ('1', 'admin', '123456','浅蓝云小店', '云小店,QQ云小店,虚拟商城,浅蓝云小店,浅蓝,自助下单,商城', '简约易懂', '<p>
<li class="list-group-item"><span class="btn btn-danger btn-xs">1</span> 订单问题可直接联系平台在线QQ客服</li>
<li class="list-group-item"><span class="btn btn-success btn-xs">2</span> 温馨提示: 下单前请认真查看商品介绍后再进行下单，避免出错，有问题及时与客服沟通！</li>
<li class="list-group-item"><span class="btn btn-warning btn-xs">3</span> 站点公告：本站所有业务均为平台自营，可给您提供最优质服务及价格，有问题可以联系客服咨询！</li>
<div class="btn-group btn-group-justified">
<a target="_blank" class="btn btn-info" href="http://wpa.qq.com/msgrd?v=3&uin=24091985&site=qq&menu=yes"><i class="fa fa-qq"></i> 联系客服</a>
<a target="_blank" class="btn btn-danger" href="./user"><i class="fa fa-paper-plane-o"></i> 低价下单</a>
<a target="_blank" class="btn btn-warning" href="#"><i class="fa fa-users"></i> 官方Q群</a>
</div></p>', '24091985','Assets/images/bg.jpg','基于PHP开发的轻量商城', '123456', 5,10,0.5,1,'default');

DROP TABLE IF EXISTS `mall_order`;
CREATE TABLE `mall_order` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `money` varchar(250) NOT NULL,
  `user` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `ddh` varchar(250) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `mall_shop`;
CREATE TABLE `mall_shop` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `money` varchar(15) NOT NULL,
  `msg` text NOT NULL,
  `fenzhan_common_money` text NOT NULL,
  `fenzhan_major_money` text NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `mall_users`;
CREATE TABLE `mall_users` (
  `uid` int(1) NOT NULL AUTO_INCREMENT,
  `user` varchar(250) NOT NULL,
  `url` varchar(32) NOT NULL,
  `name` varchar(250) NOT NULL,
  `qq` varchar(250) NOT NULL,
  `pwd` varchar(250) NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'common',
  `money` varchar(50) NOT NULL DEFAULT '0',
  `superior` int(255) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `mall_tixian`;
CREATE TABLE `mall_tixian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;