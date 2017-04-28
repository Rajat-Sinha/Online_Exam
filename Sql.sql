CREATE DATABASE Online_Exam;
CREATE TABLE `online_exam`.`register` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(20) NOT NULL , `username` VARCHAR(20) NOT NULL , `email` VARCHAR(30) NOT NULL , `password` VARCHAR(20) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
