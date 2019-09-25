-- MySQL Script generated by MySQL Workbench
-- Mon Sep 16 21:27:02 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bancofeelsmusic
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bancofeelsmusic
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bancofeelsmusic` DEFAULT CHARACTER SET utf8 ;
USE `bancofeelsmusic` ;

-- -----------------------------------------------------
-- Table `bancofeelsmusic`.`sentimento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bancofeelsmusic`.`sentimento` (
  `idsentimento` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idsentimento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bancofeelsmusic`.`genero`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bancofeelsmusic`.`genero` (
  `idgenero` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `sentimento_idsentimento` INT NOT NULL,
  PRIMARY KEY (`idgenero`),
  INDEX `fk_genero_sentimento1_idx` (`sentimento_idsentimento` ASC),
  CONSTRAINT `fk_genero_sentimento1`
    FOREIGN KEY (`sentimento_idsentimento`)
    REFERENCES `bancofeelsmusic`.`sentimento` (`idsentimento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bancofeelsmusic`.`tipo_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bancofeelsmusic`.`tipo_usuario` (
  `idtipo_usuario` INT NOT NULL,
  `descricao_usuario` VARCHAR(45) NULL,
  PRIMARY KEY (`idtipo_usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bancofeelsmusic`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bancofeelsmusic`.`usuario` (
  `idusuario` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `data_nascimento` DATE NOT NULL,
  `email` VARCHAR(80) NOT NULL,
  `senha` VARCHAR(50) NOT NULL,
  `nickname` VARCHAR(80) NOT NULL,
  `tipo_usuario_idtipo_usuario1` INT NOT NULL,
  `sentimento_idsentimento` INT NOT NULL,
  PRIMARY KEY (`idusuario`),
  INDEX `fk_usuario_tipo_usuario1_idx` (`tipo_usuario_idtipo_usuario1` ASC),
  INDEX `fk_usuario_sentimento1_idx` (`sentimento_idsentimento` ASC),
  CONSTRAINT `fk_usuario_tipo_usuario1`
    FOREIGN KEY (`tipo_usuario_idtipo_usuario1`)
    REFERENCES `bancofeelsmusic`.`tipo_usuario` (`idtipo_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_sentimento1`
    FOREIGN KEY (`sentimento_idsentimento`)
    REFERENCES `bancofeelsmusic`.`sentimento` (`idsentimento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bancofeelsmusic`.`artista`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bancofeelsmusic`.`artista` (
  `idartista` INT NOT NULL,
  `album_idalbum` VARCHAR(45) NULL,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idartista`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bancofeelsmusic`.`album`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bancofeelsmusic`.`album` (
  `idalbum` INT NOT NULL,
  `ano_lancamento` DATE NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `artista_idartista` INT NOT NULL,
  PRIMARY KEY (`idalbum`),
  INDEX `fk_album_artista1_idx` (`artista_idartista` ASC),
  CONSTRAINT `fk_album_artista1`
    FOREIGN KEY (`artista_idartista`)
    REFERENCES `bancofeelsmusic`.`artista` (`idartista`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bancofeelsmusic`.`musica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bancofeelsmusic`.`musica` (
  `idmusica` INT NOT NULL,
  `titulo` VARCHAR(45) NOT NULL,
  `musica_idgenero` INT NOT NULL,
  `album_idalbum` INT NOT NULL,
  PRIMARY KEY (`idmusica`),
  INDEX `fk_musica_musica1_idx` (`musica_idgenero` ASC) ,
  INDEX `fk_musica_album1_idx` (`album_idalbum` ASC) ,
  CONSTRAINT `fk_musica_musica1`
    FOREIGN KEY (`musica_idgenero`)
    REFERENCES `bancofeelsmusic`.`genero` (`idgenero`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_musica_album1`
    FOREIGN KEY (`album_idalbum`)
    REFERENCES `bancofeelsmusic`.`album` (`idalbum`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
