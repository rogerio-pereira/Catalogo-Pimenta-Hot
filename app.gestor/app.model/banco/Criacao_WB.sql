SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `bd_cat_pimentahot` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `bd_cat_pimentahot` ;

-- -----------------------------------------------------
-- Table `bd_cat_pimentahot`.`catalogo_usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_cat_pimentahot`.`catalogo_usuario` ;

CREATE TABLE IF NOT EXISTS `bd_cat_pimentahot`.`catalogo_usuario` (
  `codigo` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `usuario` VARCHAR(15) NOT NULL,
  `senha` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE INDEX `codigo_UNIQUE` (`codigo` ASC),
  UNIQUE INDEX `usuario_UNIQUE` (`usuario` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_cat_pimentahot`.`catalogo_categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_cat_pimentahot`.`catalogo_categoria` ;

CREATE TABLE IF NOT EXISTS `bd_cat_pimentahot`.`catalogo_categoria` (
  `codigo` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE INDEX `codigo_UNIQUE` (`codigo` ASC),
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_cat_pimentahot`.`catalogo_produtos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_cat_pimentahot`.`catalogo_produtos` ;

CREATE TABLE IF NOT EXISTS `bd_cat_pimentahot`.`catalogo_produtos` (
  `codigo` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `categoria` BIGINT UNSIGNED NOT NULL,
  `valor` DOUBLE NOT NULL,
  `link` VARCHAR(100) NULL,
  `ativo` BIT NOT NULL DEFAULT 1,
  PRIMARY KEY (`codigo`),
  UNIQUE INDEX `codigo_UNIQUE` (`codigo` ASC),
  INDEX `fk_produtos_categoria_idx` (`categoria` ASC),
  CONSTRAINT `fk_produtos_categoria`
    FOREIGN KEY (`categoria`)
    REFERENCES `bd_cat_pimentahot`.`catalogo_categoria` (`codigo`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `bd_cat_pimentahot`.`catalogo_usuario`
-- -----------------------------------------------------
START TRANSACTION;
USE `bd_cat_pimentahot`;
INSERT INTO `bd_cat_pimentahot`.`catalogo_usuario` (`codigo`, `nome`, `usuario`, `senha`) VALUES (1, 'Suporte', 'SupCatPimentaHot', 'c2a6fad017476bdb1f59b1d64b800639');

COMMIT;

