-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 30-Maio-2016 às 17:25
-- Versão do servidor: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camiseta.com`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesa`
--

CREATE TABLE `despesa` (
  `id` int(11) NOT NULL,
  `despesa` varchar(20) NOT NULL,
  `tipo_desp` varchar(20) NOT NULL,
  `grupo_desp` varchar(20) NOT NULL,
  `custo_desp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrada_caixa`
--

CREATE TABLE `entrada_caixa` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `entrada_caixa`
--

INSERT INTO `entrada_caixa` (`id`, `recibo`, `data`, `hora`, `cliente`, `item`, `quantidade`, `unitario`, `desconto`, `total`) VALUES
(4, 'a', '2016-05-25', '21:04:20', 'a', 'a3', 5, '15.00', '5.00', '70.00'),
(5, 'b', '2016-05-25', '21:04:56', 'teste', 'a3', 3, '1.99', '0.97', '5.00'),
(6, '123', '2016-05-26', '10:16:18', 'Cleiton', 'a2', 5, '2.00', '0.00', '10.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque_e`
--

CREATE TABLE `estoque_e` (
  `id` int(11) NOT NULL,
  `material` varchar(20) NOT NULL,
  `quantidade` varchar(20) NOT NULL,
  `entrada` varchar(20) NOT NULL,
  `total` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estoque_e`
--

INSERT INTO `estoque_e` (`id`, `material`, `quantidade`, `entrada`, `total`) VALUES
(1, 'a4', '0', '5', '5'),
(2, 'a3', '10', '5', '15'),
(3, 'a2', '4', '8', '12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque_s`
--

CREATE TABLE `estoque_s` (
  `id` int(11) NOT NULL,
  `material` varchar(20) NOT NULL,
  `quantidade` varchar(20) NOT NULL,
  `saida` varchar(20) NOT NULL,
  `total` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estoque_s`
--

INSERT INTO `estoque_s` (`id`, `material`, `quantidade`, `saida`, `total`) VALUES
(2, 'a2', '50', '40', '10'),
(3, 'a2', '10', '5', '5'),
(4, 'a2', '5', '1', '4');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `material` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `grupo` varchar(50) NOT NULL,
  `custo` varchar(50) NOT NULL,
  `estoque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `material`
--

INSERT INTO `material` (`id`, `material`, `tipo`, `grupo`, `custo`, `estoque`) VALUES
(1, 'a2', 'a2', 'Entrada', 'Indireto', 12),
(2, 'a3', 'a3', 'Saida', 'Direto', 5),
(3, 'a4', 'a4', 'Saida', 'Direto', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `saida_caixa`
--

CREATE TABLE `saida_caixa` (
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Indexes for table `estoque_e`
--
ALTER TABLE `estoque_e`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estoque_s`
--
ALTER TABLE `estoque_s`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `estoque_e`
--
ALTER TABLE `estoque_e`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `estoque_s`
--
ALTER TABLE `estoque_s`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `saida_caixa`
--
ALTER TABLE `saida_caixa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
