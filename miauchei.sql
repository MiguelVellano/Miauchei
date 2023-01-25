-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Dez-2022 às 22:03
-- Versão do servidor: 8.0.21
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `miauchei`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id` int NOT NULL,
  `email_admin` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `senha_admin` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `username_admin` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `data_nascimento_admin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id`, `email_admin`, `senha_admin`, `username_admin`, `data_nascimento_admin`) VALUES
(1, 'lukinhas030905@gmail.com', '202cb962ac59075b964b07152d234b70', 'Lucas', '2005-09-03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `cod_cargo` int NOT NULL,
  `nome_cargo` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `bairro` varchar(255) DEFAULT NULL,
  `numero` int DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `cod` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `cod_funcionario` int NOT NULL,
  `nome_funcionario` varchar(255) DEFAULT NULL,
  `cod_telefone` int DEFAULT NULL,
  `cod_endereco` int DEFAULT NULL,
  `rg_funcionario` int DEFAULT NULL,
  `cod_cargo` int DEFAULT NULL,
  `sobrenome_funcionario` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `guards`
--

CREATE TABLE `guards` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `guards`
--

INSERT INTO `guards` (`id`, `user_id`, `post_id`) VALUES
(65, 22, 21),
(69, 22, 73),
(76, 23, 78),
(77, 24, 78),
(79, 24, 76),
(80, 24, 73),
(81, 24, 21),
(83, 24, 0),
(87, 29, 81),
(88, 36, 76),
(89, 36, 83),
(90, 36, 28),
(91, 36, 25),
(92, 36, 29),
(93, 35, 88),
(94, 35, 83),
(95, 35, 30),
(96, 35, 29),
(97, 29, 73),
(98, 29, 33),
(99, 29, 72),
(100, 29, 34);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts_animais_adocao`
--

CREATE TABLE `posts_animais_adocao` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `guards` int NOT NULL,
  `image` text COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nome_pet` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `raca` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `sexo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `idade_pet` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `profile_image` text COLLATE utf8mb4_general_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bairro` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `posts_animais_adocao`
--

INSERT INTO `posts_animais_adocao` (`id`, `user_id`, `guards`, `image`, `date`, `username`, `nome_pet`, `raca`, `sexo`, `idade_pet`, `profile_image`, `descricao`, `bairro`) VALUES
(33, 29, 1, '1670791904.jpeg', '2022-12-11 21:51:44', 'caio5', 'aaa', 'Pastor Alemão', 'Fêmea', '11', '', 'aaa', ''),
(34, 29, 1, '1670792295.jpeg', '2022-12-11 21:58:15', 'caio5', 'aa', 'Persa', 'Fêmea', '11', '', 'aaa', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts_animais_perdidos`
--

CREATE TABLE `posts_animais_perdidos` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `guards` int NOT NULL,
  `image` text COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `profile_image` text COLLATE utf8mb4_general_ci NOT NULL,
  `nome_pet` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `raca` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sexo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `idade_pet` int NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `data_que_perdeu` date DEFAULT NULL,
  `bairro` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `posts_animais_perdidos`
--

INSERT INTO `posts_animais_perdidos` (`id`, `user_id`, `guards`, `image`, `date`, `username`, `profile_image`, `nome_pet`, `raca`, `sexo`, `idade_pet`, `descricao`, `data_que_perdeu`, `bairro`) VALUES
(73, 13, 3, '1669626524.jpeg', '2022-11-28 09:08:44', 'aaa', '', 'Mia', 'Persa', 'Macho', 6, 'Ela é brincalhona e possui uma marquinha de nascença na testa', '2022-11-11', ''),
(72, 13, 1, '1669626453.jpeg', '2022-11-28 09:07:33', 'aaa', '', 'Miaw', 'Persa', 'Macho', 7, 'Ele é um pouco agressivo com estranhos', '2022-11-09', ''),
(71, 13, 0, '1669626376.jpeg', '2022-11-28 09:06:16', 'aaa', '', 'Dino', 'Pitbull', 'Macho', 2, 'Perto da Feira de SP', '2022-11-08', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `cod_usuario` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `senha` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `administrator` tinyint(1) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `posts` int NOT NULL,
  `bio` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_general_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cod_usuario`, `email`, `senha`, `administrator`, `username`, `posts`, `bio`, `data_nascimento`, `telefone`, `image`) VALUES
(12, 'lukinhas030905@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', NULL, 'Lucas', 0, 'aaaaaaa               ', '2022-11-10', '(11)94181-9037', NULL),
(13, 'aaa@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, 'aaa', -2, NULL, '2022-10-31', '(11)94181-9037', NULL),
(14, 'aaaa@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, 'aaaa', 0, NULL, '2005-09-03', '(11)94181-9037', NULL),
(15, 'lukinhas@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', NULL, 'Lucasaaaaa', 0, NULL, '2022-11-10', '(11)94181-9037', NULL),
(16, 'lukinhassss@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, 'Lucx_55555', 0, NULL, '2022-11-01', '(11)94181-9037', NULL),
(17, 'gustavo@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, 'Gustavo', 0, '                    ', '2022-10-31', '(11)94181-9037', 'Gustavo.jpeg'),
(25, 'lukinhas0309055@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, 'lukinhas0309055', 0, NULL, '2022-12-03', '(11)94181-9037', NULL),
(26, 'caio2@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 'caio2', 0, NULL, '2003-04-03', '(11) 94181-9037', NULL),
(24, 'caio@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, 'caio', 0, 'www                                                                                                                                         ', '2005-03-07', '(11) 94181-9038', 'caio.jpeg'),
(27, 'caio3@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, 'caio3', 0, NULL, '2005-11-22', '(11) 94181-9037', NULL),
(28, 'caio4@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, 'caio4', 0, NULL, '2002-02-02', '(11) 94181-9037', 'user.jpeg'),
(29, 'caio5@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, 'caio5', 4, 'kkkkk', '2003-01-03', '(11) 94181-9038', 'caio5.jpeg'),
(30, 'caio6@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, 'caio6', 0, NULL, '2022-12-03', '(11) 94181-9037', 'user.jpeg'),
(33, 'lucasalves@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, 'lucasalves', 0, NULL, '2005-09-03', '(11) 94181-9037', 'user.jpeg'),
(34, 'lucasalvess@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, 'lucasalvess', 0, NULL, '2005-09-03', '(11) 94181-9037', 'user.jpeg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`cod_cargo`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`cod_funcionario`),
  ADD KEY `FK_funcionario_telefone` (`cod_telefone`),
  ADD KEY `FK_funcionario_endereco` (`cod_endereco`),
  ADD KEY `FK_funcionario_cargo` (`cod_cargo`);

--
-- Índices para tabela `guards`
--
ALTER TABLE `guards`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `posts_animais_adocao`
--
ALTER TABLE `posts_animais_adocao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `posts_animais_perdidos`
--
ALTER TABLE `posts_animais_perdidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `cod` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `guards`
--
ALTER TABLE `guards`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de tabela `posts_animais_adocao`
--
ALTER TABLE `posts_animais_adocao`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `posts_animais_perdidos`
--
ALTER TABLE `posts_animais_perdidos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
