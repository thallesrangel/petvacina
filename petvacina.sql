-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 28/07/2020 às 14:32
-- Versão do servidor: 10.4.11-MariaDB
-- Versão do PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `petvacina`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbanimal`
--

CREATE TABLE `tbanimal` (
  `id_animal` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome_animal` varchar(150) NOT NULL,
  `identificacao_animal` varchar(100) DEFAULT NULL,
  `data_nascimento` date NOT NULL,
  `id_especie` int(11) NOT NULL,
  `raca` varchar(150) NOT NULL,
  `sexo` int(11) NOT NULL,
  `pelagem` varchar(100) NOT NULL,
  `id_proprietario` int(11) NOT NULL,
  `microchip` varchar(120) DEFAULT NULL,
  `data_implementacao` date DEFAULT NULL,
  `local_implementacao` varchar(220) DEFAULT NULL,
  `url` varchar(220) DEFAULT NULL,
  `data_registro` date NOT NULL,
  `flag_excluido` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbanimal`
--

INSERT INTO `tbanimal` (`id_animal`, `id_usuario`, `nome_animal`, `identificacao_animal`, `data_nascimento`, `id_especie`, `raca`, `sexo`, `pelagem`, `id_proprietario`, `microchip`, `data_implementacao`, `local_implementacao`, `url`, `data_registro`, `flag_excluido`) VALUES
(26, 1, 'Simon', '01', '2020-07-02', 1, 'Persa', 1, 'amaerelo', 8, NULL, NULL, NULL, 'a2d4faabee2a13557298dd212f59e28a.jpg', '2020-07-26', 0),
(27, 1, '123', '123', '2020-07-01', 1, '32', 1, '23', 3, NULL, NULL, NULL, NULL, '2020-07-26', 1),
(28, 1, 'Mel', '01', '2020-07-14', 1, 'Persa', 2, 'Malhada', 8, '7128378', '2020-07-24', 'PEITO', 'd4671b10c09361dd3b4be2bc802f3382.jpg', '2020-07-26', 1),
(29, 2, 'Tucanido', '01', '2020-07-08', 1, 'Padrão', 1, 'Anil', 9, NULL, NULL, NULL, 'ab4c80e249a9c42f772940d6c8974714.jpg', '2020-07-27', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbanticio`
--

