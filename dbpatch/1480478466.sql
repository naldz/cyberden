-- MySQL Script generated by MySQL Workbench
-- Wed Nov 30 12:02:57 2016
-- Model: New Model    Version: 1.0
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `station`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `station` (
  `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `mac_address` VARCHAR(20) NOT NULL,
  `is_commissioned` TINYINT UNSIGNED NOT NULL COMMENT 'Determines if a station is working or not' /* comment truncated */ /*1 = Working
2 = Not working*/,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `administrator`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `administrator` (
  `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  `username` VARCHAR(20) NOT NULL,
  `password` VARCHAR(100) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `session`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `session` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `station_id` SMALLINT UNSIGNED NOT NULL,
  `administrator_id` SMALLINT UNSIGNED NOT NULL,
  `duration` SMALLINT NULL COMMENT 'duration in minutes',
  `duration_end_time` DATETIME NOT NULL,
  `start_time` DATETIME NOT NULL,
  `end_time` DATETIME NULL,
  `cost` DECIMAL(10,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `is_paid` TINYINT NOT NULL DEFAULT 0,
  `comment` TEXT NULL,
  `is_in_session` TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `fk_session_station_idx` (`station_id` ASC),
  INDEX `fk_session_administrator1_idx` (`administrator_id` ASC),
  CONSTRAINT `fk_session_station`
    FOREIGN KEY (`station_id`)
    REFERENCES `station` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_session_administrator1`
    FOREIGN KEY (`administrator_id`)
    REFERENCES `administrator` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
