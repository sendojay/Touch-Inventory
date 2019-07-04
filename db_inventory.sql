-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.17-log - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_inventory
CREATE DATABASE IF NOT EXISTS `db_inventory` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_inventory`;

-- Dumping structure for table db_inventory.item
CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(100) DEFAULT NULL,
  `item_member_id` int(11) NOT NULL DEFAULT '0',
  `item_description` text,
  `item_date_create` datetime DEFAULT NULL,
  `item_date_modify` datetime DEFAULT NULL,
  `item_date_using` datetime DEFAULT NULL,
  `item_date_delete` datetime DEFAULT NULL,
  `item_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table db_inventory.item: ~0 rows (approximately)
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
/*!40000 ALTER TABLE `item` ENABLE KEYS */;

-- Dumping structure for table db_inventory.member
CREATE TABLE IF NOT EXISTS `member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_role_id` int(11) NOT NULL DEFAULT '0',
  `member_role_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_position_id` int(11) NOT NULL DEFAULT '0',
  `member_position_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `member_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `member_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_fname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_lname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_date_create` datetime DEFAULT NULL,
  `member_date_modify` datetime DEFAULT NULL,
  `member_date_delete` datetime DEFAULT NULL,
  `member_date_lastlogin` datetime DEFAULT NULL,
  `member_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_inventory.member: ~1 rows (approximately)
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
REPLACE INTO `member` (`member_id`, `member_role_id`, `member_role_name`, `member_position_id`, `member_position_name`, `member_username`, `member_password`, `member_code`, `member_fname`, `member_lname`, `member_email`, `member_phone`, `member_date_create`, `member_date_modify`, `member_date_delete`, `member_date_lastlogin`, `member_status`) VALUES
	(1, 1, 'aaa', 1, 'aa', 'admin', 'a82089b27bd54dd56090cddbe2faa809', NULL, 'Administrator', '.', '', '', NULL, '2019-07-04 07:02:51', NULL, NULL, 1);
/*!40000 ALTER TABLE `member` ENABLE KEYS */;

-- Dumping structure for table db_inventory.position
CREATE TABLE IF NOT EXISTS `position` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `position_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position_date_create` datetime DEFAULT NULL,
  `position_date_modify` datetime DEFAULT NULL,
  `position_date_delete` datetime DEFAULT NULL,
  `position_status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_inventory.position: ~0 rows (approximately)
/*!40000 ALTER TABLE `position` DISABLE KEYS */;
/*!40000 ALTER TABLE `position` ENABLE KEYS */;

-- Dumping structure for table db_inventory.role
CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_date_create` datetime DEFAULT NULL,
  `role_date_modify` datetime DEFAULT NULL,
  `role_date_delete` datetime DEFAULT NULL,
  `role_status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table db_inventory.role: ~0 rows (approximately)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Dumping structure for table db_inventory.session
CREATE TABLE IF NOT EXISTS `session` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสกำกับ',
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ที่อยู่ IPAddress',
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'เวลาที่บันทึก',
  `data` blob NOT NULL COMMENT 'ข้อมูล Session',
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Session Codeigniter';

-- Dumping data for table db_inventory.session: ~0 rows (approximately)
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
/*!40000 ALTER TABLE `session` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
