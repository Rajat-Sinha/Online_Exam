CREATE DATABASE Online_Exam;
CREATE TABLE `online_exam`.`register` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(20) NOT NULL , `username` VARCHAR(20) NOT NULL , `email` VARCHAR(30) NOT NULL , `password` VARCHAR(20) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `online_exam`.`admin` ( `id` INT NOT NULL AUTO_INCREMENT , `Email Id` VARCHAR(30) NOT NULL , `Password` VARCHAR(30) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
INSERT INTO `admin` (`id`, `Email Id`, `Password`) VALUES (NULL, 'sinharajat.858@gmail.com', 'Rajat@858');
ALTER TABLE `admin` CHANGE `Email Id` `Email` VARCHAR(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
ALTER TABLE `admin` ADD `Name` VARCHAR(20) NOT NULL AFTER `id`;
UPDATE `admin` SET `Name` = 'Rajat Kumar Sinha' WHERE `admin`.`id` = 1
CREATE TABLE `online_exam`.`html` ( `id` INT NOT NULL AUTO_INCREMENT , `Question` VARCHAR(1000) NOT NULL , `Option1` VARCHAR(500) NOT NULL , `Option2` VARCHAR(500) NOT NULL , `Option3` VARCHAR(500) NOT NULL , `Option4` VARCHAR(500) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `online_exam`.`css` ( `id` INT NOT NULL AUTO_INCREMENT , `Question` VARCHAR(1000) NOT NULL , `Option1` VARCHAR(500) NOT NULL , `Option2` VARCHAR(500) NOT NULL , `Option3` VARCHAR(500) NOT NULL , `Option4` VARCHAR(500) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

