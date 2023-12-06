-- MySQL Workbench Synchronization
-- Generated: 2023-11-19 01:50
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: 55169

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `mydb`.`Fornecedor` (
  `idFornecedor` INT(11) NOT NULL AUTO_INCREMENT,
  `Nome_fornecedor` VARCHAR(200) NOT NULL,
  `endereco_fornecedor` VARCHAR(300) NOT NULL,
  PRIMARY KEY (`idFornecedor`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `mydb`.`Estoque` (
  `idEstoque` INT(11) NOT NULL AUTO_INCREMENT,
  `Qtdf_Estoque` FLOAT(11) NOT NULL,
  `data_entrada_estoque` VARCHAR(45) NOT NULL,
  `data_saida_estoque` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEstoque`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `mydb`.`Produto` (
  `idProduto` INT(11) NOT NULL AUTO_INCREMENT,
  `nome_produto` VARCHAR(60) NOT NULL,
  `desc_produto` VARCHAR(200) NOT NULL,
  `preco_produto` FLOAT(11) NOT NULL,
  `categoria_idcategoria` INT(11) NULL DEFAULT NULL,
  `Estoque_idEstoque` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idProduto`),
  INDEX `fk_Produto_categoria1_idx` (`categoria_idcategoria` ASC) VISIBLE,
  INDEX `fk_Produto_Estoque1_idx` (`Estoque_idEstoque` ASC) VISIBLE,
  CONSTRAINT `fk_Produto_categoria1`
    FOREIGN KEY (`categoria_idcategoria`)
    REFERENCES `mydb`.`categoria` (`idcategoria`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Produto_Estoque1`
    FOREIGN KEY (`Estoque_idEstoque`)
    REFERENCES `mydb`.`Estoque` (`idEstoque`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `mydb`.`categoria` (
  `idcategoria` INT(11) NOT NULL AUTO_INCREMENT,
  `nome_cat` VARCHAR(45) NOT NULL,
  `desc_cat` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `mydb`.`contatos` (
  `idcontatos` INT(11) NOT NULL AUTO_INCREMENT,
  `telefone` VARCHAR(150) NOT NULL,
  `email` VARCHAR(150) NULL DEFAULT NULL,
  `Fornecedor_idFornecedor` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idcontatos`),
  INDEX `fk_contatos_Fornecedor1_idx` (`Fornecedor_idFornecedor` ASC) VISIBLE,
  CONSTRAINT `fk_contatos_Fornecedor1`
    FOREIGN KEY (`Fornecedor_idFornecedor`)
    REFERENCES `mydb`.`Fornecedor` (`idFornecedor`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `mydb`.`Fornecedor_has_Produto` (
  `idTransação` INT(11) NOT NULL AUTO_INCREMENT,
  `Fornecedor_idFornecedor` INT(11) NULL DEFAULT NULL,
  `Produto_idProduto` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idTransação`),
  INDEX `fk_Fornecedor_has_Produto_Produto1_idx` (`Produto_idProduto` ASC) VISIBLE,
  INDEX `fk_Fornecedor_has_Produto_Fornecedor1_idx` (`Fornecedor_idFornecedor` ASC) VISIBLE,
  UNIQUE INDEX `idTransação_UNIQUE` (`idTransação` ASC) VISIBLE,
  CONSTRAINT `fk_Fornecedor_has_Produto_Fornecedor1`
    FOREIGN KEY (`Fornecedor_idFornecedor`)
    REFERENCES `mydb`.`Fornecedor` (`idFornecedor`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Fornecedor_has_Produto_Produto1`
    FOREIGN KEY (`Produto_idProduto`)
    REFERENCES `mydb`.`Produto` (`idProduto`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
