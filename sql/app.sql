-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13-Maio-2017 às 01:43
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `cat_nome` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`cat_nome`) VALUES
('Java'),
('PHP'),
('Banco de Dados');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `cur_id` int(9) NOT NULL,
  `cur_nome` varchar(255) CHARACTER SET latin1 NOT NULL,
  `cur_categoria` varchar(255) CHARACTER SET latin1 NOT NULL,
  `cur_privacidade` varchar(255) CHARACTER SET latin1 NOT NULL,
  `cur_email_criador` varchar(255) CHARACTER SET latin1 NOT NULL,
  `cur_descricao` text CHARACTER SET latin1 NOT NULL,
  `cur_preco` varchar(255) CHARACTER SET latin1 NOT NULL,
  `cur_duracao` varchar(255) CHARACTER SET latin1 NOT NULL,
  `cur_nivel` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`cur_id`, `cur_nome`, `cur_categoria`, `cur_privacidade`, `cur_email_criador`, `cur_descricao`, `cur_preco`, `cur_duracao`, `cur_nivel`) VALUES
(5, 'Curso Java 2', 'Java', 'Publico', 'lucas@email.com', 'Curso AvanÃ§ado de Java', '500', '30', 'Avancado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `niveis`
--

CREATE TABLE `niveis` (
  `niv_nome` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `niveis`
--

INSERT INTO `niveis` (`niv_nome`) VALUES
('Básico'),
('Intermediário'),
('Avançado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `privacidades`
--

CREATE TABLE `privacidades` (
  `pri_nome` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `privacidades`
--

INSERT INTO `privacidades` (`pri_nome`) VALUES
('Público'),
('Privado');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`cur_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `cur_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
