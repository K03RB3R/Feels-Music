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
  `idsentimento` INT AUTO_INCREMENT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idsentimento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bancofeelsmusic`.`genero`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bancofeelsmusic`.`genero` (
  `idgenero` INT AUTO_INCREMENT NOT NULL,
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
  `idusuario` INT AUTO_INCREMENT NOT NULL,
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
  `idartista` INT AUTO_INCREMENT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idartista`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bancofeelsmusic`.`album`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bancofeelsmusic`.`album` (
  `idalbum` INT AUTO_INCREMENT NOT NULL,
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
  `idmusica` INT AUTO_INCREMENT NOT NULL,
  `titulo` VARCHAR(45) NOT NULL,
  `musica_idgenero` INT NOT NULL,
  `album_idalbum` INT NOT NULL,
  PRIMARY KEY (`idmusica`),
  INDEX `fk_musica_musica1_idx` (`musica_idgenero` ASC),
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

INSERT INTO `bancofeelsmusic`.`tipo_usuario` (`idtipo_usuario`, `descricao_usuario`) VALUES ('1', 'Usuario');
INSERT INTO `bancofeelsmusic`.`tipo_usuario` (`idtipo_usuario`, `descricao_usuario`) VALUES ('2', 'Adm');

INSERT INTO `bancofeelsmusic`.`sentimento` (`idsentimento`, `nome`) VALUES ('1', 'Apaixonado ');
INSERT INTO `bancofeelsmusic`.`sentimento` (`idsentimento`, `nome`) VALUES ('2', 'Com vontade de cantar ');
INSERT INTO `bancofeelsmusic`.`sentimento` (`idsentimento`, `nome`) VALUES ('3', 'Feliz ');
INSERT INTO `bancofeelsmusic`.`sentimento` (`idsentimento`, `nome`) VALUES ('4', 'Inspirado ');
INSERT INTO `bancofeelsmusic`.`sentimento` (`idsentimento`, `nome`) VALUES ('5', 'Querendo Nostalgia ');
INSERT INTO `bancofeelsmusic`.`sentimento` (`idsentimento`, `nome`) VALUES ('6', 'Momento com Deus ');
INSERT INTO `bancofeelsmusic`.`sentimento` (`idsentimento`, `nome`) VALUES ('7', 'Triste ');

INSERT INTO `bancofeelsmusic`.`genero` (`idgenero`, `nome`, `sentimento_idsentimento`) VALUES ('1', 'Funk', '1');
INSERT INTO `bancofeelsmusic`.`genero` (`idgenero`, `nome`, `sentimento_idsentimento`) VALUES ('2', 'Hip Hop/Hap', '1');
INSERT INTO `bancofeelsmusic`.`genero` (`idgenero`, `nome`, `sentimento_idsentimento`) VALUES ('3', 'Música eletrônica', '1');
INSERT INTO `bancofeelsmusic`.`genero` (`idgenero`, `nome`, `sentimento_idsentimento`) VALUES ('4', 'Pagode/Samba', '1');
INSERT INTO `bancofeelsmusic`.`genero` (`idgenero`, `nome`, `sentimento_idsentimento`) VALUES ('5', 'Rock/Pop/Mpb', '1');
INSERT INTO `bancofeelsmusic`.`genero` (`idgenero`, `nome`, `sentimento_idsentimento`) VALUES ('6', 'Sertanejo', '1');

INSERT INTO `bancofeelsmusic`.`artista` (`idartista`, `nome`) VALUES ('1', 'Annita');
INSERT INTO `bancofeelsmusic`.`artista` (`idartista`, `nome`) VALUES ('2', 'Lexa');
INSERT INTO `bancofeelsmusic`.`artista` (`idartista`, `nome`) VALUES ('3', 'Kevinho');
INSERT INTO `bancofeelsmusic`.`artista` (`idartista`, `nome`) VALUES ('4', 'Marilia Mendonça');
INSERT INTO `bancofeelsmusic`.`artista` (`idartista`, `nome`) VALUES ('5', 'Henrique e Juliano');
INSERT INTO `bancofeelsmusic`.`artista` (`idartista`, `nome`) VALUES ('6', 'Gusttavo Lima');
INSERT INTO `bancofeelsmusic`.`artista` (`idartista`, `nome`) VALUES ('7', 'Turma do Pagode');
INSERT INTO `bancofeelsmusic`.`artista` (`idartista`, `nome`) VALUES ('8', 'Dilsinho');
INSERT INTO `bancofeelsmusic`.`artista` (`idartista`, `nome`) VALUES ('9', 'Thiaguinho');

INSERT INTO `bancofeelsmusic`.`album` (`idalbum`, `ano_lancamento`, `nome`, `artista_idartista`) VALUES ('1', '2019-01-01', 'Kisses', '1');
INSERT INTO `bancofeelsmusic`.`album` (`idalbum`, `ano_lancamento`, `nome`, `artista_idartista`) VALUES ('2', '2019-01-01', 'Só depois do carnaval', '2');
INSERT INTO `bancofeelsmusic`.`album` (`idalbum`, `ano_lancamento`, `nome`, `artista_idartista`) VALUES ('3', '2019-01-01', 'O Grave Bater', '3');
INSERT INTO `bancofeelsmusic`.`album` (`idalbum`, `ano_lancamento`, `nome`, `artista_idartista`) VALUES ('4', '2019-01-01', 'Todos os cantos', '4');
INSERT INTO `bancofeelsmusic`.`album` (`idalbum`, `ano_lancamento`, `nome`, `artista_idartista`) VALUES ('5', '2019-01-01', 'Novas Histórias', '5');
INSERT INTO `bancofeelsmusic`.`album` (`idalbum`, `ano_lancamento`, `nome`, `artista_idartista`) VALUES ('6', '2019-01-01', 'O Embaixador', '6');
INSERT INTO `bancofeelsmusic`.`album` (`idalbum`, `ano_lancamento`, `nome`, `artista_idartista`) VALUES ('7', '2019-01-01', 'O Som das Multidões', '7');
INSERT INTO `bancofeelsmusic`.`album` (`idalbum`, `ano_lancamento`, `nome`, `artista_idartista`) VALUES ('8', '2019-01-01', 'Terra do nunca', '8');
INSERT INTO `bancofeelsmusic`.`album` (`idalbum`, `ano_lancamento`, `nome`, `artista_idartista`) VALUES ('9', '2019-01-01', 'Tardezinha', '9');

INSERT INTO `bancofeelsmusic`.`usuario` (`idusuario`, `nome`, `data_nascimento`, `email`, `senha`, `nickname`, `tipo_usuario_idtipo_usuario1`, `sentimento_idsentimento`) VALUES ('1', 'Bruna Ribeiro', '1995-09-18', 'brunaeita@hotmail.com', 'bru123', 'Bru', '2', '1');
INSERT INTO `bancofeelsmusic`.`usuario` (`idusuario`, `nome`, `data_nascimento`, `email`, `senha`, `nickname`, `tipo_usuario_idtipo_usuario1`, `sentimento_idsentimento`) VALUES ('2', 'Guilherme Koerber', '2001-11-10', 'gk01@hotmail.com', 'gui123', 'Bru', '2', '1');
INSERT INTO `bancofeelsmusic`.`usuario` (`idusuario`, `nome`, `data_nascimento`, `email`, `senha`, `nickname`, `tipo_usuario_idtipo_usuario1`, `sentimento_idsentimento`) VALUES ('3', 'Felipe Rangel', '1990-06-20', 'feliperangel@hotmail.com', 'lipe123', 'Lipe', '2', '1');
INSERT INTO `bancofeelsmusic`.`usuario` (`idusuario`, `nome`, `data_nascimento`, `email`, `senha`, `nickname`, `tipo_usuario_idtipo_usuario1`, `sentimento_idsentimento`) VALUES ('4', 'Roberto Casagrande', '1998-03-18', 'casaroberto@hotmail.com', 'casa123', 'Casa', '2', '1');

UPDATE `usuario` SET `nickname` = 'GK' WHERE `usuario`.`idusuario` = 2;

ALTER TABLE `usuario` ADD UNIQUE (`nickname`);

ALTER TABLE `usuario` ADD UNIQUE (`email`);

ALTER TABLE `musica` ADD `caminho` VARCHAR(80);

INSERT `musica` (`idmusica`, `titulo`, `musica_idgenero`, `album_idalbum`, `caminho`)  
    VALUES (1, 'Fazer Falta', 1,3, '../../assets/musics/Fazer Falta.mp3');  

INSERT `musica` (`idmusica`, `titulo`, `musica_idgenero`, `album_idalbum`, `caminho`)  
    VALUES (2, 'On The Floor', 3,3, '../../assets/musics/On the floor (reduzida).mp3');
    
INSERT `musica` (`idmusica`, `titulo`, `musica_idgenero`, `album_idalbum`, `caminho`)  
    VALUES (3, 'Troféu do Ano', 1,3, '../../assets/musics/Troféu do Ano.mp3');
    
INSERT `musica` (`idmusica`, `titulo`, `musica_idgenero`, `album_idalbum`, `caminho`)  
    VALUES (4, 'Pirata e Tesouro', 4,9, '../../assets/musics/Pirata e Tesouro (reduzida).mp3');
    
INSERT `musica` (`idmusica`, `titulo`, `musica_idgenero`, `album_idalbum`, `caminho`)  
    VALUES (5, 'A Dama E O Vagabundo', 6,6, '../../assets/musics/A Dama e o Vagabundo (reduzida).mp3');
    
INSERT `musica` (`idmusica`, `titulo`, `musica_idgenero`, `album_idalbum`, `caminho`)  
    VALUES (6, 'Sunshine', 3,2, '../../assets/musics/Sunshine (reduzida).mp3');
    
INSERT `musica` (`idmusica`, `titulo`, `musica_idgenero`, `album_idalbum`, `caminho`)  
    VALUES (7, 'Turn Of The Lights', 3,2, '../../assets/musics/Turn of the lights (reduzida).mp3');
    
INSERT `musica` (`idmusica`, `titulo`, `musica_idgenero`, `album_idalbum`, `caminho`)  
    VALUES (8, 'Viva a Vida', 4,9, '../../assets/musics/Turn of the lights (reduzida).mp3');

