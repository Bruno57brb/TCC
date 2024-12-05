-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 18/11/2024 às 00:38
-- Versão do servidor: 8.3.0
-- Versão do PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `assistencia`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos`
--

DROP TABLE IF EXISTS `alunos`;
CREATE TABLE IF NOT EXISTS `alunos` (
  `cpf` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `matricula` int NOT NULL,
  `turma` varchar(255) NOT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `registros`
--

DROP TABLE IF EXISTS `registros`;
CREATE TABLE IF NOT EXISTS `registros` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `matricula` varchar(50) NOT NULL,
  `turma` varchar(100) DEFAULT NULL,
  `motivo` text,
  `tipo` enum('entrada','saida') NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `registros`
--

INSERT INTO `registros` (`id`, `nome`, `matricula`, `turma`, `motivo`, `tipo`, `data`, `horario`) VALUES
(1, '22', '22w', '22', '22', 'entrada', '2024-11-06', '20:27:21'),
(2, '32', '2', '3321', '13213', 'entrada', '0021-03-23', '03:13:00'),
(3, '213', '321', '2132132', '3213213', 'entrada', '2132-03-31', '13:21:00'),
(4, 'w22132', '21', '2131', '323123211', 'entrada', '1321-12-31', '03:01:00'),
(5, '2122', '2312313', '321', '213213', 'saida', '0002-02-02', '21:03:00'),
(6, '11', '12', '2221', '2121', 'entrada', '0121-02-21', '21:01:00'),
(7, '21', '2321', '32132', '21323213', 'saida', '0000-00-00', '03:21:00'),
(8, '3e2', '321321', '21321321', '21', 'entrada', '0213-03-31', '21:03:00'),
(9, 'entrada', 'entrada', 'entrada', 'entrada', 'entrada', '0003-02-13', '21:12:00'),
(10, 'saida', 'saida\r\n', 'saida', 'saida', 'saida', '1321-02-23', '03:21:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `Perfil` int NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `SIAPE` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`SIAPE`),
  UNIQUE KEY `SIAPE` (`SIAPE`)
) ENGINE=InnoDB AUTO_INCREMENT=6666 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`nome`, `senha`, `Perfil`, `imagem`, `SIAPE`) VALUES
('Coordenação', '111', 1, '', 111),
('Nutricionista', '222', 2, '', 222),
('Psicologa', '333', 3, '', 333),
('bruno', '444', 4, '', 444),
('Medico', '555', 5, '', 555);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
