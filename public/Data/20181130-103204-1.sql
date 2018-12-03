
-- -----------------------------
-- Table structure for `qy_articles`
-- -----------------------------
DROP TABLE IF EXISTS `qy_articles`;
CREATE TABLE `qy_articles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `keywords` text,
  `descr` text NOT NULL,
  `pic` varchar(255) NOT NULL,
  `opic` varchar(255) NOT NULL DEFAULT '0',
  `addtime` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Records of `qy_articles`
-- -----------------------------
INSERT INTO `qy_articles` VALUES ('14', 'a\'sas奥术大师', '阿斯达大啊', '大蛇傻叉', '<p>阿达查出</p>', '/uploads/publicimg/1543475936.jpg', './uploads/20181129\\b624d95a6868dc50a18e7e829209917e.jpg', '1543469545');

-- -----------------------------
-- Table structure for `qy_column`
-- -----------------------------
DROP TABLE IF EXISTS `qy_column`;
CREATE TABLE `qy_column` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `column` varchar(255) DEFAULT NULL,
  `ctitle` varchar(30) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Records of `qy_column`
-- -----------------------------
INSERT INTO `qy_column` VALUES ('1', '首页', '疾风科技', '疾风科技,让网页更值观。', '本公司制作各种风格不同的海报写真_名片制作_名片印刷_纸袋礼盒_画册样本_联单信封.定制属于您自己的名片,提供公司名片,公司名片图片,公司名片欧卡快印名片有限公司欢迎各大大小公司合作,联系电话:400-0888-998');
INSERT INTO `qy_column` VALUES ('2', '产品', '疾风科技', '阿萨', '安达市');
INSERT INTO `qy_column` VALUES ('3', '动态', '疾风科技', '', '');
INSERT INTO `qy_column` VALUES ('4', '案例', '疾风科技', '', '');
INSERT INTO `qy_column` VALUES ('5', '关于', '疾风科技', '', '');

-- -----------------------------
-- Table structure for `qy_goods`
-- -----------------------------
DROP TABLE IF EXISTS `qy_goods`;
CREATE TABLE `qy_goods` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `keywords` text,
  `descr` text NOT NULL,
  `pic` varchar(255) NOT NULL,
  `opic` varchar(255) NOT NULL DEFAULT '0',
  `addtime` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Records of `qy_goods`
-- -----------------------------
INSERT INTO `qy_goods` VALUES ('13', ' JS基础库', 'sfdsdfsf', 'asdsfdsf', '<p>sfddsfgdgfdvdfvdfvfdvdf</p><p style=\"text-align: center;\"><img src=\"/bbs/upload/image/20181129/1543467149841552.jpg\" title=\"1543467149841552.jpg\" alt=\"Product_img2.jpg\"/></p>', '/uploads/publicimg/1543473791.jpg', './uploads/20181129\\70db25fa3121e5619a0a0eb5a96155c1.jpg', '1543467156');

-- -----------------------------
-- Table structure for `qy_login_log`
-- -----------------------------
DROP TABLE IF EXISTS `qy_login_log`;
CREATE TABLE `qy_login_log` (
  `login_log` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '操作记录主键',
  `login_uid` mediumint(4) NOT NULL DEFAULT '0' COMMENT '操作人/如果是接口返回-1暂不记录接口请求人',
  `login_node` char(50) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '操作节点',
  `login_ip` mediumtext COLLATE utf8_bin NOT NULL COMMENT '记录操作IP,省市,等信息',
  `login_time` int(10) NOT NULL DEFAULT '0' COMMENT '操作时间',
  PRIMARY KEY (`login_log`),
  KEY `index_uid_node` (`login_uid`,`login_node`,`login_log`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='@author PHP@妖孽\r\n@since 2014-5-4';

-- -----------------------------
-- Records of `qy_login_log`
-- -----------------------------
INSERT INTO `qy_login_log` VALUES ('2', '1', '登录成功', '127.0.0.1', '1543480175');
INSERT INTO `qy_login_log` VALUES ('3', '1', '退出成功', '127.0.0.1', '1543482541');
INSERT INTO `qy_login_log` VALUES ('4', '1', '登录成功', '127.0.0.1', '1543482556');
INSERT INTO `qy_login_log` VALUES ('5', '1', '退出成功', '127.0.0.1', '1543486405');
INSERT INTO `qy_login_log` VALUES ('6', '1', '登录成功', '127.0.0.1', '1543486412');
INSERT INTO `qy_login_log` VALUES ('7', '1', '登录成功', '127.0.0.1', '1543500138');
INSERT INTO `qy_login_log` VALUES ('8', '1', '退出成功', '127.0.0.1', '1543500795');
INSERT INTO `qy_login_log` VALUES ('9', '1', '登录成功', '127.0.0.1', '1543500815');
INSERT INTO `qy_login_log` VALUES ('10', '1', '退出成功', '127.0.0.1', '1543506801');
INSERT INTO `qy_login_log` VALUES ('11', '1', '登录成功', '127.0.0.1', '1543506807');
INSERT INTO `qy_login_log` VALUES ('12', '1', '退出成功', '127.0.0.1', '1543507252');
INSERT INTO `qy_login_log` VALUES ('13', '1', '登录成功', '127.0.0.1', '1543507258');
INSERT INTO `qy_login_log` VALUES ('14', '1', '退出成功', '127.0.0.1', '1543544970');
INSERT INTO `qy_login_log` VALUES ('15', '1', '登录成功', '127.0.0.1', '1543544996');
INSERT INTO `qy_login_log` VALUES ('16', '1', '退出成功', '127.0.0.1', '1543545073');
INSERT INTO `qy_login_log` VALUES ('17', '1', '登录成功', '127.0.0.1', '1543545093');

-- -----------------------------
-- Table structure for `qy_mycase`
-- -----------------------------
DROP TABLE IF EXISTS `qy_mycase`;
CREATE TABLE `qy_mycase` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `descr` text NOT NULL,
  `pic` varchar(255) NOT NULL,
  `opic` varchar(255) NOT NULL DEFAULT '0',
  `addtime` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Records of `qy_mycase`
-- -----------------------------
INSERT INTO `qy_mycase` VALUES ('15', '名牌工厂店', '一家工厂企业的商品展示网站，主要以卖高端服饰为主。主要以卖高端服饰为主。主要以卖高端服饰为主。', '/uploads/publicimg/1543470874.jpg', './uploads/20181129\\3483a3eeea09210edc63b7e039ee1449.jpg', '1543469091');

-- -----------------------------
-- Table structure for `qy_node`
-- -----------------------------
DROP TABLE IF EXISTS `qy_node`;
CREATE TABLE `qy_node` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '节点名称',
  `mname` varchar(50) NOT NULL COMMENT '控制器',
  `aname` varchar(50) NOT NULL COMMENT '方法',
  `status` tinyint(1) NOT NULL COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Records of `qy_node`
-- -----------------------------
INSERT INTO `qy_node` VALUES ('2', '角色浏览', 'Roles', 'getindex', '0');
INSERT INTO `qy_node` VALUES ('3', '角色添加', 'Roles', 'getadd', '0');
INSERT INTO `qy_node` VALUES ('4', '角色修改', 'Roles', 'getedit', '0');
INSERT INTO `qy_node` VALUES ('5', '角色删除', 'Roles', 'postdelete', '0');
INSERT INTO `qy_node` VALUES ('6', '权限添加', 'Rbac', 'getadd', '0');
INSERT INTO `qy_node` VALUES ('7', '权限修改', 'Rbac', 'getedit', '0');
INSERT INTO `qy_node` VALUES ('8', '权限删除', 'Rbac', 'postdelete', '0');
INSERT INTO `qy_node` VALUES ('9', '权限浏览', 'Rbac', 'getindex', '0');
INSERT INTO `qy_node` VALUES ('10', '角色权限分配', 'Rbac', 'getrbacadd', '0');
INSERT INTO `qy_node` VALUES ('11', '角色权限分配处理', 'Rbac', 'postrbacinsert', '0');
INSERT INTO `qy_node` VALUES ('12', '角色分配', 'User', 'geturadd', '0');
INSERT INTO `qy_node` VALUES ('13', '角色分配处理', 'User', 'postrbacinsert', '0');
INSERT INTO `qy_node` VALUES ('14', '管理员浏览', 'User', 'getindex', '0');
INSERT INTO `qy_node` VALUES ('15', '管理员添加', 'User', 'getadd', '0');
INSERT INTO `qy_node` VALUES ('16', '管理员修改', 'User', 'getedit', '0');
INSERT INTO `qy_node` VALUES ('17', '管理员删除', 'User', 'postdelete', '0');
INSERT INTO `qy_node` VALUES ('18', '产品列表浏览', 'Goods', 'getindex', '0');
INSERT INTO `qy_node` VALUES ('19', '产品添加', 'Goods', 'getadd', '0');
INSERT INTO `qy_node` VALUES ('20', '产品修改', 'Goods', 'getedit', '0');
INSERT INTO `qy_node` VALUES ('21', '产品删除', 'Goods', 'postdelete', '0');
INSERT INTO `qy_node` VALUES ('22', '文章列表浏览', 'Article', 'getindex', '0');
INSERT INTO `qy_node` VALUES ('23', '文章添加', 'Article', 'getadd', '0');
INSERT INTO `qy_node` VALUES ('24', '文章修改', 'Article', 'getedit', '0');
INSERT INTO `qy_node` VALUES ('25', '文章删除', 'Article', 'postdelete', '0');
INSERT INTO `qy_node` VALUES ('26', '案例列表浏览', 'MyCase', 'getindex', '0');
INSERT INTO `qy_node` VALUES ('27', '案例添加', 'MyCase', 'getadd', '0');
INSERT INTO `qy_node` VALUES ('28', '案例修改', 'MyCase', 'getedit', '0');
INSERT INTO `qy_node` VALUES ('29', '案例删除', 'MyCase', 'postdelete', '0');
INSERT INTO `qy_node` VALUES ('30', '栏目列表浏览', 'Column', 'getindex', '0');
INSERT INTO `qy_node` VALUES ('31', '栏目修改', 'Column', 'getedit', '0');
INSERT INTO `qy_node` VALUES ('32', '登录日志浏览', 'SystemLog', 'getindex', '0');
INSERT INTO `qy_node` VALUES ('33', '操作日志浏览', 'SystemLog', 'getindexs', '0');
INSERT INTO `qy_node` VALUES ('34', '数据备份列表浏览', 'Backups', 'getindex', '0');
INSERT INTO `qy_node` VALUES ('35', '数据备份', 'Backups', 'getadd', '0');
INSERT INTO `qy_node` VALUES ('36', '数据还原', 'Backups', 'getedit', '0');
INSERT INTO `qy_node` VALUES ('37', '备份删除', 'Backups', 'postdelete', '0');

-- -----------------------------
-- Table structure for `qy_operation_log`
-- -----------------------------
DROP TABLE IF EXISTS `qy_operation_log`;
CREATE TABLE `qy_operation_log` (
  `operation_log` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '操作记录主键',
  `operation_uid` mediumint(4) NOT NULL DEFAULT '0' COMMENT '操作人/如果是接口返回-1暂不记录接口请求人',
  `operation_node` char(50) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '操作节点',
  `operation_ip` mediumtext COLLATE utf8_bin NOT NULL COMMENT '记录操作IP,省市,等信息',
  `operation_time` int(10) NOT NULL DEFAULT '0' COMMENT '操作时间',
  PRIMARY KEY (`operation_log`),
  KEY `index_uid_node` (`operation_uid`,`operation_node`,`operation_log`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='@author PHP@妖孽\r\n@since 2014-5-4';

-- -----------------------------
-- Records of `qy_operation_log`
-- -----------------------------
INSERT INTO `qy_operation_log` VALUES ('6', '1', '管理员修改', '127.0.0.1', '1543486568');
INSERT INTO `qy_operation_log` VALUES ('7', '1', '管理员修改', '127.0.0.1', '1543487159');
INSERT INTO `qy_operation_log` VALUES ('8', '1', '权限添加', '127.0.0.1', '1543487246');
INSERT INTO `qy_operation_log` VALUES ('9', '1', '文章修改', '127.0.0.1', '1543489733');
INSERT INTO `qy_operation_log` VALUES ('10', '1', '文章修改', '127.0.0.1', '1543489743');
INSERT INTO `qy_operation_log` VALUES ('11', '1', '文章修改', '127.0.0.1', '1543489772');
INSERT INTO `qy_operation_log` VALUES ('12', '1', '文章修改', '127.0.0.1', '1543489837');
INSERT INTO `qy_operation_log` VALUES ('13', '1', '栏目修改', '127.0.0.1', '1543489845');
INSERT INTO `qy_operation_log` VALUES ('14', '1', '栏目修改', '127.0.0.1', '1543489848');
INSERT INTO `qy_operation_log` VALUES ('15', '1', '栏目修改', '127.0.0.1', '1543489871');
INSERT INTO `qy_operation_log` VALUES ('16', '1', '管理员修改', '127.0.0.1', '1543503063');
INSERT INTO `qy_operation_log` VALUES ('17', '1', '文章修改', '127.0.0.1', '1543506532');
INSERT INTO `qy_operation_log` VALUES ('18', '1', '权限添加', '127.0.0.1', '1543506692');
INSERT INTO `qy_operation_log` VALUES ('19', '1', '权限添加', '127.0.0.1', '1543506725');
INSERT INTO `qy_operation_log` VALUES ('20', '1', '权限添加', '127.0.0.1', '1543506754');
INSERT INTO `qy_operation_log` VALUES ('21', '1', '权限添加', '127.0.0.1', '1543506786');
INSERT INTO `qy_operation_log` VALUES ('22', '1', '权限修改', '127.0.0.1', '1543506889');
INSERT INTO `qy_operation_log` VALUES ('23', '1', '备份还原', '127.0.0.1', '1543507267');
INSERT INTO `qy_operation_log` VALUES ('24', '1', '备份还原', '127.0.0.1', '1543507758');
INSERT INTO `qy_operation_log` VALUES ('25', '1', '备份还原', '127.0.0.1', '1543508056');
INSERT INTO `qy_operation_log` VALUES ('26', '1', '备份还原', '127.0.0.1', '1543508078');
INSERT INTO `qy_operation_log` VALUES ('27', '1', '权限修改', '127.0.0.1', '1543544802');
INSERT INTO `qy_operation_log` VALUES ('28', '1', '权限修改', '127.0.0.1', '1543544814');
INSERT INTO `qy_operation_log` VALUES ('29', '1', '权限修改', '127.0.0.1', '1543544827');
INSERT INTO `qy_operation_log` VALUES ('30', '1', '权限修改', '127.0.0.1', '1543544836');
INSERT INTO `qy_operation_log` VALUES ('31', '1', '角色权限分配', '127.0.0.1', '1543545063');

-- -----------------------------
-- Table structure for `qy_role`
-- -----------------------------
DROP TABLE IF EXISTS `qy_role`;
CREATE TABLE `qy_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rname` varchar(30) NOT NULL COMMENT '角色名字',
  `remark` varchar(255) NOT NULL COMMENT '负责模块',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Records of `qy_role`
-- -----------------------------
INSERT INTO `qy_role` VALUES ('1', '超级管理员', '所有权限', '0');
INSERT INTO `qy_role` VALUES ('3', '权限管理', '权限浏览，权限添加，权限修改，权限删除', '0');
INSERT INTO `qy_role` VALUES ('4', '管理员管理', '管理员浏览，管理员修改，管理员删除，管理员添加', '0');
INSERT INTO `qy_role` VALUES ('5', '角色管理', '角色浏览，角色添加，角色修改，角色删除.', '0');

-- -----------------------------
-- Table structure for `qy_role_node`
-- -----------------------------
DROP TABLE IF EXISTS `qy_role_node`;
CREATE TABLE `qy_role_node` (
  `rid` int(10) NOT NULL COMMENT '角色id',
  `nid` varchar(255) NOT NULL COMMENT '节点id',
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -----------------------------
-- Records of `qy_role_node`
-- -----------------------------
INSERT INTO `qy_role_node` VALUES ('1', '2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37');
INSERT INTO `qy_role_node` VALUES ('3', '6,7,8,9,10,11');
INSERT INTO `qy_role_node` VALUES ('4', '14,15,16,17');
INSERT INTO `qy_role_node` VALUES ('5', '2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33');
INSERT INTO `qy_role_node` VALUES ('6', '12,13');

-- -----------------------------
-- Table structure for `qy_user`
-- -----------------------------
DROP TABLE IF EXISTS `qy_user`;
CREATE TABLE `qy_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` char(32) NOT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Records of `qy_user`
-- -----------------------------
INSERT INTO `qy_user` VALUES ('1', 'admin', 'admin112s@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '1543294783', '0');

-- -----------------------------
-- Table structure for `qy_user_role`
-- -----------------------------
DROP TABLE IF EXISTS `qy_user_role`;
CREATE TABLE `qy_user_role` (
  `uid` int(10) NOT NULL COMMENT '用户id',
  `rid` varchar(10) NOT NULL COMMENT '角色id',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -----------------------------
-- Records of `qy_user_role`
-- -----------------------------
INSERT INTO `qy_user_role` VALUES ('1', '1');
