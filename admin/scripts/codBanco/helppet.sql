-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/02/2022 às 14:18
-- Versão do servidor: 10.4.11-MariaDB
-- Versão do PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `helppet`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastroadocao`
--

CREATE TABLE `cadastroadocao` (
  `COD_INC` int(9) NOT NULL,
  `NOME` varchar(100) DEFAULT NULL,
  `DT_NASCIMENTO` date DEFAULT NULL,
  `CEP` varchar(100) DEFAULT NULL,
  `ENDERECO` varchar(100) DEFAULT NULL,
  `BAIRRO` varchar(100) DEFAULT NULL,
  `CIDADE` varchar(100) DEFAULT NULL,
  `CELULAR` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `PROFISSAO` varchar(100) DEFAULT NULL,
  `EMPRESA` varchar(100) DEFAULT NULL,
  `FILHOS` varchar(100) DEFAULT NULL,
  `QTD_PESSOAS` int(9) DEFAULT NULL,
  `CTT_PROXIMO` varchar(100) DEFAULT NULL,
  `NOME_ANIMAL` varchar(100) DEFAULT NULL,
  `COD_CACHORRO` int(9) DEFAULT NULL,
  `CIENTE` varchar(20) DEFAULT NULL,
  `FACEBOOK` varchar(100) DEFAULT NULL,
  `INSTAGRAM` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `cadastroadocao`
--

INSERT INTO `cadastroadocao` (`COD_INC`, `NOME`, `DT_NASCIMENTO`, `CEP`, `ENDERECO`, `BAIRRO`, `CIDADE`, `CELULAR`, `EMAIL`, `PROFISSAO`, `EMPRESA`, `FILHOS`, `QTD_PESSOAS`, `CTT_PROXIMO`, `NOME_ANIMAL`, `COD_CACHORRO`, `CIENTE`, `FACEBOOK`, `INSTAGRAM`) VALUES
(20, 'Joze luiz pires da mota', '1222-12-12', '62100000', 'rua alameda jr,  n°35', '121212', 'SOBRAL', '1212121212', 'teste@gmail.com', 'DFRDFRDRF', 'sobralnet', '2 filhos 4 anos 2anos', 12, 'oneid 989898 jose 99999999', 'tufao', 65, 'Sim', 'jose raimundo', 'jose raimundo'),
(22, 'Ricarlos Luigi Rodrigues Mesquita', '2003-08-20', '62111000', 'RUA DO LOGRADOURO, 33', 'ARACATIAÇU', 'Sobral', '88 981811985', 'ricarlosmesquita@gmail.com', 'programador', 'dom walfrido', '3, 2 anos, 4 anos, 12 anos', 5, 'maria, 88989889898 joana, 99898989898', 'tufão', 65, 'Sim', 'luigi mesquita', 'luigi mesquita'),
(26, 'Ricarlos Luigi Rodrigues Mesquita', '2003-08-20', '62111000', 'RUA DO LOGRADOURO, 33', 'ARACATIAÇU', 'Sobral', '88999876543', 'ricarlosmesquita@gmail.com', 'TRABALHADOR', 'SANTA CASA', '3', 5, '88981959257', 'fofura', 67, 'Sim', 'www.facebook.com', 'www.instagram.com'),
(27, 'Ricarlos Luigi Rodrigues Mesquita', '2003-08-20', '62111000', 'RUA DO LOGRADOURO, 33', 'ARACATIAÇU', 'Sobral', '88999876543', 'ricarlosmesquita@gmail.com', 'TRABALHADOR', 'SANTA CASA', '3', 5, '88981959257', 'fofura', 67, 'Sim', 'www.facebook.com', 'www.instagram.com'),
(28, 'Ricarlos Luigi Rodrigues Mesquita', '1222-12-20', '121212121', 'RUA DO LOGRADOURO, 33', 'ARACATIAÇU', 'Sobral', '88999876543', 'ricarlosmesquita@gmail.com', 'TRABALHADOR', 'SANTA CASA', '1', 12, '88981959257', 'rex pipoca', 68, 'Sim', 'www.facebook.com', 'www.instagram.com'),
(34, 'gabriel', '2222-09-20', '000000', 'rua do caracara', 'patos', 'manjericão', '909090', 'eusouhomem@gmail.com', 'TRABALHADOR', 'casa', '15', 23, 'wladao, 232323 / duduzao 909090', 'Expedito', 69, 'Sim', 'www.facebook.com', 'INSTAGRAM'),
(35, 'jordao', '2003-03-23', '62111000', 'RUA DO LOGRADOURO, 33', 'patos', 'Sobral', '88981811953', 'ricarlosmesquita@gmail.com', 'TRABALHADOR', 'SANTA CASA', '3', 6, '88981959257', 'Kratos', 72, 'Sim', 'www.facebook.com', 'www.instagram.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `login`
--

CREATE TABLE `login` (
  `ID_USUARIO` int(9) NOT NULL,
  `USUARIO` varchar(100) DEFAULT NULL,
  `SENHA` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `login`
--

INSERT INTO `login` (`ID_USUARIO`, `USUARIO`, `SENHA`) VALUES
(1, 'admin', 'admin123'),
(18, 'eu', 'eudenovo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbanimais`
--

