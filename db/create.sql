SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema whats_that_music
-- -----------------------------------------------------
CREATE DATABASE whats_that_music;
USE `whats_that_music` ;

-- -----------------------------------------------------
-- Table `whats_that_music`.`EXTRACTS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `whats_that_music`.`EXTRACTS` (
  `ID`              INT           NOT NULL AUTO_INCREMENT,
  `NAME`            VARCHAR(45)   NOT NULL,
  `DIFFICULTY`      INT           NOT NULL,
  `IMG`             VARCHAR(45)   NULL DEFAULT 'default link',
  `MP3`             INT,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `whats_that_music`.`ARTISTS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `whats_that_music`.`ARTISTS` (
  `ID`              INT           NOT NULL AUTO_INCREMENT,
  `NAME`            VARCHAR(45)   NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `whats_that_music`.`CATEGORIES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `whats_that_music`.`CATEGORIES` (
  `ID`              INT           NOT NULL AUTO_INCREMENT,
  `NAME`            VARCHAR(45)   NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `whats_that_music`.`SUB-CATEGORIES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `whats_that_music`.`SUB-CATEGORIES` (
  `ID`              INT           NOT NULL AUTO_INCREMENT,
  `NAME`            VARCHAR(45)   NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `whats_that_music`.`EXTRACTS -> CATEGORIES // SUB-CATEGORIES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `whats_that_music`.`EXTRACTS_has_(SUB)CATEGORIES` (
  `ID`              INT           NOT NULL AUTO_INCREMENT,
  `EXTRACT_ID`      INT           NOT NULL,
  `CATEGORY_ID`     INT,
  `SUB-CATEGORY_ID` INT,
  PRIMARY KEY (`ID`),
  CONSTRAINT `fk_EXTRACTS_has_CATEGORIES_EXTRACTS1`
    FOREIGN KEY (`EXTRACT_ID`)
    REFERENCES `whats_that_music`.`EXTRACTS` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_EXTRACTS_has_CATEGORIES_CATEGORIES1`
    FOREIGN KEY (`CATEGORY_ID`)
    REFERENCES `whats_that_music`.`CATEGORIES` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_EXTRACTS_has_CATEGORIES_SUB-CATEGORIES1`
    FOREIGN KEY (`SUB-CATEGORY_ID`)
    REFERENCES `whats_that_music`.`SUB-CATEGORIES` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `whats_that_music`.`EXTRACTS -> ARTISTS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `whats_that_music`.`EXTRACTS_has_ARTISTS` (
  `ID`              INT           NOT NULL AUTO_INCREMENT,
  `EXTRACT_ID`      INT           NOT NULL,
  `ARTIST_ID`       INT           NOT NULL,
  PRIMARY KEY (`ID`),
  CONSTRAINT `fk_EXTRACTS_has_ARTISTS_EXTRACTS1`
    FOREIGN KEY (`EXTRACT_ID`)
    REFERENCES `whats_that_music`.`EXTRACTS` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_EXTRACTS_has_ARTISTS_ARTISTS1`
    FOREIGN KEY (`ARTIST_ID`)
    REFERENCES `whats_that_music`.`ARTISTS` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
