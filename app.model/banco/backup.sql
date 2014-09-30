-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Set 28, 2014 as 02:13 AM
-- Versão do Servidor: 5.5.8
-- Versão do PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `bd_cat_pimentahot`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `catalogo_categoria`
--

DROP TABLE IF EXISTS `catalogo_categoria`;
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

DROP TABLE IF EXISTS `catalogo_produtos`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=98 ;

--
-- Extraindo dados da tabela `catalogo_produtos`
--

INSERT INTO `catalogo_produtos` (`codigo`, `nome`, `categoria`, `valor`, `link`, `ativo`) VALUES
(37, 'Anel com vibro', 1, 19.99, NULL, b'1'),
(38, 'Anel Duplo Retardante', 1, 15.4, NULL, b'1'),
(39, 'Anel Estimulador duplo', 1, 15.9, NULL, b'1'),
(40, 'Anel Peniano Mega Strech', 1, 4.9, NULL, b'1'),
(41, 'Anel Oriental P Estimulador', 1, 22.9, NULL, b'1'),
(42, 'Anel Oritental Estimulador Duplo - Cores Variadas', 1, 22.9, NULL, b'1'),
(43, 'Anel Peniano com VibraÃ§Ã£o', 1, 22.9, NULL, b'1'),
(44, 'Baralho Kama Sutra Gay', 2, 23.5, NULL, b'1'),
(45, 'Baralho Kama Sutra', 2, 23.7, NULL, b'1'),
(46, 'Dado PosiÃ§Ãµes Gay', 2, 9.9, NULL, b'1'),
(47, 'Dado PosiÃ§Ãµes HÃ©tero Preto', 2, 9.9, NULL, b'1'),
(48, 'Dado PosiÃ§Ãµes HÃ©tero Glow', 2, 99, NULL, b'1'),
(49, 'Dado PosiÃ§Ãµes LÃ©sbicas', 2, 9.9, NULL, b'1'),
(50, 'Dado do namoro', 2, 9.9, NULL, b'1'),
(51, 'Dado Qual Ã© a Balada?', 2, 9.9, NULL, b'1'),
(52, 'Dado Safadinha', 2, 9.9, NULL, b'1'),
(53, 'Tampa de Lata', 2, 7.95, NULL, b'1'),
(54, 'Calcinha com Ziper', 3, 14.99, NULL, b'1'),
(55, 'Tanga', 3, 14.99, NULL, b'1'),
(56, 'Tanga Babi', 3, 14.99, NULL, b'1'),
(57, 'Adesivo de Pele', 4, 22.9, NULL, b'1'),
(58, 'Bala Efevercente', 4, 4.5, NULL, b'1'),
(59, 'LÃ¢mina Mint Stripes - Canela', 4, 5.9, NULL, b'1'),
(60, 'Gel Adstringente Virgin', 5, 9.99, NULL, b'1'),
(61, 'Linha P de Poder - AnestÃ©sico Anal - 12g SF', 5, 19.99, NULL, b'1'),
(62, 'Batom Afrodisiaco', 5, 9.99, NULL, b'1'),
(63, 'Bolinha Smell com 1 unidade', 5, 5.9, NULL, b'1'),
(64, 'Caneta ComestÃ­vel', 5, 9.99, NULL, b'1'),
(65, 'Gel para Massagem BeijÃ¡vel - Fogo e Gelo', 5, 19.9, NULL, b'1'),
(66, 'Gel para Massagem dos Seios Espanhola - Menta', 5, 18.9, NULL, b'1'),
(67, 'Lubrificante Soft', 5, 12.5, NULL, b'1'),
(68, 'Perfume da BÃ´ta Feminino', 5, 9.99, NULL, b'1'),
(69, 'Perfume do Boto Masculina', 5, 9.9, NULL, b'1'),
(70, 'Pomada Japonesa Excitante', 5, 4.99, NULL, b'1'),
(71, 'Pomada VibratÃ³rio Max Shock 6g Love Sex', 5, 9.99, NULL, b'1'),
(72, 'Sabonete LÃ­quido Feminino 200ml Menta', 5, 14.9, NULL, b'1'),
(73, 'Sais de Banho Chillies 80g - Morango com Champanhe', 5, 19.9, NULL, b'1'),
(74, 'Gotas do Prazer Excitante Fogosa Fuck', 6, 14.9, NULL, b'1'),
(75, 'PÃ³ da Bruxinha', 6, 4.99, NULL, b'1'),
(76, 'TesÃ£o de Touro', 6, 14.99, NULL, b'1'),
(77, 'TesÃ£o de Vaca Fuck', 6, 14.99, NULL, b'1'),
(78, 'TesÃ£o de Vaca', 6, 14.99, NULL, b'1'),
(79, 'Algema Rendada Sexy', 7, 25.9, NULL, b'1'),
(80, 'Algemas', 7, 19.99, NULL, b'1'),
(81, 'Chicote Fino com Franja de OnÃ§a', 7, 14.5, NULL, b'1'),
(82, 'Chicote', 7, 42.5, NULL, b'1'),
(83, 'Kit Tiazinha', 7, 13.3, NULL, b'1'),
(84, 'Mini Fantasia Enfermeira Pimentinha', 7, 29.9, NULL, b'1'),
(85, 'Venda Tapa Olhos em PelÃºcia Rosa', 7, 14.5, NULL, b'1'),
(86, 'Capa Peniana com Vibro DragÃ£o', 8, 59.9, NULL, b'1'),
(87, 'Estimuldaor com Vibrador Interno', 8, 69.25, NULL, b'1'),
(88, 'Tenga Egg Spider (Original)', 8, 69.9, NULL, b'1'),
(89, 'Micro Vibrador Mini Vibe', 8, 59.9, NULL, b'1'),
(90, 'Vibrador em Formato de RÃ­mel', 8, 89.9, NULL, b'1'),
(91, 'Vibrador Bullet Ovinho', 8, 24.99, NULL, b'1'),
(92, 'Vibrador com Controle  em Jelly com Esferas', 8, 119.99, NULL, b'1'),
(93, 'Vibrador Xtreme Mini Wand', 8, 69.9, NULL, b'1'),
(94, 'Kit Dedeira - Camisinha para Dedo', 9, 5.99, NULL, b'1'),
(95, 'Masturbador Formato Vagina', 9, 49.99, NULL, b'1'),
(96, 'PrÃ³tese com Aromas', 9, 27.9, NULL, b'1'),
(97, 'Protese MaciÃ§a Hot Flowers', 9, 59.9, NULL, b'1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `catalogo_usuario`
--

DROP TABLE IF EXISTS `catalogo_usuario`;
CREATE TABLE IF NOT EXISTS `catalogo_usuario` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `administrador` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `codigo_UNIQUE` (`codigo`),
  UNIQUE KEY `usuario_UNIQUE` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `catalogo_usuario`
--

INSERT INTO `catalogo_usuario` (`codigo`, `nome`, `usuario`, `senha`, `administrador`) VALUES
(19, 'Suporte', 'SupCatPimHot', 'fc881266552b20900d07e2e57355a871', b'1');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `catalogo_produtos`
--
ALTER TABLE `catalogo_produtos`
  ADD CONSTRAINT `fk_produtos_categoria` FOREIGN KEY (`categoria`) REFERENCES `catalogo_categoria` (`codigo`) ON UPDATE CASCADE;