CREATE TABLE `tbanimais` (
  `COD` int(9) NOT NULL,
  `NOME_ANIMAL` varchar(100) NOT NULL,
  `SEXO_ANIMAL` varchar(100) NOT NULL,
  `IDADE` varchar(100) DEFAULT NULL,
  `FOTO` varchar(100) DEFAULT NULL,
  `HISTORIA` varchar(254) NOT NULL,
  `SITUACAO` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbanimais`
--

INSERT INTO `tbanimais` (`COD`, `NOME_ANIMAL`, `SEXO_ANIMAL`, `IDADE`, `FOTO`, `HISTORIA`, `SITUACAO`) VALUES
(65, 'tufão', 'Macho', '3 anos', 'dog 1.jpg', 'ELE É MACHO', 'aguardando'),
(66, 'bolina', 'Femea', '4 anos', 'dog 2.jpg', 'ELE É MACHO', 'aguardando'),
(67, 'fofura', 'Macho', '2 meses', 'dog 4.jpg', 'ele é uma bola de pelo ambulante', 'aguardando'),
(68, 'rex pipoca', 'Macho', '25 anos', 'dog 3.jpg', 'ele não namora', 'aguardando'),
(69, 'Expedito', 'Macho', '37 ANOS', 'download.jpg', 'teste', 'aguardando'),
(70, 'Erick', 'Macho', '8 ANOS', 'dog 1.jpg', 'Erick foi encontrado desabrigado por nossa equipe no parque da cidade, chegou em nosso alojamento desnutrido e com muitas doenças, mas com nosso carinho e apoio, hoje ele é um cachorro saudável e muito brincalhão, Erick está disponível para a adoção, se ', 'aguardando'),
(72, 'Kratos', 'Femea', '350', 'primeira.jpg', 'ela veio da grecia para terra, seu nome é kratos, uma cadela super gentil', 'aguardando');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `cadastroadocao`
--
ALTER TABLE `cadastroadocao`
  ADD PRIMARY KEY (`COD_INC`),
  ADD KEY `COD_CACHORRO` (`COD_CACHORRO`);

--
-- Índices de tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID_USUARIO`);

--
-- Índices de tabela `tbanimais`
--
ALTER TABLE `tbanimais`
  ADD PRIMARY KEY (`COD`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `cadastroadocao`
--
ALTER TABLE `cadastroadocao`
  MODIFY `COD_INC` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `ID_USUARIO` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tbanimais`
--
ALTER TABLE `tbanimais`
  MODIFY `COD` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `cadastroadocao`
--
ALTER TABLE `cadastroadocao`
  ADD CONSTRAINT `cadastroadocao_ibfk_1` FOREIGN KEY (`COD_CACHORRO`) REFERENCES `tbanimais` (`COD`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
