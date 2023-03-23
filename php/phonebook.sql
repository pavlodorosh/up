DROP DATABASE IF EXISTS `up`;

CREATE DATABASE IF NOT EXISTS `up`;

USE `up`;

DROP TABLE IF EXISTS `phonebook`;

CREATE TABLE `phonebook`(
    `ID` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(35) NULL DEFAULT '',
    `surname` VARCHAR(35) NULL DEFAULT '',
    `spec` VARCHAR(35) NULL DEFAULT '',
    `phone` VARCHAR(15) NULL DEFAULT '',
    `comments` TEXT ,
    `date` DATE NULL,
    PRIMARY KEY (`id`)
)  ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;

/************/


/*
DROP DATABASE `up`;
CREATE DATABASE `up`;

DROP TABLE `phonebook`;
CREATE TABLE `phonebook`(
    `ID` INT NOT NULL,
)  ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;

ALTER TABLE `phonebook` ADD `dates` DATE NOT NULL AFTER `spec`;
ALTER TABLE `phonebook` DROP COLUMN `dates`;

ALTER TABLE `phonebook` CHANGE `comments` `comments` TEXT NULL DEFAULT NULL;

*/


RENAME TABLE `up`.`phonebook` TO `up`.`phonebooks`;
ALTER TABLE `phonebook` CHANGE `name` `names` VARCHAR(35) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '';



USE `up`;

INSERT INTO `phonebook` (`ID`, `name`, `surname`, `spec`, `phone`, `comments`, `date`) VALUES ('1', 'Max', 'S', 'student', '+380961234567', 'front', '2022-11-26');


SELECT * FROM `phonebook`;

SELECT * FROM `phonebook` WHERE `name`= 'Max';
#SELECT * FROM `phonebook` WHERE `name`= 'Max';
-- SELECT * FROM `phonebook` WHERE `name`= 'Max';
/* SELECT * FROM `phonebook` WHERE `name`= 'Max'; */





SELECT DISTINCT `post_title` FROM `wp_posts`;
SELECT DISTINCT `post_title` FROM `wp_posts` LIMIT 5;
SELECT DISTINCT `post_title` FROM `wp_posts` LIMIT 5 OFFSET 5;
SELECT DISTINCT `post_title` FROM `wp_posts` LIMIT 5,5;
SELECT MAX(`ID`)  FROM `wp_posts`;
SELECT MAX(`ID`) AS `MAXID` FROM `wp_posts`;
SELECT COUNT(`post_title`) FROM `wp_posts`;
SELECT SUM(`ID`) FROM `wp_posts`
SELECT AVG(`ID`) FROM `wp_posts`;
SELECT `post_title`,`post_modified` FROM `wp_posts` ORDER BY `post_modified`;
SELECT `post_title`,`post_modified` FROM `wp_posts` ORDER BY `wp_posts`.`post_modified` DESC
SELECT `post_title` FROM `wp_posts` WHERE `post_type` = 'post';
SELECT `post_title`,`post_type` FROM `wp_posts` WHERE `post_type` <> 'post';
SELECT `post_title`,`post_type` FROM `wp_posts` WHERE `post_type` != 'post';
SELECT `ID`,`post_title`,`post_type` FROM `wp_posts` WHERE `post_parent`>150;
SELECT `ID`,`post_title`,`post_type` FROM `wp_posts` WHERE `post_parent` BETWEEN 500 AND 1000;
SELECT `ID`,`post_title`,`post_type` FROM `wp_posts` WHERE `post_type`<>'revision' AND `post_type`<>'product_variation';
SELECT `ID`,`post_title`,`post_type` FROM `wp_posts` WHERE `post_type`='revision' OR `post_type`='product_variation';
SELECT `ID`,`post_title`,`post_type` FROM `wp_posts` WHERE NOT `post_type`='revision' OR NOT `post_type`='product_variation';
SELECT `ID`,`post_title`,`post_type` FROM `wp_posts` WHERE NOT `post_type`='revision' AND NOT `post_type`='product_variation';
SELECT `ID`,`post_title`,`post_type`,`post_parent` FROM `wp_posts` WHERE NOT `post_type`='product_variation' AND ( `post_parent` BETWEEN 100 AND 3000 );
SELECT `ID`,`post_title` FROM `wp_posts` WHERE `post_title` LIKE '%а%';
SELECT `ID`,`post_title` FROM `wp_posts` WHERE `post_title` LIKE 'а%';
SELECT `ID`,`post_title` FROM `wp_posts` WHERE `post_title` LIKE '%а';
SELECT `ID`,`post_title` FROM `wp_posts` WHERE `post_title` LIKE 'г%а';
SELECT `ID`,`post_title` FROM `wp_posts` WHERE `post_title` LIKE 'г__%';
SELECT * FROM `wp_posts` WHERE `post_type` IN ( 'product_variation', 'attachment');




USE `up`;
INSERT INTO `phonebook` VALUES (2, 'MAX', 'K', 'students', '+380974561241', 'comments', '2022-11-11');

ALTER TABLE `phonebook` ADD New colum VARCHAR(15);

ALTER TABLE `phonebook` MODIFY COLUMN spec TEXT