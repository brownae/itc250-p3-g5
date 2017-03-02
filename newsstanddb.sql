-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS Category;
CREATE TABLE Category (
    CategoryID INT unsigned NOT NULL AUTO_INCREMENT,
    Subject VARCHAR(255),
    Description TEXT,
    DateAdded DATETIME,
    LastUpdated TIMESTAMP 
        DEFAULT 0 ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (CategoryID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO Category 
(Subject, Description, DateAdded) 
VALUES
('Art', 'Keep up with the most innovative artists around the world!',  Now()),
('Technology', 'All the latest tech news!',  Now()),
('Sports', 'Get the latest scores, updates and whatever else sports dudes talk about!',  Now());

DROP TABLE IF EXISTS Feed;
CREATE TABLE Feed (
    FeedID INT unsigned NOT NULL AUTO_INCREMENT,
    CategoryID INT unsigned DEFAULT '0',
    Subject VARCHAR(255),
    Description TEXT,
    DateAdded DATETIME,
    LastUpdated TIMESTAMP 
        DEFAULT 0 ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (FeedID),
  INDEX ux_CategoryID (CategoryID),
  CONSTRAINT fk_Category_Feed 
    FOREIGN KEY (CategoryID) 
    REFERENCES Category(CategoryID) 
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

SELECT @ID := CategoryID
    FROM Category
    WHERE Subject = 'Art';

INSERT INTO Feed 
(CategoryID, Subject, Description, DateAdded) 
VALUES
#Art
(@ID,	'Painting',	'News on painting',	Now()),
(@ID,	'Music',	'Music news',	Now()),
(@ID,	'Dance',	'Dancing news',	Now());

SELECT @ID :=  CategoryID
    FROM Category
    WHERE Subject = 'Technology';

INSERT INTO Feed 
(CategoryID, Subject, Description, DateAdded) 
#Tech
Values
(@ID,	'Companies',	'What tech companies are making the news?',	Now()),
(@ID,	'Devices',	'What new devices are making the news?',	    Now()),
(@ID,	'New Discoveries',	'What will be discovered next?',	    Now());

SELECT @ID := CategoryID
    FROM Category
    WHERE Subject = 'Sports';

INSERT INTO Feed 
(CategoryID, Subject, Description, DateAdded) 
#Sports
Values
(@ID,	'Running',	'Running news',	 Now()),
(@ID,	'Cycling',	'Cycling news',  Now()),
(@ID,	'Swimming',	'Swimming news', Now());

-- 2017-02-28 22:47:08
