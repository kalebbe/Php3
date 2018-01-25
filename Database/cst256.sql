-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema cst256
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema cst256
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cst256` DEFAULT CHARACTER SET latin1 ;
USE `cst256` ;

-- -----------------------------------------------------
-- Table `cst256`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cst256`.`users` (
  `Id` INT(15) NOT NULL AUTO_INCREMENT,
  `First_Name` VARCHAR(50) NOT NULL,
  `Last_Name` VARCHAR(50) NOT NULL,
  `Email` VARCHAR(50) NOT NULL,
  `Display_Name` VARCHAR(50) NULL DEFAULT NULL,
  `Password` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
