-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Mar-2022 às 05:26
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
  `CAPITAL` varchar(100) NOT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`id_cidade`, `CAPITAL`, `id_grupo`) VALUES
(1, 'AC - Rio Branco', 1),
(2, 'AL - Maceió', 2),
(3, 'AM - Manaus', 1),
(4, 'AP - Macapá', 1),
(5, 'BA - Salvador', 2),
(6, 'CE - Fortaleza', 2),
(7, 'DF - Brasília', 5),
(8, 'ES - Vitória', 4),
(9, 'GO - Goiânia', 5),
(10, 'MA - São Luís', 2),
(11, 'MG - Belo Horizonte', 4),
(12, 'MS - Campo Grande', 5),
(13, 'MT - Cuiabá', 5),
(14, 'PA - Belém', 1),
(15, 'PB - João Pessoa', 2),
(16, 'PE - Recife', 2),
(17, 'PI - Teresina', 2),
(18, 'PR - Curitiba', 3),
(19, 'RJ - Rio de Janeiro', 4),
(20, 'RN - Natal', 2),
(21, 'RO - Porto Velho', 1),
(22, 'RR - Boa Vista', 1),
(23, 'RS - Porto Alegre', 3),
(24, 'SC - Florianópolis', 3),
(25, 'SE - Aracaju', 2),
(26, 'SP - São Paulo', 4),
(27, 'TO - Palmas', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupocidade`
--

CREATE TABLE `grupocidade` (
  `id_grupoCidade` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_cidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos`
--

CREATE TABLE `grupos` (
  `id_grupo` int(11) NOT NULL,
  `grupo_nome` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `grupos`
--

INSERT INTO `grupos` (`id_grupo`, `grupo_nome`, `id_usuario`) VALUES
(1, 'NORTE', 1),
(2, 'NORDESTE', 1),
(3, 'SUL', 2),
(4, 'SUDESTE', 2),
(5, 'CENTRO OESTE', 2);

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
-- Índices para tabela `grupocidade`
--
ALTER TABLE `grupocidade`
  ADD PRIMARY KEY (`id_grupoCidade`);

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
-- AUTO_INCREMENT de tabela `grupocidade`
--
ALTER TABLE `grupocidade`
  MODIFY `id_grupoCidade` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
