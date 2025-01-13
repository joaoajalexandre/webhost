-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Jan-2025 às 00:43
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.0.30

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
-- Estrutura da tabela `planos_hospedagem`
--

CREATE TABLE `planos_hospedagem` (
  `id` int(11) NOT NULL,
  `nome_plano` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `preco_mensal` decimal(10,2) NOT NULL,
  `preco_anual` decimal(10,2) DEFAULT NULL,
  `recursos` text DEFAULT NULL,
  `status` enum('ativo','inativo') DEFAULT 'ativo',
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_atualizacao` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos_email`
--

CREATE TABLE `servicos_email` (
  `id` int(11) NOT NULL,
  `nome_servico` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `limite_contas_email` int(11) DEFAULT NULL,
  `preco_mensal` decimal(10,2) NOT NULL,
  `preco_anual` decimal(10,2) DEFAULT NULL,
  `status` enum('ativo','inativo') DEFAULT 'ativo',
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_atualizacao` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(255) NOT NULL,
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

INSERT INTO `tb_cliente` (`id_cliente`, `nome`, `sobrenome`, `email`, `telefone`, `bi`, `nome_empresa`, `nif_empresa`, `provincia`, `municipio`, `endereco`, `arquivo_bi_nif`, `passe`, `data`) VALUES
(12, 'Marcelino', 'Lufendo', 'l@gmail.com', '', '34324r23r', 'BHM', '57675765', 'Luanda', 'Viana', 'yhyjyhjyhj', 'aperfeioamento-em-farmacologia-apostila02.pdf', '1234', '2025-01-07 23:46:27'),
(13, 'João', 'António Alexandre', 'joaod.francisco24@gmail.com', '946538429', '002323232LA44', 'Itecma', '9822323LA98', 'Luanda', 'Cacuaco', 'Belo monte / quem passa a cantina do moreno', '472546885_1131968041835846_4287374881925982863_n.jpg', 'hshhsshsh', '2025-01-08 10:22:39'),
(14, 'Osvaldo', 'da Costa', 'osvaldocosta@gmail.com', '', '8238237324LA044', 'Empresa Angola LDA', '021291721LA982', 'Luanda', 'Cazenga', 'Luanda/Calemba 2 Bairro Limpo', 'ce5699233cbc0f142250b520d967dff7.png', 'hshhsshsh', '2025-01-09 20:21:35'),
(15, 'joao', 'Alexandre', 'joao@gmail.com', '946538429', '8832732LA033', 'Itecma', '9822323LA98', 'Luanda', 'Cacuaco', 'Belo monte / quem passa a cantina do moreno', 'user-profile-icon-in-flat-style-member-avatar-illustration-on-isolated-background-human-permission-s', '2409', '2025-01-10 08:43:23'),
(16, 'Aurelio', 'Madureira', 'aurelio@itecma.co.ao', '953647174', '733743LA96', 'Itecma', '34343434XF', 'Luanda', 'Cacuaco', 'Eco-campo', 'DC-82-s-Po-TPO.pdf', '2025', '2025-01-10 10:38:57');

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
  `estado_compra` varchar(255) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_compra`
--

INSERT INTO `tb_compra` (`id_compra`, `id_cliente`, `quantidade`, `total_compra`, `metodo_pagamento`, `estado_compra`, `data`) VALUES
(1, 15, 2, 30000, 'Transferência Bancaria', '', '2025-01-10 11:20:35'),
(2, 15, 1, 5000, 'Transferência Bancaria', '', '2025-01-10 11:20:35');

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
  `estado_dominio` varchar(255) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_dominio_comprado`
--

INSERT INTO `tb_dominio_comprado` (`id_dominio_comprado`, `dominio`, `nameserver1`, `nameserver2`, `nameserver3`, `id_cliente`, `bilhete_nif`, `estado_dominio`, `data`) VALUES
(28, 'lojaalex.it.ao', 'dns1.angoweb.ao', 'dns2.angoweb.ao', 'dns3.angoweb.ao', 15, '24092000LA044', 'Inativo', '2025-01-10 12:35:30'),
(29, 'angola.ao', 'dns1.angoweb.ao', 'dns2.angoweb.ao', 'dns3.angoweb.ao', 15, '24092000LA044', 'Ativo', '2025-01-10 12:35:30'),
(30, 'mango.ao', 'ns1.itecma.co.ao', 'ns2.itecma.co.ao', 'ns3.itecma.co.ao', 1, '', '', '2025-01-10 16:14:04'),
(31, 'alexandre.ao', 'ns1.itecma.co.ao', 'ns2.itecma.co.ao', 'ns3.itecma.co.ao', 1, '', '', '2025-01-10 16:40:44'),
(32, 'alex.co.ao', 'ns1.itecma.co.ao', 'ns2.itecma.co.ao', 'ns3.itecma.co.ao', 1, '', '', '2025-01-10 16:42:05'),
(33, 'alexandre.co.ao', 'ns1.itecma.co.ao', 'ns2.itecma.co.ao', 'ns3.itecma.co.ao', 1, '', '', '2025-01-10 16:45:43'),
(34, 'alexandre.co.ao', 'ns1.itecma.co.ao', 'ns2.itecma.co.ao', 'ns3.itecma.co.ao', 1, '', '', '2025-01-10 16:46:49');

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
(1, 12, 'suporte', 'LUFENDOMARCELINO@GMAIL.COM', 'uytiyuik6yuik', '2025-01-07 23:25:57'),
(2, 13, 'vendas', NULL, 'Boa tarde gostaria de saber se posso pagar em euro ?', '2025-01-08 09:24:48');

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
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tb_compra`
--
ALTER TABLE `tb_compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_dominio`
--
ALTER TABLE `tb_dominio`
  MODIFY `id_dominio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_dominio_comprado`
--
ALTER TABLE `tb_dominio_comprado`
  MODIFY `id_dominio_comprado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `tb_mensagens`
--
ALTER TABLE `tb_mensagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
