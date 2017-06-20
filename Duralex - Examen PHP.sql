-- MySQL Script generated by MySQL Workbench
-- 06/19/17 20:36:24
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema Duralex
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `Duralex` ;

-- -----------------------------------------------------
-- Schema Duralex
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Duralex` DEFAULT CHARACTER SET utf8 ;
USE `Duralex` ;

-- -----------------------------------------------------
-- Table `Duralex`.`Client`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Duralex`.`Client` ;

CREATE TABLE IF NOT EXISTS `Duralex`.`Client` (
  `rut` VARCHAR(12) NOT NULL,
  `firstName` VARCHAR(100) NOT NULL,
  `lastName` VARCHAR(100) NOT NULL,
  `createTime` DATETIME(6) NULL,
  `address` VARCHAR(400) NULL,
  `phone1` INT NULL,
  `phone2` INT NULL,
  PRIMARY KEY (`rut`),
  UNIQUE INDEX `rut_UNIQUE` (`rut` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Duralex`.`Profile`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Duralex`.`Profile` ;

CREATE TABLE IF NOT EXISTS `Duralex`.`Profile` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Duralex`.`User`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Duralex`.`User` ;

CREATE TABLE IF NOT EXISTS `Duralex`.`User` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(400) NOT NULL,
  `Profile_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  INDEX `fk_User_Profile1_idx` (`Profile_id` ASC),
  CONSTRAINT `fk_User_Profile1`
    FOREIGN KEY (`Profile_id`)
    REFERENCES `Duralex`.`Profile` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Duralex`.`Lawyer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Duralex`.`Lawyer` ;

CREATE TABLE IF NOT EXISTS `Duralex`.`Lawyer` (
  `rut` VARCHAR(12) NOT NULL,
  `firstName` VARCHAR(100) NOT NULL,
  `lastName` VARCHAR(100) NOT NULL,
  `hireDate` DATETIME(6) NOT NULL ,
  `specialty` VARCHAR(400) NULL,
  `hourCost` INT NOT NULL,
  `observation` TEXT(5000) NULL,
  PRIMARY KEY (`rut`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Duralex`.`Attention`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Duralex`.`Attention` ;

CREATE TABLE IF NOT EXISTS `Duralex`.`Attention` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `attentionDate` DATETIME(6) NULL,
  `status` VARCHAR(45) NOT NULL,
  `Lawyer_rut` VARCHAR(12) NOT NULL,
  `Client_rut` VARCHAR(12) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Attention_Lawyer_idx` (`Lawyer_rut` ASC),
  INDEX `fk_Attention_Client1_idx` (`Client_rut` ASC),
  CONSTRAINT `fk_Attention_Lawyer`
    FOREIGN KEY (`Lawyer_rut`)
    REFERENCES `Duralex`.`Lawyer` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Attention_Client1`
    FOREIGN KEY (`Client_rut`)
    REFERENCES `Duralex`.`Client` (`rut`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