CREATE TABLE `tbanticio` (
  `id_anticio` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_animal` int(11) NOT NULL,
  `nome_produto` varchar(220) NOT NULL,
  `dose` double(10,2) NOT NULL,
  `data_aplicacao` date NOT NULL,
  `data_prox_dose` date DEFAULT NULL,
  `nome_veterinario` varchar(220) DEFAULT NULL,
  `registro_crmv` varchar(100) DEFAULT NULL,
  `data_registro` date NOT NULL,
  `flag_excluido` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbanticio`
--

INSERT INTO `tbanticio` (`id_anticio`, `id_usuario`, `id_animal`, `nome_produto`, `dose`, `data_aplicacao`, `data_prox_dose`, `nome_veterinario`, `registro_crmv`, `data_registro`, `flag_excluido`) VALUES
(1, 1, 26, 'Anticio', 50.00, '2020-07-01', '2020-07-02', 'PAULINO', '0101', '2020-07-28', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbespecie`
--

CREATE TABLE `tbespecie` (
  `id_especie` int(11) NOT NULL,
  `nome_especie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbespecie`
--

INSERT INTO `tbespecie` (`id_especie`, `nome_especie`) VALUES
(1, 'Cachorro'),
(2, 'Gato');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbparasita`
--

CREATE TABLE `tbparasita` (
  `id_parasita` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_animal` int(11) NOT NULL,
  `nome_produto` varchar(220) NOT NULL,
  `dose` double(10,2) NOT NULL,
  `data_aplicacao` date NOT NULL,
  `data_prox_dose` date DEFAULT NULL,
  `nome_veterinario` varchar(220) DEFAULT NULL,
  `registro_crmv` varchar(100) DEFAULT NULL,
  `data_registro` date NOT NULL,
  `flag_excluido` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbparasita`
--

INSERT INTO `tbparasita` (`id_parasita`, `id_usuario`, `id_animal`, `nome_produto`, `dose`, `data_aplicacao`, `data_prox_dose`, `nome_veterinario`, `registro_crmv`, `data_registro`, `flag_excluido`) VALUES
(1, 1, 26, 'parasitario', 20.00, '2020-07-01', '2020-07-02', '1', '1', '2020-07-28', 0),
(2, 1, 26, 'parasitam', 10.00, '2020-07-01', '2020-07-01', '', '', '2020-07-28', 1),
(3, 1, 26, 'Produtosim', 29.00, '2020-07-01', '2020-07-31', '', '', '2020-07-28', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbproprietario`
--

CREATE TABLE `tbproprietario` (
  `id_proprietario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome_proprietario` varchar(220) NOT NULL,
  `sobrenome_proprietario` varchar(220) NOT NULL,
  `data_nascimento` date NOT NULL,
  `contato` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `endereco_estado` int(11) NOT NULL,
  `endereco_cidade` int(11) NOT NULL,
  `endereco_bairro` varchar(100) NOT NULL,
  `endereco_rua` varchar(100) NOT NULL,
  `endereco_numero` varchar(50) NOT NULL,
  `endereco_complemento` varchar(100) DEFAULT NULL,
  `endereco_referencia` varchar(100) DEFAULT NULL,
  `data_registro` date NOT NULL,
  `flag_excluido` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbproprietario`
--

INSERT INTO `tbproprietario` (`id_proprietario`, `id_usuario`, `nome_proprietario`, `sobrenome_proprietario`, `data_nascimento`, `contato`, `email`, `endereco_estado`, `endereco_cidade`, `endereco_bairro`, `endereco_rua`, `endereco_numero`, `endereco_complemento`, `endereco_referencia`, `data_registro`, `flag_excluido`) VALUES
(3, 1, 'Lorena', 'Rangel', '2020-07-01', '127213626', 'lorena@gmail.com', 1, 2, 'projetado', 'Rua projetada', '1', '', '', '2020-07-25', 0),
(7, 1, 'Paola', 'Ribeiro', '2020-07-01', '282732678', 'paola@gmail.com', 1, 2, 'santo antonio', 'rua projetada', '2', '', '', '2020-07-25', 1),
(8, 1, 'Micaelly', 'Karina de Souza Reges', '2020-07-01', '2809987788', 'mika@gmail.com', 1, 2, 'roça', 'rua projetada', '92', '', '', '2020-07-26', 0),
(9, 2, 'Thalles', 'Rangel', '2020-07-02', '213712836', 'rangelthr1@gmail.com', 1, 2, 'santo antonio', 'rua das bromelias', '21', '', '', '2020-07-27', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbusuario`
--

CREATE TABLE `tbusuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `sobrenome_usuario` varchar(110) NOT NULL,
  `email_usuario` varchar(220) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `contato_usuario` varchar(50) NOT NULL,
  `endereco_usuario_numero` varchar(50) DEFAULT NULL,
  `endereco_usuario_estado` int(11) DEFAULT NULL,
  `endereco_usuario_cidade` int(11) DEFAULT NULL,
  `endereco_usuario_bairro` varchar(100) DEFAULT NULL,
  `endereco_usuario_rua` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbusuario`
--

INSERT INTO `tbusuario` (`id_usuario`, `nome_usuario`, `sobrenome_usuario`, `email_usuario`, `senha`, `contato_usuario`, `endereco_usuario_numero`, `endereco_usuario_estado`, `endereco_usuario_cidade`, `endereco_usuario_bairro`, `endereco_usuario_rua`) VALUES
(1, 'Thalles', 'Rangel Lopes', 'rangelthr@gmail.com', '36ec3add18ae59b3dc62c67b4a6440da', '27998275832', NULL, NULL, NULL, NULL, NULL),
(2, 'Lorena', 'Rangel Lopes', 'lorena@gmail.com', '202cb962ac59075b964b07152d234b70', '2797772892', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbvacina`
--

CREATE TABLE `tbvacina` (
  `id_vacina` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_animal` int(11) NOT NULL,
  `titulo_vacina` varchar(220) NOT NULL,
  `data_aplicacao` date NOT NULL,
  `data_revacinacao` date DEFAULT NULL,
  `nome_veterinario` varchar(220) DEFAULT NULL,
  `registro_crmv` varchar(100) DEFAULT NULL,
  `data_registro` date NOT NULL,
  `flag_excluido` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbvacina`
--

INSERT INTO `tbvacina` (`id_vacina`, `id_usuario`, `id_animal`, `titulo_vacina`, `data_aplicacao`, `data_revacinacao`, `nome_veterinario`, `registro_crmv`, `data_registro`, `flag_excluido`) VALUES
(9, 1, 26, 'B123', '2020-07-01', '2020-07-01', 'ANDRÉ', '21932', '2020-07-26', 0),
(10, 1, 26, 'BAGGA', '2020-07-02', '2020-07-08', '', '', '2020-07-26', 0),
(11, 1, 28, 'Buscript', '2020-07-01', '2020-07-31', 'Giovana Golçalvez', '217381', '2020-07-27', 0),
(12, 1, 28, 'V8', '2020-07-01', '2020-07-31', 'Paulo Sergio', '21231', '2020-07-27', 1),
(13, 2, 29, 'Febre Amarela', '2020-07-01', '2020-07-24', 'Gilberto Azevedo', '1278371', '2020-07-27', 0),
(14, 1, 26, 'AAAAA', '2020-07-01', '2020-07-02', 'paulo ', '01010', '2020-07-28', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbvermifugacao`
--

CREATE TABLE `tbvermifugacao` (
  `id_vermifugacao` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_animal` int(11) NOT NULL,
  `nome_produto` varchar(220) NOT NULL,
  `dose` double(10,2) NOT NULL,
  `peso` double(10,2) NOT NULL,
  `data_aplicacao` date NOT NULL,
  `data_prox_dose` date DEFAULT NULL,
  `nome_veterinario` varchar(220) DEFAULT NULL,
  `registro_crmv` varchar(100) DEFAULT NULL,
  `data_registro` date NOT NULL,
  `flag_excluido` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tbvermifugacao`
--

INSERT INTO `tbvermifugacao` (`id_vermifugacao`, `id_usuario`, `id_animal`, `nome_produto`, `dose`, `peso`, `data_aplicacao`, `data_prox_dose`, `nome_veterinario`, `registro_crmv`, `data_registro`, `flag_excluido`) VALUES
(9, 1, 26, 'Vermicina', 20.00, 10.00, '2020-07-25', '2020-07-24', 'André Lopes', '213287', '2020-07-26', 0),
(10, 1, 26, 'Hulejfhe7', 20.00, 30.00, '2020-07-16', '2020-07-25', 'andré', '2173826', '2020-07-26', 1);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tbanimal`
--
ALTER TABLE `tbanimal`
  ADD PRIMARY KEY (`id_animal`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_especie` (`id_especie`),
  ADD KEY `id_proprietario` (`id_proprietario`);

--
-- Índices de tabela `tbanticio`
--
ALTER TABLE `tbanticio`
  ADD PRIMARY KEY (`id_anticio`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_animal` (`id_animal`);

--
-- Índices de tabela `tbespecie`
--
ALTER TABLE `tbespecie`
  ADD PRIMARY KEY (`id_especie`);

--
-- Índices de tabela `tbparasita`
--
ALTER TABLE `tbparasita`
  ADD PRIMARY KEY (`id_parasita`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_animal` (`id_animal`);

--
-- Índices de tabela `tbproprietario`
--
ALTER TABLE `tbproprietario`
  ADD PRIMARY KEY (`id_proprietario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Índices de tabela `tbvacina`
--
ALTER TABLE `tbvacina`
  ADD PRIMARY KEY (`id_vacina`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_animal` (`id_animal`);

--
-- Índices de tabela `tbvermifugacao`
--
ALTER TABLE `tbvermifugacao`
  ADD PRIMARY KEY (`id_vermifugacao`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_animal` (`id_animal`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tbanimal`
--
ALTER TABLE `tbanimal`
  MODIFY `id_animal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `tbanticio`
--
ALTER TABLE `tbanticio`
  MODIFY `id_anticio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbespecie`
--
ALTER TABLE `tbespecie`
  MODIFY `id_especie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbparasita`
--
ALTER TABLE `tbparasita`
  MODIFY `id_parasita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbproprietario`
--
ALTER TABLE `tbproprietario`
  MODIFY `id_proprietario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbvacina`
--
ALTER TABLE `tbvacina`
  MODIFY `id_vacina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tbvermifugacao`
--
ALTER TABLE `tbvermifugacao`
  MODIFY `id_vermifugacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `tbanimal`
--
ALTER TABLE `tbanimal`
  ADD CONSTRAINT `tbanimal_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbusuario` (`id_usuario`),
  ADD CONSTRAINT `tbanimal_ibfk_2` FOREIGN KEY (`id_especie`) REFERENCES `tbespecie` (`id_especie`),
  ADD CONSTRAINT `tbanimal_ibfk_3` FOREIGN KEY (`id_proprietario`) REFERENCES `tbproprietario` (`id_proprietario`);

--
-- Restrições para tabelas `tbanticio`
--
ALTER TABLE `tbanticio`
  ADD CONSTRAINT `tbanticio_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbusuario` (`id_usuario`),
  ADD CONSTRAINT `tbanticio_ibfk_2` FOREIGN KEY (`id_animal`) REFERENCES `tbanimal` (`id_animal`);

--
-- Restrições para tabelas `tbparasita`
--
ALTER TABLE `tbparasita`
  ADD CONSTRAINT `tbparasita_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbusuario` (`id_usuario`),
  ADD CONSTRAINT `tbparasita_ibfk_2` FOREIGN KEY (`id_animal`) REFERENCES `tbanimal` (`id_animal`);

--
-- Restrições para tabelas `tbproprietario`
--
ALTER TABLE `tbproprietario`
  ADD CONSTRAINT `tbproprietario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbusuario` (`id_usuario`);

--
-- Restrições para tabelas `tbvacina`
--
ALTER TABLE `tbvacina`
  ADD CONSTRAINT `tbvacina_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbusuario` (`id_usuario`),
  ADD CONSTRAINT `tbvacina_ibfk_2` FOREIGN KEY (`id_animal`) REFERENCES `tbanimal` (`id_animal`);

--
-- Restrições para tabelas `tbvermifugacao`
--
ALTER TABLE `tbvermifugacao`
  ADD CONSTRAINT `tbvermifugacao_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbusuario` (`id_usuario`),
  ADD CONSTRAINT `tbvermifugacao_ibfk_2` FOREIGN KEY (`id_animal`) REFERENCES `tbanimal` (`id_animal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
