-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Set-2022 às 20:39
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_scilink`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `area_atuacao`
--

CREATE TABLE `area_atuacao` (
  `nom_area_atuacao` varchar(25) NOT NULL,
  `id_area_atuacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `area_atuacao_cientista`
--

CREATE TABLE `area_atuacao_cientista` (
  `fk_id_cientista` int(11) DEFAULT NULL,
  `fk_id_area_atuacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cientista`
--

CREATE TABLE `cientista` (
  `id_cientista` int(11) NOT NULL,
  `nom_cientista` varchar(50) NOT NULL,
  `cpf_cientista` varchar(11) NOT NULL,
  `dtn_cientista` date DEFAULT NULL,
  `email_cientista` varchar(50) NOT NULL,
  `email_alternativo_cientista` varchar(50) DEFAULT NULL,
  `lattes_cientista` varchar(50) NOT NULL,
  `snh_cientista` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `formacao`
--

CREATE TABLE `formacao` (
  `dti_formacao` date DEFAULT NULL,
  `dtt_formacao` date DEFAULT NULL,
  `fk_id_titulacao` int(11) DEFAULT NULL,
  `fk_id_cientista` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE `projeto` (
  `id_projeto` int(11) NOT NULL,
  `tit_projeto` varchar(50) DEFAULT NULL,
  `res_projeto` varchar(250) DEFAULT NULL,
  `dti_projeto` date DEFAULT NULL,
  `dtt_projeto` date DEFAULT NULL,
  `pub_projeto` tinyint(1) NOT NULL,
  `fk_id_cientista` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rede_sociais`
--

CREATE TABLE `rede_sociais` (
  `id_rede_social` int(11) NOT NULL,
  `end_rede_social` varchar(50) DEFAULT NULL,
  `tip_rede_social` char(1) DEFAULT NULL,
  `fk_id_cientista` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

CREATE TABLE `telefone` (
  `ddd_telefone` int(2) DEFAULT NULL,
  `num_telefone` varchar(10) DEFAULT NULL,
  `fk_id_cientista` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `titulacao`
--

CREATE TABLE `titulacao` (
  `id_titulacao` int(11) NOT NULL,
  `nom_titulacao` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `area_atuacao`
--
ALTER TABLE `area_atuacao`
  ADD PRIMARY KEY (`id_area_atuacao`);

--
-- Índices para tabela `area_atuacao_cientista`
--
ALTER TABLE `area_atuacao_cientista`
  ADD KEY `fk_id_cientista` (`fk_id_cientista`),
  ADD KEY `fk_id_area_atuacao` (`fk_id_area_atuacao`);

--
-- Índices para tabela `cientista`
--
ALTER TABLE `cientista`
  ADD PRIMARY KEY (`id_cientista`);

--
-- Índices para tabela `formacao`
--
ALTER TABLE `formacao`
  ADD KEY `fk_id_cientista` (`fk_id_cientista`),
  ADD KEY `fk_id_titulacao` (`fk_id_titulacao`);

--
-- Índices para tabela `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`id_projeto`),
  ADD KEY `fk_id_cientista` (`fk_id_cientista`);

--
-- Índices para tabela `rede_sociais`
--
ALTER TABLE `rede_sociais`
  ADD PRIMARY KEY (`id_rede_social`),
  ADD KEY `fk_id_cientista` (`fk_id_cientista`);

--
-- Índices para tabela `telefone`
--
ALTER TABLE `telefone`
  ADD KEY `fk_id_cientista` (`fk_id_cientista`);

--
-- Índices para tabela `titulacao`
--
ALTER TABLE `titulacao`
  ADD PRIMARY KEY (`id_titulacao`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `area_atuacao`
--
ALTER TABLE `area_atuacao`
  MODIFY `id_area_atuacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cientista`
--
ALTER TABLE `cientista`
  MODIFY `id_cientista` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `projeto`
--
ALTER TABLE `projeto`
  MODIFY `id_projeto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `rede_sociais`
--
ALTER TABLE `rede_sociais`
  MODIFY `id_rede_social` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `titulacao`
--
ALTER TABLE `titulacao`
  MODIFY `id_titulacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `area_atuacao_cientista`
--
ALTER TABLE `area_atuacao_cientista`
  ADD CONSTRAINT `area_atuacao_cientista_ibfk_1` FOREIGN KEY (`fk_id_cientista`) REFERENCES `cientista` (`id_cientista`),
  ADD CONSTRAINT `area_atuacao_cientista_ibfk_2` FOREIGN KEY (`fk_id_area_atuacao`) REFERENCES `area_atuacao` (`id_area_atuacao`);

--
-- Limitadores para a tabela `formacao`
--
ALTER TABLE `formacao`
  ADD CONSTRAINT `formacao_ibfk_1` FOREIGN KEY (`fk_id_cientista`) REFERENCES `cientista` (`id_cientista`),
  ADD CONSTRAINT `formacao_ibfk_2` FOREIGN KEY (`fk_id_titulacao`) REFERENCES `titulacao` (`id_titulacao`);

--
-- Limitadores para a tabela `projeto`
--
ALTER TABLE `projeto`
  ADD CONSTRAINT `projeto_ibfk_1` FOREIGN KEY (`fk_id_cientista`) REFERENCES `cientista` (`id_cientista`);

--
-- Limitadores para a tabela `rede_sociais`
--
ALTER TABLE `rede_sociais`
  ADD CONSTRAINT `rede_sociais_ibfk_1` FOREIGN KEY (`fk_id_cientista`) REFERENCES `cientista` (`id_cientista`);

--
-- Limitadores para a tabela `telefone`
--
ALTER TABLE `telefone`
  ADD CONSTRAINT `telefone_ibfk_1` FOREIGN KEY (`fk_id_cientista`) REFERENCES `cientista` (`id_cientista`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
