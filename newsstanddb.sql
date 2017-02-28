-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `art_news`;
CREATE TABLE `art_news` (
  `ArtID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NewsID` int(10) unsigned DEFAULT '0',
  `Subject` text,
  `Description` text,
  `DateAdded` datetime DEFAULT NULL,
  `LastUpdated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ArtID`),
  KEY `NewsID_index` (`NewsID`),
  CONSTRAINT `art_news_ibfk_1` FOREIGN KEY (`NewsID`) REFERENCES `news_feed` (`NewsID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `art_news` (`ArtID`, `NewsID`, `Subject`, `Description`, `DateAdded`, `LastUpdated`) VALUES
(1,	1,	'Painting',	'News on painting',	'2017-02-26 15:47:03',	'2017-02-28 22:41:46'),
(2,	1,	'Music',	'Music news',	'2017-02-26 15:47:03',	'2017-02-28 22:42:08'),
(3,	1,	'Dance',	'Dancing news',	'2017-02-26 15:47:03',	'2017-02-28 22:42:27');

DROP TABLE IF EXISTS `news_feed`;
CREATE TABLE `news_feed` (
  `NewsID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `FeedID` int(10) unsigned DEFAULT '0',
  `Title` varchar(255) DEFAULT '',
  `Description` text,
  `DateAdded` datetime DEFAULT NULL,
  `LastUpdated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`NewsID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `news_feed` (`NewsID`, `FeedID`, `Title`, `Description`, `DateAdded`, `LastUpdated`) VALUES
(1,	1,	'CSS Newsfeed',	'Newsfeed Subjects',	'2017-02-26 15:47:03',	'2017-02-26 23:47:03');

DROP TABLE IF EXISTS `sports_news`;
CREATE TABLE `sports_news` (
  `SportsID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NewsID` int(10) unsigned DEFAULT '0',
  `Subject` text,
  `Description` text,
  `DateAdded` datetime DEFAULT NULL,
  `LastUpdated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`SportsID`),
  KEY `NewsID_index` (`NewsID`),
  CONSTRAINT `sports_news_ibfk_1` FOREIGN KEY (`NewsID`) REFERENCES `news_feed` (`NewsID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `sports_news` (`SportsID`, `NewsID`, `Subject`, `Description`, `DateAdded`, `LastUpdated`) VALUES
(1,	1,	'Running',	'Running news',	'2017-02-26 15:47:03',	'2017-02-28 22:43:22'),
(2,	1,	'Cycling',	'Cycling news',	'2017-02-26 15:47:03',	'2017-02-28 22:42:59'),
(3,	1,	'Swimming',	'Swimming news',	'2017-02-26 15:47:03',	'2017-02-28 22:43:09');

DROP TABLE IF EXISTS `tech_news`;
CREATE TABLE `tech_news` (
  `TechID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NewsID` int(10) unsigned DEFAULT '0',
  `Subject` text,
  `Description` text,
  `DateAdded` datetime DEFAULT NULL,
  `LastUpdated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`TechID`),
  KEY `NewsID_index` (`NewsID`),
  CONSTRAINT `tech_news_ibfk_1` FOREIGN KEY (`NewsID`) REFERENCES `news_feed` (`NewsID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tech_news` (`TechID`, `NewsID`, `Subject`, `Description`, `DateAdded`, `LastUpdated`) VALUES
(1,	1,	'Companies',	'What tech companies are making the news?',	'2017-02-26 15:47:03',	'2017-02-26 23:47:03'),
(2,	1,	'Devices',	'What new devices are making the news?',	'2017-02-26 15:47:03',	'2017-02-28 22:44:33'),
(3,	1,	'New Discoveries',	'What will be discovered next?',	'2017-02-26 15:47:03',	'2017-02-26 23:55:04');

-- 2017-02-28 22:47:08
