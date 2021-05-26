-- MySQL Script generated by MySQL Workbench
-- Wed May 26 14:03:18 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema GIEP-MASTER-DATABASS
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema GIEP-MASTER-DATABASS
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `GIEP-MASTER-DATABASS` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ;
USE `GIEP-MASTER-DATABASS` ;

-- -----------------------------------------------------
-- Table `GIEP-MASTER-DATABASS`.`agents`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `GIEP-MASTER-DATABASS`.`agents` ;

CREATE TABLE IF NOT EXISTS `GIEP-MASTER-DATABASS`.`agents` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `first_name` VARCHAR(45) NULL,
  `pole_service` VARCHAR(45) NULL,
  `function` VARCHAR(45) NULL,
  `passwords` VARCHAR(45) NULL,
  `active` TINYINT NOT NULL,
  `email` VARCHAR(70) NULL,
  `connexion_absences` TINYINT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GIEP-MASTER-DATABASS`.`absences_motif_start`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `GIEP-MASTER-DATABASS`.`absences_motif_start` ;

CREATE TABLE IF NOT EXISTS `GIEP-MASTER-DATABASS`.`absences_motif_start` (
  `idmotif_start` INT NOT NULL,
  `motif_start` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idmotif_start`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GIEP-MASTER-DATABASS`.`absences_motif_end`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `GIEP-MASTER-DATABASS`.`absences_motif_end` ;

CREATE TABLE IF NOT EXISTS `GIEP-MASTER-DATABASS`.`absences_motif_end` (
  `idmotif_end` INT NOT NULL,
  `motif_end` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idmotif_end`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `GIEP-MASTER-DATABASS`.`absences_absences`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `GIEP-MASTER-DATABASS`.`absences_absences` ;

CREATE TABLE IF NOT EXISTS `GIEP-MASTER-DATABASS`.`absences_absences` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `date_start` DATETIME NOT NULL,
  `date_end` DATETIME NOT NULL,
  `agents_id` INT NOT NULL,
  `motif_start_id` INT NOT NULL,
  `motif_end_id` INT NOT NULL,
  PRIMARY KEY (`id`, `agents_id`, `motif_start_id`, `motif_end_id`),
  INDEX `fk_absences_absences_agents1_idx` (`agents_id` ASC),
  INDEX `fk_absences_absences_absences_motif_start1_idx` (`motif_start_id` ASC),
  INDEX `fk_absences_absences_absences_motif_end1_idx` (`motif_end_id` ASC),
  CONSTRAINT `fk_absences_absences_agents1`
    FOREIGN KEY (`agents_id`)
    REFERENCES `GIEP-MASTER-DATABASS`.`agents` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_absences_absences_absences_motif_start1`
    FOREIGN KEY (`motif_start_id`)
    REFERENCES `GIEP-MASTER-DATABASS`.`absences_motif_start` (`idmotif_start`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_absences_absences_absences_motif_end1`
    FOREIGN KEY (`motif_end_id`)
    REFERENCES `GIEP-MASTER-DATABASS`.`absences_motif_end` (`idmotif_end`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
