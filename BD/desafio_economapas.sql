-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Mar-2022 às 00:50
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `desafio_economapas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE `cidades` (
  `id_cidade` int(11) NOT NULL,
  `cidade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`id_cidade`, `cidade`) VALUES
(1, 'AC - Rio Branco'),
(2, 'AL - Maceió'),
(3, 'AM - Manaus'),
(4, 'AP - Macapá'),
(5, 'BA - Salvador'),
(6, 'CE - Fortaleza'),
(7, 'DF - Brasília'),
(8, 'ES - Vitória'),
(9, 'GO - Goiânia'),
(10, 'MA - São Luís'),
(11, 'MG - Belo Horizonte'),
(12, 'MS - Campo Grande'),
(13, 'MT - Cuiabá'),
(14, 'PA - Belém'),
(15, 'PB - João Pessoa'),
(16, 'PE - Recife'),
(17, 'PI - Teresina'),
(18, 'PR - Curitiba'),
(19, 'RJ - Rio de Janeiro'),
(20, 'RN - Natal'),
(21, 'RO - Porto Velho'),
(22, 'RR - Boa Vista'),
(23, 'RS - Porto Alegre'),
(24, 'SC - Florianópolis'),
(25, 'SE - Aracaju'),
(26, 'SP - São Paulo'),
(27, 'TO - Palmas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos`
--

CREATE TABLE `grupos` (
  `id_grupo` int(11) NOT NULL,
  `grupo_nome` varchar(100) NOT NULL,
  `id_cidade` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `grupos`
--

INSERT INTO `grupos` (`id_grupo`, `grupo_nome`, `id_cidade`, `id_usuario`) VALUES
(1, 'GRUPO1', '2,3', 1),
(2, 'GRUPO2', '1,5,7', 1),
(3, 'GRUPO3', '26,24,11,1', 2),
(4, 'GRUPO4', '6', 2),
(5, 'GRUPO5', '5', 2),
(30, 'GRUPO6', '16,20', 2),
(31, 'GRUPO7', '14,16,14,17', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `email`, `senha`) VALUES
(1, 'joao', 'joao@gmail.com', '1234'),
(2, 'maria', 'maria@gmail.com', '5678');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`id_cidade`);

--
-- Índices para tabela `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cidades`
--
ALTER TABLE `cidades`
  MODIFY `id_cidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
