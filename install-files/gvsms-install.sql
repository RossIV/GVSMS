--

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `gvsms`
--

CREATE USER 'gvsms'@'localhost' IDENTIFIED BY 'gvsms';

GRANT USAGE ON * . * TO 'gvsms'@'localhost' IDENTIFIED BY 'gvsms' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;

CREATE DATABASE IF NOT EXISTS `gvsms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;

GRANT ALL PRIVILEGES ON `gvsms` . * TO 'gvsms'@'localhost';

USE `gvsms`;

--
-- Table structure for table `numbers`
--

CREATE TABLE IF NOT EXISTS `numbers` (
  `number` varchar(12) NOT NULL,
  `name` varchar(25) default NULL,
  `grp` varchar(15) NOT NULL default '0',
  FULLTEXT KEY `number` (`number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='GVoice SMS Phone Number Database v1.5';

