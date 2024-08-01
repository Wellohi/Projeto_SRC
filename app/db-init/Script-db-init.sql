-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Jul-2024 às 16:21
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco_src`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `condicionante`
--

CREATE TABLE `condicionante` (
  `id_condicionante` int(11) NOT NULL COMMENT 'Campo, chave primaria, para identificar a condição que o evento terá.',
  `nm_condicionante` varchar(255) NOT NULL COMMENT 'Nome que a condição evento terá.',
  `vl_pontuacao_conselheiro` int(11) NOT NULL COMMENT 'Valor da pontuação que o conselheiro adriu.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `condicionante`
--

INSERT INTO `condicionante` (`id_condicionante`, `nm_condicionante`, `vl_pontuacao_conselheiro`) VALUES
(2, 'CONDIÇÔES CONDICIONANTES', 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conselheiro`
--

CREATE TABLE `conselheiro` (
  `id_conselheiro` int(11) NOT NULL COMMENT 'Campo, chave primaria, para identificar o conselheiro que foi cadastrado.',
  `nm_conselheiro` varchar(255) NOT NULL COMMENT 'Nome que o conselheiro terá.',
  `vl_pontuacao_conselheiro` int(11) NOT NULL DEFAULT 0 COMMENT 'Valor da pontuação que o conselheiro adriu.',
  `excluir` tinyint(1) DEFAULT 0 COMMENT 'exclusão de conselheiro.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `conselheiro`
--

INSERT INTO `conselheiro` (`id_conselheiro`, `nm_conselheiro`, `vl_pontuacao_conselheiro`, `excluir`) VALUES
(17, 'Carlos Henrique do Nascimento', 0, 1),
(18, 'Andrezza Carolina Brito Farias', 0, 1),
(19, 'Wellington do Carmo Cruz', 0, 0),
(20, 'Luana Aguiar Pinheiro Soares', 0, 0),
(21, 'Haroldo Santos Filho', 0, 0),
(22, 'Rangel Francisco Pinto', 0, 0),
(23, 'Heraldo de Jesus Campelo', 0, 0),
(24, 'Gercimira Ramos Moreira Rezende', 0, 0),
(25, 'Brunno Sitônio Fialho de Oliveira', 999999, 0),
(26, 'Joaquim de Alencar Bezerra Filho', 0, 0),
(27, 'Aguinaldo Mocelin', 101010, 0),
(28, 'Maria do Rosario de Oliveira', 0, 0),
(29, 'José Domingos Filho', 0, 0),
(30, 'Ana Tércia Lopes Rodrigues', 0, 0),
(31, 'Sergio Faraco', 0, 0),
(32, 'Aécio Prado Dantas Júnior', 123123, 0),
(33, 'José Donizete Valentina', 0, 0),
(34, 'Sebastião Célio Costa Castro', 0, 0),
(35, 'Mateus Nascimento Calegari', 0, 0),
(36, 'Manoel Carlos de Oliveira Júnior', 0, 0),
(38, 'Sandra Maria de Carvalho Campos', 0, 0),
(39, 'Carlos Rubens de Oliveira', 0, 0),
(40, 'Ticiane Lima dos Santos', 0, 0),
(41, 'José Gonçalves Campos Filho', 0, 0),
(42, 'Vitória Maria da Silva', 0, 0),
(43, 'Palmira Leão de Souza', 0, 0),
(44, 'José Alberto Viana Gaia', 0, 0),
(45, 'Fabiano Ribeiro Pimentel', 0, 0),
(46, 'Sônia Maria da Silva Gomes', 0, 0),
(47, 'Liliana Farias Lacerda', 0, 0),
(48, 'Roberto Schulze', 0, 0),
(49, 'Weberth Fernandes', 0, 0),
(50, 'Nilton Luiz Lima Praseres', 0, 0),
(51, 'Aloísio Rodrigues da Silva', 3, 0),
(52, 'Glaydson Trajano Farias', 0, 0),
(53, 'Elias Dib Caddah Neto', 0, 0),
(54, 'Maurício Gilberto Cândido', 0, 0),
(55, 'Erivan Ferreira Borges', 0, 0),
(56, 'Edneu da Silva Calderari', 0, 0),
(57, 'Mônica Foerster', 0, 0),
(58, 'Marlise Alves Silva Teixeira', 0, 0),
(59, 'Angela Andrade Dantas Mendonça', 0, 0),
(60, 'Valmir Leôncio da Silva', 0, 0),
(61, 'Norton Thomazi', 0, 0),
(62, 'Cil Farney Assis Rodrigues', 0, 0),
(63, 'Lucilene Florêncio Viana', 0, 0),
(64, 'Leonardo Silveira do Nascimento', 0, 0),
(65, 'Antônio de Pádua Soares Pelicarpo', 0, 0),
(66, 'Arleon Carlos Stelini', 0, 0),
(67, 'Antonio Carlos Sales Ferreira Junior', 0, 0),
(68, 'Geraldo de Paula Batista Filho', 0, 0),
(69, 'Ana Luiza Pereira Lima', 0, 0),
(70, 'Francisco Fernandes de Oliveira', 0, 0),
(80, 'NOCO VONLHESEIRO', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL COMMENT 'Campo, chave primaria, para identificar o evento.',
  `nm_evento` varchar(255) NOT NULL COMMENT 'Nome que o evento terá.',
  `tp_evento` varchar(255) NOT NULL COMMENT 'Definindo um tipo para o evento.',
  `nm_condicionante` varchar(255) NOT NULL COMMENT 'Nome que a condição evento terá.',
  `dt_evento` date NOT NULL COMMENT 'A data que determinara o evento. ',
  `vl_pontuacao_conselheiro` int(11) NOT NULL COMMENT 'Valor da pontuação que o conselheiro adriu.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`id_evento`, `nm_evento`, `tp_evento`, `nm_condicionante`, `dt_evento`, `vl_pontuacao_conselheiro`) VALUES
(3, 'teste', 'Reunião do Conselho Diretor do CFC', 'CONDITC', '2024-05-28', 0),
(25, 'TESTETESTETESTE', 'Reunião Plenária - CRC', 'CONDIÇÔES CONDICIONANTES', '2121-12-12', 0),
(28, 'Adicionando evento', 'Reunião Plenária - CRC', 'CONDIÇÔES CONDICIONANTES', '2024-07-08', 0),
(29, 'Adicionando Outro Evento', 'Reunião de Comissão ou Grupo de Trabalho ou Reunião de natureza técnica e/ou institucional, representando o CFC', 'CONDIÇÔES CONDICIONANTES', '2024-07-09', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gestor`
--

CREATE TABLE `gestor` (
  `id_gestor` int(11) NOT NULL COMMENT 'Campo, chave primaria, para identificar o perfil gestor.',
  `nm_gestor` varchar(255) NOT NULL COMMENT 'Nome que o usuario terá.',
  `tx_email_gestor` varchar(255) NOT NULL COMMENT 'Email que o usuario terá.',
  `bn_senha_gestor` varchar(255) NOT NULL COMMENT 'Senha que o usuario terá.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `participacao`
--

CREATE TABLE `participacao` (
  `id_conselheiro` int(11) NOT NULL COMMENT 'Campo, chave primaria, para identificar o conselheiro que foi cadastrado.',
  `id_evento` int(11) NOT NULL COMMENT 'Campo, chave primaria, para identificar o evento.',
  `vl_pontuacao_conselheiro` int(11) NOT NULL COMMENT 'Valor da pontuação que o conselheiro adriu.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `plenario`
--

CREATE TABLE `plenario` (
  `id_plenario` int(11) NOT NULL COMMENT 'Campo, chave primaria, para identificar o evento plenario cadastrado.',
  `nm_plenario` varchar(255) NOT NULL COMMENT 'Nome que o evento plenario terá.',
  `dt_plenario` date NOT NULL COMMENT 'A data que determinara o evento plenario. ',
  `qt_vagas` int(11) NOT NULL COMMENT 'Quantidade de vagas que o evento plenario terá.',
  `tp_plenario` varchar(255) NOT NULL COMMENT 'Definindo um tipo para o evento plenario.',
  `nm_condicionante` varchar(255) NOT NULL COMMENT 'Nome que a condição evento terá.',
  `sg_estado_uf` char(2) NOT NULL COMMENT 'Campo, que defini o estado aonde o evento plenario irá acontecer.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `plenario`
--

INSERT INTO `plenario` (`id_plenario`, `nm_plenario`, `dt_plenario`, `qt_vagas`, `tp_plenario`, `nm_condicionante`, `sg_estado_uf`) VALUES
(2, 'such a lovely', '0000-00-00', 3, 'Reunião Plenária', 'CONDIÇÔES CONDICIONANTES', 'CA'),
(4, 'teste', '2001-12-12', 10, 'Trabalho Técnico apresentado em evento do Calendário Oficial', 'CONDIÇÔES CONDICIONANTES', 'Br'),
(5, 'testeteste', '5110-02-05', 2, 'Trabalho Técnico apresentado em evento do Calendário Oficial', 'CONDIÇÔES CONDICIONANTES', 'Ta'),
(6, 'pena', '2111-02-21', 2, 'Trabalho Técnico apresentado em evento do Calendário Oficial', 'CONDIÇÔES CONDICIONANTES', 'Sã'),
(7, 'clash ', '2000-12-12', 20, 'Reunião de Comissão ou Grupo de Trabalho ou Reunião de natureza técnica e/ou institucional, representando o CFC', 'CONDIÇÔES CONDICIONANTES', 'Ri');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pontuacao`
--

CREATE TABLE `pontuacao` (
  `id_pontuacao` int(11) NOT NULL COMMENT 'Campo, chave primaria, para identificar a pontuação que o evento terá.',
  `nm_conselheiro` varchar(255) NOT NULL COMMENT 'Nome que o conselheiro terá.',
  `vl_pontuacao_conselheiro` int(11) NOT NULL COMMENT 'Valor da pontuação que o conselheiro adriu.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pontuacao`
--

INSERT INTO `pontuacao` (`id_pontuacao`, `nm_conselheiro`, `vl_pontuacao_conselheiro`) VALUES
(1, 'Carlos Henrique do Nascimento', 1),
(2, 'Andrezza Carolina Brito Farias', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ranqueamento`
--

CREATE TABLE `ranqueamento` (
  `id_ranqueamento` int(11) NOT NULL COMMENT 'Campo, chave primaria, para identificar a posição onde o conselheiro se encontra.',
  `vl_pontuacao_conselheiro` int(11) NOT NULL COMMENT 'Valor da pontuação que o conselheiro adriu.',
  `nm_conselheiro` varchar(255) NOT NULL COMMENT 'Nome que o conselheiro terá.',
  `dt_ranqueamento` varchar(255) NOT NULL COMMENT 'A data que determinara quando o reanqueamento foi criado. ',
  `nm_evento` varchar(255) NOT NULL COMMENT 'Nome que o evento terá.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ranqueamento_evento`
--

CREATE TABLE `ranqueamento_evento` (
  `id_ranqueamento_evento` int(11) NOT NULL COMMENT 'Campo, chave primaria, para identificar a posição onde o conselheiro evento se encontra.',
  `nm_evento` varchar(255) NOT NULL COMMENT 'Nome que o evento terá.',
  `vl_pontuacao_conselheiro` int(11) NOT NULL COMMENT 'Valor da pontuação que o conselheiro adriu.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_conselheiro`
--

CREATE TABLE `tabela_conselheiro` (
  `id_tabela_conselheiro` int(11) NOT NULL COMMENT 'Campo, chave primaria, para identificar a tabela do conselheiro se encontra.',
  `vl_pontuacao_conselheiro` int(11) NOT NULL COMMENT 'Valor da pontuação que o conselheiro adriu.',
  `nm_conselheiro` varchar(255) NOT NULL COMMENT 'Nome que o conselheiro terá.',
  `dt_tabela_conselheiro` varchar(255) NOT NULL COMMENT 'A data que determinara a criação da tabela conselheiro. ',
  `nm_evento` varchar(255) NOT NULL COMMENT 'Nome que o evento terá.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_evento`
--

CREATE TABLE `tipo_evento` (
  `id_tipo_evento` int(11) NOT NULL COMMENT 'Campo, chave primaria, para identificar o tipo do evento.',
  `nm_tipo_evento` varchar(255) NOT NULL COMMENT 'Definindo um tipo para o evento.',
  `vl_pontuacao_conselheiro` int(11) NOT NULL COMMENT 'Valor da pontuação que o conselheiro adriu.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipo_evento`
--

INSERT INTO `tipo_evento` (`id_tipo_evento`, `nm_tipo_evento`, `vl_pontuacao_conselheiro`) VALUES
(1, 'Reunião Plenária', 1),
(2, 'Reunião Plenária - CRC', 1),
(3, 'Reunião do Tribunal Superior de Ética e Disciplina', 1),
(4, 'Reunião do Conselho Diretor do CFC', 1),
(5, 'Reunião de Câmara do CFC, exceto da Câmara de Fiscalização, Ética e Disciplina', 1),
(6, 'Reunião da Câmara de Fiscalização, Ética e Disciplina', 2),
(7, 'Reunião de Comissão ou Grupo de Trabalho ou Reunião de natureza técnica e/ou institucional, representando o CFC', 1),
(8, 'Trabalho Técnico apresentado em evento do Calendário Oficial', 5),
(9, 'Artigo publicado na RBC ou em revista técnica de Contabilidade', 5),
(10, 'Palestrante/painelista em evento do Calendário Oficial e/ou evento de interesse da Classe Contábil', 5),
(11, 'Moderador/debatedor em evento do Calendário Oficial e/ou evento de interesse da Classe Contábil', 2),
(12, 'Treinamento no CFC ou nos CRCs, como instrutor', 5),
(13, 'Participação aprovada em evento nacional', -10),
(14, 'Participação aprovada em evento internacional', -20),
(15, 'Representação da Presidência em evento', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL COMMENT 'Campo, chave primaria, para identificar o usario.',
  `tx_emai_usuario` varchar(255) NOT NULL COMMENT 'Email que o usuario terá.',
  `bn_senha_usuario` varchar(255) NOT NULL COMMENT 'Senha que o usuario terá.',
  `nm_usuario` varchar(255) NOT NULL COMMENT 'Nome que o usuario terá.',
  `adm_usuario` int(1) NOT NULL COMMENT 'Determina o tipo de usuario sendo ele administrador ou gestor.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `tx_emai_usuario`, `bn_senha_usuario`, `nm_usuario`, `adm_usuario`) VALUES
(2, 'teste@teste.com', 'teste', 'teste', 0),
(3, 'admin@admin.com', 'admin', 'admin', 1),
(4, 'denise.silva@cfc.org.br', 'admin', 'denise.silva', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `condicionante`
--
ALTER TABLE `condicionante`
  ADD PRIMARY KEY (`id_condicionante`);

--
-- Índices para tabela `conselheiro`
--
ALTER TABLE `conselheiro`
  ADD PRIMARY KEY (`id_conselheiro`);

--
-- Índices para tabela `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`);

--
-- Índices para tabela `gestor`
--
ALTER TABLE `gestor`
  ADD PRIMARY KEY (`id_gestor`);

--
-- Índices para tabela `participacao`
--
ALTER TABLE `participacao`
  ADD PRIMARY KEY (`id_conselheiro`,`id_evento`),
  ADD KEY `ID_Evento` (`id_evento`);

--
-- Índices para tabela `plenario`
--
ALTER TABLE `plenario`
  ADD PRIMARY KEY (`id_plenario`);

--
-- Índices para tabela `pontuacao`
--
ALTER TABLE `pontuacao`
  ADD PRIMARY KEY (`id_pontuacao`);

--
-- Índices para tabela `ranqueamento`
--
ALTER TABLE `ranqueamento`
  ADD PRIMARY KEY (`id_ranqueamento`);

--
-- Índices para tabela `ranqueamento_evento`
--
ALTER TABLE `ranqueamento_evento`
  ADD PRIMARY KEY (`id_ranqueamento_evento`);

--
-- Índices para tabela `tabela_conselheiro`
--
ALTER TABLE `tabela_conselheiro`
  ADD PRIMARY KEY (`id_tabela_conselheiro`);

--
-- Índices para tabela `tipo_evento`
--
ALTER TABLE `tipo_evento`
  ADD PRIMARY KEY (`id_tipo_evento`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `condicionante`
--
ALTER TABLE `condicionante`
  MODIFY `id_condicionante` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Campo, chave primaria, para identificar a condição que o evento terá.', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `evento`
--
ALTER TABLE `evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Campo, chave primaria, para identificar o evento.', AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `gestor`
--
ALTER TABLE `gestor`
  MODIFY `id_gestor` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Campo, chave primaria, para identificar o perfil gestor.';

--
-- AUTO_INCREMENT de tabela `participacao`
--
ALTER TABLE `participacao`
  MODIFY `id_conselheiro` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Campo, chave primaria, para identificar o conselheiro que foi cadastrado.';

--
-- AUTO_INCREMENT de tabela `plenario`
--
ALTER TABLE `plenario`
  MODIFY `id_plenario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Campo, chave primaria, para identificar o evento plenario cadastrado.', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `pontuacao`
--
ALTER TABLE `pontuacao`
  MODIFY `id_pontuacao` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Campo, chave primaria, para identificar a pontuação que o evento terá.', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `ranqueamento`
--
ALTER TABLE `ranqueamento`
  MODIFY `id_ranqueamento` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Campo, chave primaria, para identificar a posição onde o conselheiro se encontra.';

--
-- AUTO_INCREMENT de tabela `ranqueamento_evento`
--
ALTER TABLE `ranqueamento_evento`
  MODIFY `id_ranqueamento_evento` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Campo, chave primaria, para identificar a posição onde o conselheiro evento se encontra.';

--
-- AUTO_INCREMENT de tabela `tabela_conselheiro`
--
ALTER TABLE `tabela_conselheiro`
  MODIFY `id_tabela_conselheiro` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Campo, chave primaria, para identificar a tabela do conselheiro se encontra.';

--
-- AUTO_INCREMENT de tabela `tipo_evento`
--
ALTER TABLE `tipo_evento`
  MODIFY `id_tipo_evento` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Campo, chave primaria, para identificar o tipo do evento.', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Campo, chave primaria, para identificar o usario.', AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `participacao`
--
ALTER TABLE `participacao`
  ADD CONSTRAINT `participacao_ibfk_1` FOREIGN KEY (`id_conselheiro`) REFERENCES `conselheiro` (`id_conselheiro`),
  ADD CONSTRAINT `participacao_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
