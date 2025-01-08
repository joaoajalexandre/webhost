-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Jan-2025 às 02:40
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbwebhost`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bi` varchar(100) NOT NULL,
  `nome_empresa` varchar(100) NOT NULL,
  `nif_empresa` varchar(100) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `arquivo_bi_nif` varchar(100) NOT NULL,
  `passe` varchar(100) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`id_cliente`, `nome`, `sobrenome`, `email`, `bi`, `nome_empresa`, `nif_empresa`, `provincia`, `municipio`, `endereco`, `arquivo_bi_nif`, `passe`, `data`) VALUES
(12, 'Marcelino', 'Lufendo', 'l@gmail.com', '34324r23r', 'BHM', '57675765', 'Luanda', 'Viana', 'yhyjyhjyhj', 'aperfeioamento-em-farmacologia-apostila02.pdf', 'e10adc3949ba59abbe56e057f20f883e', '2025-01-07 23:46:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_compra`
--

CREATE TABLE `tb_compra` (
  `id_compra` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `total_compra` int(11) NOT NULL,
  `metodo_pagamento` varchar(100) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_dominio`
--

CREATE TABLE `tb_dominio` (
  `id_dominio` int(11) NOT NULL,
  `dominio` varchar(50) NOT NULL,
  `preco` int(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_dominio_comprado`
--

CREATE TABLE `tb_dominio_comprado` (
  `id_dominio_comprado` int(11) NOT NULL,
  `dominio` varchar(255) NOT NULL,
  `nameserver1` varchar(255) NOT NULL,
  `nameserver2` varchar(255) NOT NULL,
  `nameserver3` varchar(255) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `bilhete_nif` varchar(255) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_mensagens`
--

CREATE TABLE `tb_mensagens` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `motivo` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mensagem` text NOT NULL,
  `data_envio` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_mensagens`
--

INSERT INTO `tb_mensagens` (`id`, `id_cliente`, `motivo`, `email`, `mensagem`, `data_envio`) VALUES
(1, 12, 'suporte', 'LUFENDOMARCELINO@GMAIL.COM', 'uytiyuik6yuik', '2025-01-07 23:25:57');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `tb_compra`
--
ALTER TABLE `tb_compra`
  ADD PRIMARY KEY (`id_compra`);

--
-- Índices para tabela `tb_dominio`
--
ALTER TABLE `tb_dominio`
  ADD PRIMARY KEY (`id_dominio`);

--
-- Índices para tabela `tb_dominio_comprado`
--
ALTER TABLE `tb_dominio_comprado`
  ADD PRIMARY KEY (`id_dominio_comprado`);

--
-- Índices para tabela `tb_mensagens`
--
ALTER TABLE `tb_mensagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tb_compra`
--
ALTER TABLE `tb_compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_dominio`
--
ALTER TABLE `tb_dominio`
  MODIFY `id_dominio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_dominio_comprado`
--
ALTER TABLE `tb_dominio_comprado`
  MODIFY `id_dominio_comprado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `tb_mensagens`
--
ALTER TABLE `tb_mensagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_mensagens`
--
ALTER TABLE `tb_mensagens`
  ADD CONSTRAINT `tb_mensagens_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
