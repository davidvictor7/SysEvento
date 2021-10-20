-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 07, 2020 at 01:48 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 5.6.40-15+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `syspalestra`
--

-- --------------------------------------------------------

--
-- Table structure for table `Atuacao`
--

CREATE TABLE `Atuacao` (
  `idAtuacao` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Atuacao`
--

INSERT INTO `Atuacao` (`idAtuacao`, `nome`) VALUES
(1, 'Palestrante'),
(2, 'Debatedor'),
(3, 'Presidente de Mesa'),
(4, 'Expositor'),
(5, 'Instrutor');

-- --------------------------------------------------------

--
-- Table structure for table `Evento`
--

CREATE TABLE `Evento` (
  `idEvento` int(11) NOT NULL,
  `nome` varchar(600) NOT NULL,
  `tema` varchar(600) DEFAULT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Evento`
--

INSERT INTO `Evento` (`idEvento`, `nome`, `tema`, `data`) VALUES
(2, 'Pingo de Prosa', 'Naruto Shippuden', '2002-08-05'),
(22, 'Oficina Extrajudicial', NULL, '2019-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `Palestrante`
--

CREATE TABLE `Palestrante` (
  `idPalestrante` int(10) NOT NULL,
  `nome` varchar(400) NOT NULL,
  `cargo` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Palestrante`
--

INSERT INTO `Palestrante` (`idPalestrante`, `nome`, `cargo`) VALUES
(2, 'Richardson	Carvalho', 'Assessor Técnico');

-- --------------------------------------------------------

--
-- Table structure for table `Palestrante_Atuacao_Evento`
--

CREATE TABLE `Palestrante_Atuacao_Evento` (
  `id` int(11) NOT NULL,
  `idPalestrante` int(11) NOT NULL,
  `idAtuacao` int(11) NOT NULL,
  `idEvento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Atuacao`
--
ALTER TABLE `Atuacao`
  ADD PRIMARY KEY (`idAtuacao`);

--
-- Indexes for table `Evento`
--
ALTER TABLE `Evento`
  ADD PRIMARY KEY (`idEvento`);

--
-- Indexes for table `Palestrante`
--
ALTER TABLE `Palestrante`
  ADD PRIMARY KEY (`idPalestrante`);

--
-- Indexes for table `Palestrante_Atuacao_Evento`
--
ALTER TABLE `Palestrante_Atuacao_Evento`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Atuacao`
--
ALTER TABLE `Atuacao`
  MODIFY `idAtuacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Evento`
--
ALTER TABLE `Evento`
  MODIFY `idEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `Palestrante`
--
ALTER TABLE `Palestrante`
  MODIFY `idPalestrante` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Palestrante_Atuacao_Evento`
--
ALTER TABLE `Palestrante_Atuacao_Evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
