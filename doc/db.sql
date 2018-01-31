/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.26-MariaDB : Database - production_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`production_db` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `production_db`;

/*Table structure for table `auth_assignment` */

DROP TABLE IF EXISTS `auth_assignment`;

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `auth_assignment_user_id_idx` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_assignment` */

insert  into `auth_assignment`(`item_name`,`user_id`,`created_at`) values ('admin','1',1516773665),('author','41',1516773665);

/*Table structure for table `auth_item` */

DROP TABLE IF EXISTS `auth_item`;

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_item` */

insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('admin',1,NULL,NULL,NULL,1516773665,1516773665),('author',1,NULL,NULL,NULL,1516773665,1516773665),('createPost',2,'Create a post',NULL,NULL,1516773665,1516773665),('updatePost',2,'Update post',NULL,NULL,1516773665,1516773665);

/*Table structure for table `auth_item_child` */

DROP TABLE IF EXISTS `auth_item_child`;

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_item_child` */

insert  into `auth_item_child`(`parent`,`child`) values ('admin','author'),('admin','updatePost'),('author','createPost');

/*Table structure for table `auth_rule` */

DROP TABLE IF EXISTS `auth_rule`;

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_rule` */

/*Table structure for table `migration` */

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `migration` */

insert  into `migration`(`version`,`apply_time`) values ('m000000_000000_base',1514960736),('m140506_102106_rbac_init',1516773316),('m170907_052038_rbac_add_index_on_auth_assignment_user_id',1516773316),('m180103_062712_tn_user',1514960974),('m180124_055839_init_rbac',1516773665),('m180130_052158_update_user',1517290665);

/*Table structure for table `tn_user` */

DROP TABLE IF EXISTS `tn_user`;

CREATE TABLE `tn_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(64) NOT NULL,
  `auth_key` varchar(128) NOT NULL,
  `access_token` varchar(128) DEFAULT NULL,
  `password_reset_token` varchar(128) DEFAULT NULL,
  `role` tinyint(1) DEFAULT '0',
  `name` varchar(32) DEFAULT '--',
  `slug_name` varchar(155) DEFAULT NULL,
  `avatar` varchar(155) DEFAULT NULL,
  `avatar_url` varchar(255) DEFAULT NULL,
  `archive` tinyint(1) DEFAULT '0',
  `type` tinyint(1) DEFAULT '1',
  `lang` varchar(5) DEFAULT 'vi',
  `timezone` varchar(100) DEFAULT 'Asia/Bangkok',
  `attributes` text,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `access_token` (`access_token`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

/*Data for the table `tn_user` */

insert  into `tn_user`(`id`,`username`,`email`,`password`,`auth_key`,`access_token`,`password_reset_token`,`role`,`name`,`slug_name`,`avatar`,`avatar_url`,`archive`,`type`,`lang`,`timezone`,`attributes`,`status`) values (1,'admin',NULL,'$2y$13$HAh9iitRiwHuDnNUM8w/qubkrFmh1GLZ.EG/VwkTz3jSBSzg1nafC','!','admin','Jvm(',1,'Tona','','/web/uploads/images/users/11947627_1196879580337720_2083630260241166797_n.jpg',NULL,0,1,'vi','Asia/Bangkok',NULL,1),(41,'tonanguyen',NULL,'$2y$13$HAh9iitRiwHuDnNUM8w/qubkrFmh1GLZ.EG/VwkTz3jSBSzg1nafC','p','','',1,'Nguyen Tona','','',NULL,0,1,'vi','Asia/Bangkok',NULL,1),(55,'trangnguyen',NULL,'$2y$13$XgdSsGjA1jqk99QnQY1F9uMoAeQoRPmTPVeGj4j53RVfgEWdcaTye','','a','d',1,'Nguyễn Thu Trang','','',NULL,0,1,'vi','Asia/Bangkok',NULL,1),(63,'toannguyen-lockon','nvtoan@lockon-vn.com','$2y$13$OCtc0eLIyUhc9T8D23FY6egggHyXv/9GvpwKOAm3kTWJ0zV59ip.K','?#??`?g?(E`sp?΅???EB|???D@O?C',NULL,'l????\'??\'?`0?ӍS\0s#?1~\Z˩\nJߑ;?_1517375379',0,NULL,NULL,NULL,'https://avatars3.githubusercontent.com/u/32531859?v=4',0,4,'vi','Asia/Bangkok','{\"login\":\"toannguyen-lockon\",\"id\":32531859,\"avatar_url\":\"https:\\/\\/avatars3.githubusercontent.com\\/u\\/32531859?v=4\",\"gravatar_id\":\"\",\"url\":\"https:\\/\\/api.github.com\\/users\\/toannguyen-lockon\",\"html_url\":\"https:\\/\\/github.com\\/toannguyen-lockon\",\"followers_url\":\"https:\\/\\/api.github.com\\/users\\/toannguyen-lockon\\/followers\",\"following_url\":\"https:\\/\\/api.github.com\\/users\\/toannguyen-lockon\\/following{\\/other_user}\",\"gists_url\":\"https:\\/\\/api.github.com\\/users\\/toannguyen-lockon\\/gists{\\/gist_id}\",\"starred_url\":\"https:\\/\\/api.github.com\\/users\\/toannguyen-lockon\\/starred{\\/owner}{\\/repo}\",\"subscriptions_url\":\"https:\\/\\/api.github.com\\/users\\/toannguyen-lockon\\/subscriptions\",\"organizations_url\":\"https:\\/\\/api.github.com\\/users\\/toannguyen-lockon\\/orgs\",\"repos_url\":\"https:\\/\\/api.github.com\\/users\\/toannguyen-lockon\\/repos\",\"events_url\":\"https:\\/\\/api.github.com\\/users\\/toannguyen-lockon\\/events{\\/privacy}\",\"received_events_url\":\"https:\\/\\/api.github.com\\/users\\/toannguyen-lockon\\/received_events\",\"type\":\"User\",\"site_admin\":false,\"name\":null,\"company\":null,\"blog\":\"\",\"location\":null,\"email\":\"nvtoan@lockon-vn.com\",\"hireable\":null,\"bio\":null,\"public_repos\":9,\"public_gists\":0,\"followers\":0,\"following\":0,\"created_at\":\"2017-10-05T02:54:21Z\",\"updated_at\":\"2017-10-05T02:55:33Z\",\"private_gists\":0,\"total_private_repos\":0,\"owned_private_repos\":0,\"disk_usage\":0,\"collaborators\":0,\"two_factor_authentication\":false,\"plan\":{\"name\":\"free\",\"space\":976562499,\"collaborators\":0,\"private_repos\":0}}',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
