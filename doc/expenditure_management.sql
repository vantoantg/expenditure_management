/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.6.20 : Database - expenditure_management
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`expenditure_management` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `expenditure_management`;

/*Table structure for table `migration` */

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `migration` */

insert  into `migration`(`version`,`apply_time`) values ('m000000_000000_base',1514960736),('m180103_062712_tn_user',1514960974);

/*Table structure for table `tn_user` */

DROP TABLE IF EXISTS `tn_user`;

CREATE TABLE `tn_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `auth_key` varchar(128) NOT NULL,
  `access_token` varchar(128) DEFAULT NULL,
  `password_reset_token` varchar(128) DEFAULT NULL,
  `role` tinyint(1) DEFAULT '0',
  `name` varchar(32) DEFAULT '--',
  `slug_name` varchar(155) DEFAULT NULL,
  `avatar` varchar(155) DEFAULT NULL,
  `archive` tinyint(1) DEFAULT '0',
  `type` tinyint(1) DEFAULT '1',
  `lang` varchar(5) DEFAULT 'vi',
  `timezone` varchar(100) DEFAULT 'Asia/Bangkok',
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `access_token` (`access_token`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

/*Data for the table `tn_user` */

insert  into `tn_user`(`id`,`username`,`password`,`auth_key`,`access_token`,`password_reset_token`,`role`,`name`,`slug_name`,`avatar`,`archive`,`type`,`lang`,`timezone`,`status`) values (1,'admin','$2y$13$HAh9iitRiwHuDnNUM8w/qubkrFmh1GLZ.EG/VwkTz3jSBSzg1nafC','!','admin','Jvm(',1,'Tona','','/web/uploads/images/users/11947627_1196879580337720_2083630260241166797_n.jpg',0,1,'vi','Asia/Bangkok',1),(41,'tonanguyen','$2y$13$HAh9iitRiwHuDnNUM8w/qubkrFmh1GLZ.EG/VwkTz3jSBSzg1nafC','p','','',1,'Nguyen Tona','','',0,1,'vi','Asia/Bangkok',1),(55,'trangnguyen','$2y$13$XgdSsGjA1jqk99QnQY1F9uMoAeQoRPmTPVeGj4j53RVfgEWdcaTye','','a','d',1,'Nguyễn Thu Trang','','',0,1,'vi','Asia/Bangkok',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
