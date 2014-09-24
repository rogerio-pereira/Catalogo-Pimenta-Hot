-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 24-Set-2014 às 12:39
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `bd_cat_pimentahot`
--
CREATE DATABASE IF NOT EXISTS `bd_cat_pimentahot` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bd_cat_pimentahot`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `catalogo_categoria`
--

CREATE TABLE IF NOT EXISTS `catalogo_categoria` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `codigo_UNIQUE` (`codigo`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `catalogo_categoria`
--

INSERT INTO `catalogo_categoria` (`codigo`, `nome`) VALUES
(1, 'AnÃ©is Penianos'),
(2, 'Brincadeiras ErÃ³ticas'),
(3, 'Calcinhas'),
(4, 'ComestÃ­veis'),
(5, 'CosmÃ©ticos'),
(6, 'Excitantes'),
(7, 'Fetiches'),
(8, 'Importados'),
(9, 'Masturbadores');

-- --------------------------------------------------------

--
-- Estrutura da tabela `catalogo_produtos`
--

CREATE TABLE IF NOT EXISTS `catalogo_produtos` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `categoria` bigint(20) unsigned NOT NULL,
  `valor` double NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `ativo` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `codigo_UNIQUE` (`codigo`),
  KEY `fk_produtos_categoria_idx` (`categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `catalogo_usuario`
--

CREATE TABLE IF NOT EXISTS `catalogo_usuario` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `administrador` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `codigo_UNIQUE` (`codigo`),
  UNIQUE KEY `usuario_UNIQUE` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `catalogo_usuario`
--

INSERT INTO `catalogo_usuario` (`codigo`, `nome`, `usuario`, `senha`, `administrador`) VALUES
(1, 'Suporte', 'SupCatPimentaHo', 'c2a6fad017476bdb1f59b1d64b800639', b'1');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `catalogo_produtos`
--
ALTER TABLE `catalogo_produtos`
  ADD CONSTRAINT `fk_produtos_categoria` FOREIGN KEY (`categoria`) REFERENCES `catalogo_categoria` (`codigo`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
