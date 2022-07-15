-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13-Jul-2022 às 12:31
-- Versão do servidor: 5.6.15-log
-- PHP Version: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `id18553025_flashservice`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(50) NOT NULL,
  `start` timestamp(1) NOT NULL DEFAULT CURRENT_TIMESTAMP(1) ON UPDATE CURRENT_TIMESTAMP(1),
  `end` timestamp(1) NOT NULL DEFAULT '0000-00-00 00:00:00.0',
  `usuario_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`id`, `title`, `description`, `color`, `start`, `end`, `usuario_id`) VALUES
(1, 'Evento', 'Evento marcado por Rayane Santos', 'blue', '2022-07-06 14:00:00.0', '2022-07-06 14:40:00.0', 15),
(2, 'Evento', 'Evento marcado por Julio', 'blue', '2022-07-13 01:00:00.0', '2022-07-13 01:40:00.0', 6),
(4, 'Evento', 'Evento marcado por FlashServices', 'blue', '2022-07-06 10:00:00.0', '2022-07-06 10:40:00.0', 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `profissional`
--

CREATE TABLE IF NOT EXISTS `profissional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `servico_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Extraindo dados da tabela `profissional`
--

INSERT INTO `profissional` (`id`, `usuario_id`, `servico_id`) VALUES
(1, 1, 4),
(2, 6, 20),
(3, 7, 40),
(4, 3, 37),
(5, 8, 18),
(11, 2, 24),
(12, 7, 33),
(18, 0, 0),
(19, 0, 0),
(20, 0, 0),
(21, 0, 0),
(22, 1, 2),
(23, 2, 42),
(24, 1, 11),
(25, 1, 26),
(26, 1, 38);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE IF NOT EXISTS `servico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servico` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=49 ;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id`, `servico`) VALUES
(1, 'Animador de Festas'),
(2, 'Assistencia Tecnica de Celular'),
(3, 'Assistencia Tecnica de Computador'),
(4, 'Assistencia Tecnica de Fogao'),
(5, 'Assistencia Tecnica de Geladeira'),
(6, 'Assistencia Tecnica de Informatica'),
(7, 'Assistencia de Maquina de Lavar '),
(8, 'Assistencia Tecnica de Notebook '),
(9, 'Assistencia Tecnica de Refrigeracao '),
(10, 'Assistencia Tecnica de TV '),
(11, 'Baba'),
(12, 'Barman '),
(13, 'Cabeleireira '),
(14, 'Cantor '),
(15, 'Carro de Som '),
(16, 'Churrasqueiro '),
(17, 'Colocador de pisos'),
(18, 'Costureira '),
(19, 'Cozinheiro'),
(20, 'Cuidador(a) de idosos '),
(21, 'Desentupidor '),
(22, 'Desenvolvedor de Sites '),
(23, 'Diarista'),
(24, 'Eletricista '),
(25, 'Encanador '),
(26, 'Esteticista '),
(27, 'Estofador '),
(28, 'Faxineira'),
(29, 'Fotografo '),
(30, 'Garcom '),
(31, 'Gesseiro '),
(32, 'Impermeabilizacao '),
(33, 'Instalador de Papel de parede '),
(34, 'Jardineiro '),
(35, 'Limpeza pos obras '),
(36, 'Manutencao de portao eletronico'),
(37, 'Marceneiro '),
(38, 'Montador de moveis '),
(39, 'Passadeira '),
(40, 'Pedreiro'),
(41, 'Perfuracao de poco '),
(42, 'Pintor '),
(43, 'Piscineiro '),
(44, 'Professor particular'),
(45, 'Psicologo '),
(46, 'Serralheiro '),
(47, 'Tapeceiro '),
(48, 'Tecnico de Informatica ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` int(9) NOT NULL,
  `acesso` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `data_acesso` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `telefone`, `acesso`, `data_acesso`, `status`) VALUES
(1, 'rayane', 'rayane@gmail.com', '12345678', 0, 'Admin', '07/03/2022', 'ativo'),
(2, 'luisa', 'luisa@gmail.com', '87654321', 988888888, 'Admin', '07/03/2022', 'ativo'),
(3, 'Millena', 'Millena@gmail.com', '123', 0, 'Admin', '11/04/2022', 'inativo'),
(6, 'Julio', 'Julio@gmail.com', 'xxx', 2147483647, 'Comum', '27/04/2022', 'inativo'),
(7, 'Luciano', 'Luciano@gmail.com', 'yyy', 2147483647, 'Comum', '10/05/2022', 'inativo'),
(8, 'Juliana', 'Juliana@gmail.com', 'qf4PGuMhBUkk3rH', 2147483647, 'Comum', '21/05/2022', 'ativo'),
(10, 'Rafael', 'rafael@gmail.com', 'opq', 2147483647, 'Comum', '30/05/2022', 'ativo'),
(11, 'Melanie', 'melanie@gmail.com', '456', 2147483647, 'Comum', '04/06/2022', 'ativo'),
(12, 'Vanessa', 'vanessa@gmail.com', '12345678', 2147483647, 'Comum', '15/06/2022', 'ativo'),
(13, 'gsuigdy', 'rayane@gmail.com', '123', 2147483647, 'Comum', '04/07/2022', 'Ativo'),
(14, 'rayane', 'rayane@gmail.com', '123', 2147483647, 'Comum', '07/07/2022', 'Ativo'),
(15, 'Rayane Santos', 'rayanessousa1406@gmail.com', '1082', 2147483647, 'Comum', '11/07/2022', 'Ativo'),
(16, 'FlashServices', 'flashservices1304@gmail.com', 'xxx', 2147483647, 'Admin', '12/07/2022', 'Ativo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
