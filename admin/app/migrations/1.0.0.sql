CREATE DATABASE footballzoneadmin;

CREATE TABLE `footballzoneadmin`.`tbl_users` ( `id` INT NOT NULL AUTO_INCREMENT , `email_address` VARCHAR(64) NOT NULL , `password` VARCHAR(64) NOT NULL , `permission` INT(1) NOT NULL , `verified` BOOLEAN NULL DEFAULT NULL , `date_requested` DATE NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;

ALTER TABLE `tbl_users` ADD `forename` VARCHAR(64) NOT NULL AFTER `id`, ADD `surname` VARCHAR(64) NOT NULL AFTER `forename`;

ALTER TABLE `tbl_users` CHANGE `date_requested` `date_requested` DATETIME NOT NULL DEFAULT GETDATE() ;
