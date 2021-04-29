-- MySQL Script generated by MySQL Workbench
-- Wed Apr 28 15:52:48 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema gestorcursos
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema gestorcursos
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `gestorcursos` DEFAULT CHARACTER SET utf8mb4 ;
USE `gestorcursos` ;

-- -----------------------------------------------------
-- Table `gestorcursos`.`registro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gestorcursos`.`registro` (
  `matricula` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`matricula`),
  UNIQUE INDEX `matricula_UNIQUE` (`matricula` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestorcursos`.`cursos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gestorcursos`.`cursos` (
  `idcursos` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `unidades` INT NULL,
  `examen` INT NULL,
  `tareas` INT NULL,
  `asistencias` INT NULL,
  `final` INT NULL,
  `registro_matricula` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcursos`, `registro_matricula`),
  INDEX `fk_cursos_registro1_idx` (`registro_matricula` ASC),
  CONSTRAINT `fk_cursos_registro1`
    FOREIGN KEY (`registro_matricula`)
    REFERENCES `gestorcursos`.`registro` (`matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestorcursos`.`alumnos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gestorcursos`.`alumnos` (
  `idalumnos` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idalumnos`),
  UNIQUE INDEX `idalumnos_UNIQUE` (`idalumnos` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestorcursos`.`cursos_has_alumnos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gestorcursos`.`cursos_has_alumnos` (
  `cursos_idcursos` INT NOT NULL,
  `cursos_registro_matricula` VARCHAR(45) NOT NULL,
  `alumnos_idalumnos` INT NOT NULL,
  PRIMARY KEY (`cursos_idcursos`, `cursos_registro_matricula`, `alumnos_idalumnos`),
  INDEX `fk_cursos_has_alumnos_alumnos1_idx` (`alumnos_idalumnos` ASC),
  INDEX `fk_cursos_has_alumnos_cursos1_idx` (`cursos_idcursos` ASC, `cursos_registro_matricula` ASC),
  CONSTRAINT `fk_cursos_has_alumnos_cursos1`
    FOREIGN KEY (`cursos_idcursos` , `cursos_registro_matricula`)
    REFERENCES `gestorcursos`.`cursos` (`idcursos` , `registro_matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cursos_has_alumnos_alumnos1`
    FOREIGN KEY (`alumnos_idalumnos`)
    REFERENCES `gestorcursos`.`alumnos` (`idalumnos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestorcursos`.`unidades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gestorcursos`.`unidades` (
  `idunidades` INT NOT NULL,
  `examenes` INT NULL,
  `tareas` INT NULL,
  `asistencias` INT NULL,
  `cursos_idcursos` INT NOT NULL,
  `cursos_registro_matricula` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idunidades`, `cursos_idcursos`, `cursos_registro_matricula`),
  UNIQUE INDEX `idunidades_UNIQUE` (`idunidades` ASC),
  INDEX `fk_unidades_cursos1_idx` (`cursos_idcursos` ASC, `cursos_registro_matricula` ASC),
  CONSTRAINT `fk_unidades_cursos1`
    FOREIGN KEY (`cursos_idcursos` , `cursos_registro_matricula`)
    REFERENCES `gestorcursos`.`cursos` (`idcursos` , `registro_matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestorcursos`.`alumnosCalificaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gestorcursos`.`alumnosCalificaciones` (
  `idalumnosCalificaciones` INT NOT NULL,
  `calExamenes` INT NULL,
  `calTareas` INT NULL,
  `calAsistencias` INT NULL,
  `alumnos_idalumnos` INT NOT NULL,
  PRIMARY KEY (`idalumnosCalificaciones`, `alumnos_idalumnos`),
  INDEX `fk_alumnosCalificaciones_alumnos1_idx` (`alumnos_idalumnos` ASC),
  CONSTRAINT `fk_alumnosCalificaciones_alumnos1`
    FOREIGN KEY (`alumnos_idalumnos`)
    REFERENCES `gestorcursos`.`alumnos` (`idalumnos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestorcursos`.`alumnosCalificaciones_has_unidades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gestorcursos`.`alumnosCalificaciones_has_unidades` (
  `alumnosCalificaciones_idalumnosCalificaciones` INT NOT NULL,
  `alumnosCalificaciones_alumnos_idalumnos` INT NOT NULL,
  `unidades_idunidades` INT NOT NULL,
  `unidades_cursos_idcursos` INT NOT NULL,
  `unidades_cursos_registro_matricula` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`alumnosCalificaciones_idalumnosCalificaciones`, `alumnosCalificaciones_alumnos_idalumnos`, `unidades_idunidades`, `unidades_cursos_idcursos`, `unidades_cursos_registro_matricula`),
  INDEX `fk_alumnosCalificaciones_has_unidades_unidades1_idx` (`unidades_idunidades` ASC, `unidades_cursos_idcursos` ASC, `unidades_cursos_registro_matricula` ASC),
  INDEX `fk_alumnosCalificaciones_has_unidades_alumnosCalificaciones_idx` (`alumnosCalificaciones_idalumnosCalificaciones` ASC, `alumnosCalificaciones_alumnos_idalumnos` ASC),
  CONSTRAINT `fk_alumnosCalificaciones_has_unidades_alumnosCalificaciones1`
    FOREIGN KEY (`alumnosCalificaciones_idalumnosCalificaciones` , `alumnosCalificaciones_alumnos_idalumnos`)
    REFERENCES `gestorcursos`.`alumnosCalificaciones` (`idalumnosCalificaciones` , `alumnos_idalumnos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumnosCalificaciones_has_unidades_unidades1`
    FOREIGN KEY (`unidades_idunidades` , `unidades_cursos_idcursos` , `unidades_cursos_registro_matricula`)
    REFERENCES `gestorcursos`.`unidades` (`idunidades` , `cursos_idcursos` , `cursos_registro_matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
