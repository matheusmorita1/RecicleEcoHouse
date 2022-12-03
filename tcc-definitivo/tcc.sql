-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 02-Nov-2022 às 22:10
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `coleta`
--

DROP TABLE IF EXISTS `coleta`;
CREATE TABLE IF NOT EXISTS `coleta` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_resid` mediumtext,
  `c_ender` varchar(60) DEFAULT NULL,
  `c_situ` varchar(40) DEFAULT 'Em anÃ¡lise',
  `c_datap` date DEFAULT '1111-11-11',
  `c_u_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`c_id`),
  KEY `c_u_id` (`c_u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `coleta`
--

INSERT INTO `coleta` (`c_id`, `c_resid`, `c_ender`, `c_situ`, `c_datap`, `c_u_id`) VALUES
(1, 'Uma canoa furada\nUma bola de tÃªnis\n6 plÃ¡sticos descartÃ¡veis', 'Eu sei lÃ¡, meu mano', 'Cancelado', '1111-11-11', 1),
(2, 'Uma canoa furada\nUma bola de tÃªnis\n6 plÃ¡sticos descartÃ¡veis', '6546321', 'Em anÃ¡lise', '1111-11-11', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_nome` varchar(60) NOT NULL,
  `u_cell` varchar(15) NOT NULL,
  `u_ender` varchar(60) NOT NULL,
  `u_senha` varchar(60) DEFAULT NULL,
  `u_adm` enum('S','N') DEFAULT 'N',
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`u_id`, `u_nome`, `u_cell`, `u_ender`, `u_senha`, `u_adm`) VALUES
(1, 'Matheus', '1699999999', '7 AlÃ©m', '123456', 'N'),
(2, 'O grande ADM', '1616161616', 'O monstro todo poderoso', '123456', 'S');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
