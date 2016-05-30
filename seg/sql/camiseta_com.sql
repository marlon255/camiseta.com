-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 30-Maio-2016 às 00:55
-- Versão do servidor: 5.6.20-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `camiseta.com`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesa`
--

CREATE TABLE IF NOT EXISTS `despesa` (
`id` int(11) NOT NULL,
  `despesa` varchar(20) NOT NULL,
  `tipo_desp` varchar(20) NOT NULL,
  `grupo_desp` varchar(20) NOT NULL,
  `custo_desp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrada_caixa`
--

CREATE TABLE IF NOT EXISTS `entrada_caixa` (
`id` int(11) NOT NULL,
  `recibo` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `cliente` varchar(20) NOT NULL,
  `item` varchar(20) NOT NULL,
  `quantidade` int(5) NOT NULL,
  `unitario` varchar(10) NOT NULL,
  `desconto` varchar(10) NOT NULL,
  `total` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `entrada_caixa`
--

INSERT INTO `entrada_caixa` (`id`, `recibo`, `data`, `hora`, `cliente`, `item`, `quantidade`, `unitario`, `desconto`, `total`) VALUES
(4, 'a', '2016-05-25', '21:04:20', 'a', 'a3', 5, '15.00', '5.00', '70.00'),
(5, 'b', '2016-05-25', '21:04:56', 'teste', 'a3', 3, '1.99', '0.97', '5.00'),
(6, '123', '2016-05-26', '10:16:18', 'Cleiton', 'a2', 5, '2.00', '0.00', '10.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
`id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `funcao` varchar(30) NOT NULL,
  `nivel` varchar(30) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `endereco` text NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `nascimento` date NOT NULL,
  `cpf` varchar(30) NOT NULL,
  `rg` varchar(30) NOT NULL,
  `admissao` date NOT NULL,
  `demissao` date NOT NULL,
  `salario` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `material`
--

CREATE TABLE IF NOT EXISTS `material` (
`id` int(11) NOT NULL,
  `material` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `grupo` varchar(50) NOT NULL,
  `custo` varchar(50) NOT NULL,
  `estoque` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `material`
--

INSERT INTO `material` (`id`, `material`, `tipo`, `grupo`, `custo`, `estoque`) VALUES
(1, 'a2', 'a2', 'Entrada', 'Indireto', 0),
(2, 'a3', 'a3', 'Saida', 'Direto', 10),
(3, 'a4', 'a4', 'Entrada', 'Direto', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `saida_caixa`
--

CREATE TABLE IF NOT EXISTS `saida_caixa` (
`id` int(11) NOT NULL,
  `recibo` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `cliente` varchar(20) NOT NULL,
  `item` varchar(20) NOT NULL,
  `quantidade` int(3) NOT NULL,
  `unitario` varchar(20) NOT NULL,
  `desconto` varchar(20) NOT NULL,
  `total` varchar(20) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `saida_caixa`
--

INSERT INTO `saida_caixa` (`id`, `recibo`, `data`, `hora`, `cliente`, `item`, `quantidade`, `unitario`, `desconto`, `total`) VALUES
(2, '123', '2016-05-26', '14:06:23', '159', 'a3', 5, '2.84', '0.00', '14.20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `despesa`
--
ALTER TABLE `despesa`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entrada_caixa`
--
ALTER TABLE `entrada_caixa`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saida_caixa`
--
ALTER TABLE `saida_caixa`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `despesa`
--
ALTER TABLE `despesa`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `entrada_caixa`
--
ALTER TABLE `entrada_caixa`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `saida_caixa`
--
ALTER TABLE `saida_caixa`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
