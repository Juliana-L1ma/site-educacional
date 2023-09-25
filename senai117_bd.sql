-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Set-2023 às 15:59
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `senai117_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `cpf_aluno` varchar(11) NOT NULL,
  `nome_aluno` varchar(50) DEFAULT NULL,
  `sobrenome_aluno` varchar(70) DEFAULT NULL,
  `rg_aluno` varchar(9) DEFAULT NULL,
  `data_nascimento_aluno` date DEFAULT NULL,
  `endereco_aluno` varchar(100) DEFAULT NULL,
  `endereco_numero_aluno` int(11) DEFAULT NULL,
  `complemento_end_aluno` varchar(70) DEFAULT NULL,
  `telefone_aluno` varchar(12) DEFAULT NULL,
  `email_pessoal_aluno` varchar(100) DEFAULT NULL,
  `email_educacional_aluno` varchar(110) DEFAULT NULL,
  `senha_educacional_aluno` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`cpf_aluno`, `nome_aluno`, `sobrenome_aluno`, `rg_aluno`, `data_nascimento_aluno`, `endereco_aluno`, `endereco_numero_aluno`, `complemento_end_aluno`, `telefone_aluno`, `email_pessoal_aluno`, `email_educacional_aluno`, `senha_educacional_aluno`) VALUES
('05496878526', 'Joana', 'D`Arc Manguês', '558963254', '0000-00-00', 'Avenida Dom Juan VI', 41, NULL, '011968535784', 'joaninhadarc30@yahoo.com.br', 'joana.mangues2@aluno.portalsenai117.com', 'joana123'),
('46825936875', 'Ana Maria', 'das Torres Lima', '725896572', '0000-00-00', 'Rua Tenente Chato', 120, 'Apartamento 2', '011968535784', 'joaninhadarc30@yahoo.com.br', 'joana.mangues2@aluno.portalsenai117.com', 'joana123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `boletim`
--

CREATE TABLE `boletim` (
  `id_boletim` int(11) NOT NULL,
  `nota_boletim` varchar(1) DEFAULT NULL,
  `frequencia_boletim` double DEFAULT NULL,
  `cpf_aluno` varchar(11) DEFAULT NULL,
  `id_turma` int(11) DEFAULT NULL,
  `id_unid_curricular` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `boletim`
--

INSERT INTO `boletim` (`id_boletim`, `nota_boletim`, `frequencia_boletim`, `cpf_aluno`, `id_turma`, `id_unid_curricular`) VALUES
(1, 'A', 92.2, '05496878526', 1, 1),
(2, 'R', 85, '46825936875', 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `id_unidade_curricular` int(11) DEFAULT NULL,
  `carga_horaria_curso` int(11) DEFAULT NULL,
  `valor_curso` double DEFAULT NULL,
  `nome_curso` varchar(100) DEFAULT NULL,
  `qntd_periodos` int(11) DEFAULT NULL,
  `plano_curso` longblob DEFAULT NULL,
  `capacidade` int(11) DEFAULT NULL,
  `categoria` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id_curso`, `id_unidade_curricular`, `carga_horaria_curso`, `valor_curso`, `nome_curso`, `qntd_periodos`, `plano_curso`, `capacidade`, `categoria`) VALUES
(1, 1, 1200, 2433.6, 'Desenvolvimento de Sistemas', 3, NULL, 32, 'Tecnologia da Informação'),
(2, 1, 1500, 3124.9, 'Eletroeletrônica', 4, NULL, 32, 'Eletricidade');

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `informacoes_curso`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `informacoes_curso` (
`NomeDoCurso` varchar(100)
,`QuantidadeDeTurmas` bigint(21)
,`CargaHorariaDoCurso` int(11)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `informacoes_curso_turma`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `informacoes_curso_turma` (
`NomeDoCurso` varchar(100)
,`NomeDaTurma` varchar(10)
,`DataInicioTurma` datetime(3)
,`DataFimTurma` datetime(3)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lista_alunos`
--

CREATE TABLE `lista_alunos` (
  `id_lista_alunos` int(11) NOT NULL,
  `divisao` varchar(1) DEFAULT NULL,
  `id_turma` int(11) DEFAULT NULL,
  `id_aluno` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `lista_alunos`
--

INSERT INTO `lista_alunos` (`id_lista_alunos`, `divisao`, `id_turma`, `id_aluno`) VALUES
(1, 'A', 1, '05496878526'),
(2, 'B', 1, '46825936875');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lista_disc_prof`
--

CREATE TABLE `lista_disc_prof` (
  `id_lista_disc_prof` int(11) NOT NULL,
  `id_professor` varchar(11) DEFAULT NULL,
  `id_unidade_curricular` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `lista_disc_prof`
--

INSERT INTO `lista_disc_prof` (`id_lista_disc_prof`, `id_professor`, `id_unidade_curricular`) VALUES
(1, '45932568974', 2),
(2, '45896735826', 1),
(3, '45932568974', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lista_prof_turma`
--

CREATE TABLE `lista_prof_turma` (
  `id_lista_prof_turma` int(11) NOT NULL,
  `id_turma` int(11) DEFAULT NULL,
  `id_professor` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `lista_prof_turma`
--

INSERT INTO `lista_prof_turma` (`id_lista_prof_turma`, `id_turma`, `id_professor`) VALUES
(1, 1, '45896735826'),
(2, 1, '47865923845'),
(3, 2, '45932568974');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lista_turma_uc`
--

CREATE TABLE `lista_turma_uc` (
  `id_lista_turma_uc` int(11) NOT NULL,
  `id_unidade_curricular` int(11) DEFAULT NULL,
  `id_turma` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `lista_turma_uc`
--

INSERT INTO `lista_turma_uc` (`id_lista_turma_uc`, `id_unidade_curricular`, `id_turma`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `cpf_professor` varchar(11) NOT NULL,
  `nome_professor` varchar(50) DEFAULT NULL,
  `sobrenome_professor` varchar(70) DEFAULT NULL,
  `rg_professor` varchar(9) DEFAULT NULL,
  `data_nascimento_professor` date DEFAULT NULL,
  `endereco_professor` varchar(100) DEFAULT NULL,
  `numero_end_professor` varchar(10) DEFAULT NULL,
  `complemento_end_professor` varchar(70) DEFAULT NULL,
  `telefone_professor` varchar(12) DEFAULT NULL,
  `email_pessoal_professor` varchar(100) DEFAULT NULL,
  `email_educacional_professor` varchar(110) DEFAULT NULL,
  `senha_educacional_professor` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`cpf_professor`, `nome_professor`, `sobrenome_professor`, `rg_professor`, `data_nascimento_professor`, `endereco_professor`, `numero_end_professor`, `complemento_end_professor`, `telefone_professor`, `email_pessoal_professor`, `email_educacional_professor`, `senha_educacional_professor`) VALUES
('45896735826', 'Silas', 'Bastianelli Pinto', '876459302', '0000-00-00', 'Rua Doutor Alvarez de Alvarenga', '21', 'Próxima ao mercado Shibata', '011985689529', 'silas.bapinto@gmail.com', 'silas.pinto@educador.portalsenai117.com', 'aquisilas12'),
('45932568974', 'Ismael', 'Alves Faria Lima', '365899587', '0000-00-00', 'Rua Super Rico Terceiro', '1041', 'Apartamento 7, bloco 3', '011963558746', 'ismasalves.falima@gmail.com', 'ismael.lima@educador.portalsenai117.com', 'ismaellima23'),
('47865923845', 'Bruno', 'Messias Aguiar', '987536988', '0000-00-00', 'Avenida Dom Juan I', '133', NULL, '011963587269', 'brunomessias098@yahoo.com.br', 'bruno.aguiar@educador.portalsenai117.com', 'brunoaguia82');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `id_turma` int(11) NOT NULL,
  `id_curso` int(11) DEFAULT NULL,
  `nome_turma` varchar(10) DEFAULT NULL,
  `data_inicio_turma` datetime(3) DEFAULT NULL,
  `periodo_turma` varchar(20) DEFAULT NULL,
  `data_conclusao_turma` datetime(3) DEFAULT NULL,
  `total_alunos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id_turma`, `id_curso`, `nome_turma`, `data_inicio_turma`, `periodo_turma`, `data_conclusao_turma`, `total_alunos`) VALUES
(1, 1, 'M1P', '0000-00-00 00:00:00.000', 'Manhã', '0000-00-00 00:00:00.000', 32),
(2, 2, 'T2E', '0000-00-00 00:00:00.000', 'Tarde', '0000-00-00 00:00:00.000', 32),
(3, 2, 'M1E', '0000-00-00 00:00:00.000', 'Manhã', '0000-00-00 00:00:00.000', 32);

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade_curricular`
--

CREATE TABLE `unidade_curricular` (
  `id_unid_curricular` int(11) NOT NULL,
  `nome_uc` varchar(100) DEFAULT NULL,
  `carga_horaria` int(11) DEFAULT NULL,
  `area_vinculada` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `unidade_curricular`
--

INSERT INTO `unidade_curricular` (`id_unid_curricular`, `nome_uc`, `carga_horaria`, `area_vinculada`) VALUES
(1, 'Hardware', 75, 'Tecnologia'),
(2, 'Programação Web Front-End', 75, 'Tecnologia'),
(3, 'Fundamentos da eletroeletrônica:', 180, 'Mecatrônica');

-- --------------------------------------------------------

--
-- Estrutura para vista `informacoes_curso`
--
DROP TABLE IF EXISTS `informacoes_curso`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `informacoes_curso`  AS SELECT `c`.`nome_curso` AS `NomeDoCurso`, count(`t`.`id_turma`) AS `QuantidadeDeTurmas`, `c`.`carga_horaria_curso` AS `CargaHorariaDoCurso` FROM (`cursos` `c` left join `turmas` `t` on(`c`.`id_curso` = `t`.`id_curso`)) GROUP BY `c`.`id_curso`, `c`.`nome_curso`, `c`.`carga_horaria_curso``carga_horaria_curso`  ;

-- --------------------------------------------------------

--
-- Estrutura para vista `informacoes_curso_turma`
--
DROP TABLE IF EXISTS `informacoes_curso_turma`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `informacoes_curso_turma`  AS SELECT `c`.`nome_curso` AS `NomeDoCurso`, `t`.`nome_turma` AS `NomeDaTurma`, `t`.`data_inicio_turma` AS `DataInicioTurma`, `t`.`data_conclusao_turma` AS `DataFimTurma` FROM (`cursos` `c` left join `turmas` `t` on(`c`.`id_curso` = `t`.`id_curso`))  ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`cpf_aluno`);

--
-- Índices para tabela `boletim`
--
ALTER TABLE `boletim`
  ADD PRIMARY KEY (`id_boletim`),
  ADD KEY `assoc_aluno_boletim` (`cpf_aluno`),
  ADD KEY `assoc_turma_boletim` (`id_turma`),
  ADD KEY `assoc_unidcurricular_boletim` (`id_unid_curricular`);

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`),
  ADD KEY `assoc_curso_uc` (`id_unidade_curricular`);

--
-- Índices para tabela `lista_alunos`
--
ALTER TABLE `lista_alunos`
  ADD PRIMARY KEY (`id_lista_alunos`),
  ADD KEY `assoc_alunos_listaalunos` (`id_aluno`),
  ADD KEY `assoc_turma_listaalunos` (`id_turma`);

--
-- Índices para tabela `lista_disc_prof`
--
ALTER TABLE `lista_disc_prof`
  ADD PRIMARY KEY (`id_lista_disc_prof`),
  ADD UNIQUE KEY `id_unidade_curricular` (`id_unidade_curricular`),
  ADD KEY `assoc_professor_listadiscprof` (`id_professor`);

--
-- Índices para tabela `lista_prof_turma`
--
ALTER TABLE `lista_prof_turma`
  ADD PRIMARY KEY (`id_lista_prof_turma`),
  ADD KEY `assoc_turma_listprofturma` (`id_turma`),
  ADD KEY `assoc_prof_listprofturma` (`id_professor`);

--
-- Índices para tabela `lista_turma_uc`
--
ALTER TABLE `lista_turma_uc`
  ADD PRIMARY KEY (`id_lista_turma_uc`),
  ADD KEY `assoc_turma_listaturmauc` (`id_turma`),
  ADD KEY `assoc_uc_listaturmauc` (`id_unidade_curricular`);

--
-- Índices para tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`cpf_professor`);

--
-- Índices para tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id_turma`),
  ADD KEY `id_curso_turm` (`id_curso`);

--
-- Índices para tabela `unidade_curricular`
--
ALTER TABLE `unidade_curricular`
  ADD PRIMARY KEY (`id_unid_curricular`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `boletim`
--
ALTER TABLE `boletim`
  ADD CONSTRAINT `assoc_aluno_boletim` FOREIGN KEY (`cpf_aluno`) REFERENCES `alunos` (`cpf_aluno`),
  ADD CONSTRAINT `assoc_turma_boletim` FOREIGN KEY (`id_turma`) REFERENCES `turmas` (`id_turma`),
  ADD CONSTRAINT `assoc_unidcurricular_boletim` FOREIGN KEY (`id_unid_curricular`) REFERENCES `unidade_curricular` (`id_unid_curricular`);

--
-- Limitadores para a tabela `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `assoc_curso_uc` FOREIGN KEY (`id_unidade_curricular`) REFERENCES `unidade_curricular` (`id_unid_curricular`);

--
-- Limitadores para a tabela `lista_alunos`
--
ALTER TABLE `lista_alunos`
  ADD CONSTRAINT `assoc_alunos_listaalunos` FOREIGN KEY (`id_aluno`) REFERENCES `alunos` (`cpf_aluno`),
  ADD CONSTRAINT `assoc_turma_listaalunos` FOREIGN KEY (`id_turma`) REFERENCES `turmas` (`id_turma`);

--
-- Limitadores para a tabela `lista_disc_prof`
--
ALTER TABLE `lista_disc_prof`
  ADD CONSTRAINT `assoc_professor_listadiscprof` FOREIGN KEY (`id_professor`) REFERENCES `professores` (`cpf_professor`),
  ADD CONSTRAINT `assoc_uc_listadiscprof` FOREIGN KEY (`id_unidade_curricular`) REFERENCES `unidade_curricular` (`id_unid_curricular`);

--
-- Limitadores para a tabela `lista_prof_turma`
--
ALTER TABLE `lista_prof_turma`
  ADD CONSTRAINT `assoc_prof_listprofturma` FOREIGN KEY (`id_professor`) REFERENCES `professores` (`cpf_professor`),
  ADD CONSTRAINT `assoc_turma_listprofturma` FOREIGN KEY (`id_turma`) REFERENCES `turmas` (`id_turma`);

--
-- Limitadores para a tabela `lista_turma_uc`
--
ALTER TABLE `lista_turma_uc`
  ADD CONSTRAINT `assoc_turma_listaturmauc` FOREIGN KEY (`id_turma`) REFERENCES `turmas` (`id_turma`),
  ADD CONSTRAINT `assoc_uc_listaturmauc` FOREIGN KEY (`id_unidade_curricular`) REFERENCES `turmas` (`id_turma`);

--
-- Limitadores para a tabela `turmas`
--
ALTER TABLE `turmas`
  ADD CONSTRAINT `id_curso_turm` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
