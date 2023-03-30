-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.1.72-community - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for csforum
DROP DATABASE IF EXISTS `csforum`;
CREATE DATABASE IF NOT EXISTS `csforum` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `csforum`;

-- Dumping structure for table csforum.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET ucs2 COLLATE ucs2_bin NOT NULL,
  `description` text CHARACTER SET ucs2 COLLATE ucs2_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table csforum.categories: 10 rows
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
REPLACE INTO `categories` (`id`, `name`, `description`) VALUES
	(1, 'Computer Architecture', ''),
	(2, 'Data structures & Algorithms', ''),
	(3, 'Mathematics for Computer Science', ''),
	(4, 'Operating Systems', ''),
	(5, 'Computer Networking', ''),
	(6, 'Databases', ''),
	(7, 'Distributed Systems', ''),
	(8, 'Languages & Compilers', ''),
	(9, 'Programming', ''),
	(10, 'Cloud Computing Fundamentals', '');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table csforum.replies
DROP TABLE IF EXISTS `replies`;
CREATE TABLE IF NOT EXISTS `replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `body` text CHARACTER SET ucs2 COLLATE ucs2_bin NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `topic_id` (`topic_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table csforum.replies: 4 rows
/*!40000 ALTER TABLE `replies` DISABLE KEYS */;
REPLACE INTO `replies` (`id`, `topic_id`, `user_id`, `body`, `create_date`) VALUES
	(1, 1, 1, 'test', '2023-03-29 07:34:10'),
	(2, 1, 1, 'test', '2023-03-29 07:34:13'),
	(3, 1, 1, 'This is another test', '2023-03-29 07:42:28'),
	(4, 1, 1, 'This is another test', '2023-03-29 07:43:16');
/*!40000 ALTER TABLE `replies` ENABLE KEYS */;

-- Dumping structure for table csforum.topics
DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET ucs2 COLLATE ucs2_bin NOT NULL,
  `body` text CHARACTER SET ucs2 COLLATE ucs2_bin NOT NULL,
  `last_activity` datetime NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table csforum.topics: 2 rows
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
REPLACE INTO `topics` (`id`, `category_id`, `user_id`, `title`, `body`, `last_activity`, `create_date`) VALUES
	(1, 1, 1, 'Von Neumman Architecture', 'A Von Neuman architecture includes Primary Memory and a Central Procession Unit', '2023-03-27 14:44:03', '2023-03-27 14:44:03'),
	(2, 1, 1, 'test', 'test', '0000-00-00 00:00:00', '2023-03-28 07:53:10'),
	(4, 1, 2, 'New Post', 'This is a sample post', '0000-00-00 00:00:00', '2023-03-30 13:39:33');
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;

-- Dumping structure for table csforum.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` datetime NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table csforum.users: 2 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `username`, `password`, `gender`, `dob`, `type`) VALUES
	(1, 'admin', 'admin', 'MALE', '1972-11-21 00:00:00', 'STUDENT'),
	(2, 'dvazquez', '7c222fb2927d828af22f592134e8932480637c0d', 'male', '1972-11-21 00:00:00', 'STUDENT');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
