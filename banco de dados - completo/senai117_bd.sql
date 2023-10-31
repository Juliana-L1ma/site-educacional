CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(120) NOT NULL,
  `senha` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `administrador` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Wagner Cunha', 'wagnercunha@adm.senai.br', 'adm12345');

CREATE TABLE alunos
(
    num_matricula_aluno VARCHAR(8) PRIMARY KEY,
    cpf_aluno VARCHAR(11),
    nome_aluno VARCHAR(50),
    sobrenome_aluno VARCHAR(70),
    rg_aluno INT,
    data_nascimento_aluno DATETIME(3),
    endereco_aluno VARCHAR(100),
    endereco_numero_aluno INT,
    complemento_end_aluno VARCHAR(70),
    telefone_aluno BIGINT,
    email_pessoal_aluno VARCHAR(100),
    email_educacional_aluno VARCHAR(110),
    senha_educacional_aluno VARCHAR(15)
);

CREATE TABLE professores
(
    nif_professor VARCHAR(8) PRIMARY KEY,
    nome_professor VARCHAR(50),
    sobrenome_professor VARCHAR(70),
    rg_professor INT,
    data_nascimento_professor DATETIME(3),
    endereco_professor VARCHAR(100),
	numero_end_professor VARCHAR(10),
    complemento_end_professor VARCHAR(70),
    telefone_professor BIGINT,
    email_pessoal_professor VARCHAR(100),
    email_educacional_professor VARCHAR(110),
    senha_educacional_professor VARCHAR(15)
);

CREATE TABLE unidades_curriculares
(
    id_unid_curricular INT PRIMARY KEY AUTO_INCREMENT,
    nome_uc VARCHAR(100),
    carga_horaria INT,
    area_vinculada VARCHAR(30)
);

CREATE TABLE cursos
(
    id_curso INT PRIMARY KEY AUTO_INCREMENT,
    id_unidade_curricular INT,
    carga_horaria_curso INT,
    valor_curso DOUBLE,
    nome_curso VARCHAR(100),
    qntd_periodos INT,
    CONSTRAINT assoc_curso_uc
        FOREIGN KEY (id_unidade_curricular)
        REFERENCES unidades_curriculares (id_unid_curricular),
    plano_curso LONGBLOB,
    capacidade INT,
    categoria VARCHAR(25)
);

CREATE TABLE turmas
(
    id_turma INT PRIMARY KEY AUTO_INCREMENT,
    id_curso INT,
    nome_turma VARCHAR(10),
    data_inicio_turma DATETIME(3),
    periodo_turma VARCHAR(20),
    data_conclusao_turma DATETIME(3),
    total_alunos INT,
    CONSTRAINT id_curso_turm
        FOREIGN KEY (id_curso)
        REFERENCES cursos (id_curso)
);


CREATE TABLE boletim
(
    id_boletim INT PRIMARY KEY AUTO_INCREMENT,
	nota_boletim VARCHAR(1),
	frequencia_boletim DOUBLE,
    id_aluno VARCHAR(8),
    id_turma INT,
	id_unid_curricular INT,
    CONSTRAINT assoc_aluno_boletim
        FOREIGN KEY (id_aluno)
        REFERENCES alunos (num_matricula_aluno),

    CONSTRAINT assoc_turma_boletim
        FOREIGN KEY (id_turma)
        REFERENCES turmas (id_turma),

	CONSTRAINT assoc_unidcurricular_boletim
      FOREIGN KEY (id_unid_curricular)
        REFERENCES unidades_curriculares (id_unid_curricular)
);

CREATE TABLE lista_prof_turma
(
    id_lista_prof_turma INT PRIMARY KEY AUTO_INCREMENT,
    id_turma INT,
    nif_professor VARCHAR(8),
    CONSTRAINT assoc_turma_listprofturma
        FOREIGN KEY (id_turma)
        REFERENCES turmas (id_turma),
    CONSTRAINT assoc_prof_listprofturma
        FOREIGN KEY (nif_professor)
        REFERENCES professores (nif_professor)
);

CREATE TABLE lista_alunos
(
    id_lista_alunos INT PRIMARY KEY AUTO_INCREMENT,
	divisao VARCHAR(1),
    id_turma INT,
    id_aluno VARCHAR(8),
    CONSTRAINT assoc_alunos_listaalunos
        FOREIGN KEY (id_aluno)
        REFERENCES alunos (num_matricula_aluno),
    CONSTRAINT assoc_turma_listaalunos
        FOREIGN KEY (id_turma)
        REFERENCES turmas (id_turma)
);

CREATE TABLE lista_turma_uc
(
    id_lista_turma_uc INT PRIMARY KEY AUTO_INCREMENT,
    id_unidade_curricular INT,
    id_turma INT,
    CONSTRAINT assoc_turma_listaturmauc
        FOREIGN KEY (id_turma)
        REFERENCES turmas (id_turma),
    CONSTRAINT assoc_uc_listaturmauc
        FOREIGN KEY (id_unidade_curricular)
        REFERENCES turmas (id_turma)
);

CREATE TABLE lista_disc_prof
(
    id_lista_disc_prof INT PRIMARY KEY AUTO_INCREMENT,
    nif_professor VARCHAR(8),
    id_unidade_curricular INT,
     CONSTRAINT assoc_professor_listadiscprof
	 FOREIGN KEY (nif_professor)
        REFERENCES professores (nif_professor),
    CONSTRAINT assoc_uc_listadiscprof
        FOREIGN KEY (id_unidade_curricular)
        REFERENCES unidades_curriculares (id_unid_curricular),
		UNIQUE (id_unidade_curricular)
);

INSERT INTO alunos
(
    num_matricula_aluno,
    cpf_aluno,
    nome_aluno,
    sobrenome_aluno,
    rg_aluno,
    data_nascimento_aluno,
    endereco_aluno,
    endereco_numero_aluno,
    complemento_end_aluno,
    telefone_aluno,
    email_pessoal_aluno,
    email_educacional_aluno,
    senha_educacional_aluno
)
VALUES
('22250420',
'05496878526',
 'Joana',
 'D`Arc Manguês',
 558963254,
 2005 - 08 - 13,
 'Avenida Dom Juan VI',
 41 ,
 NULL,
 11968535784,
 'joaninhadarc30@yahoo.com.br',
 'joana.mangues2@portalsenai117.com',
 'joana123'
),
('20950392',
'46825936875',
 'Ana Maria',
 'das Torres Lima',
 775896572,
 2006 - 01 - 09,
 'Rua Tenente Chato',
 120,
 'Apartamento 2',
 11968535784,
 'joaninhadarc30@yahoo.com.br',
 'joana.mangues2@portalsenai117.com',
 'joana123'
);

INSERT INTO professores
(
    nif_professor,
    nome_professor,
    sobrenome_professor,
    rg_professor,
    data_nascimento_professor,
    endereco_professor,
	numero_end_professor,
    complemento_end_professor,
    telefone_professor,
    email_pessoal_professor,
    email_educacional_professor,
    senha_educacional_professor
)
VALUES
('1178922',
 'Silas',
 'Bastianelli Pinto',
 876459302,
 1982 - 10 - 21,
 'Rua Doutor Alvarez de Alvarenga',
 '21',
 'Próxima ao mercado Shibata',
 985689529,
 'silas.bapinto@gmail.com',
 'silas.pinto@educador.senai117.com',
 'aquisilas12'
),
('1080043',
 'Bruno',
 'Messias Aguiar',
 987536988,
 1986 - 09 - 04,
 'Avenida Dom Juan I',
 '133',
 NULL,
 11963587269,
 'brunomessias098@yahoo.com.br',
 'bruno.aguiar@educador.senai117.com',
 'brunoaguia82'
),
('12098876',
 'Ismael',
 'Alves Faria Lima',
 365899587,
 1964 - 12 - 15,
 'Rua Super Rico Terceiro',
 '1041',
 'Apartamento 7, bloco 3',
 119635587469,
 'ismasalves.falima@gmail.com',
 'ismael.lima@educador.senai117.com',
 'ismaellima23'
);

INSERT INTO unidades_curriculares
(
    id_unid_curricular,
    nome_uc,
    carga_horaria,
    area_vinculada
)
VALUES
(1, 'Hardware', 75, 'Tecnologia'),
(2, 'Programação Web Front-End', 75, 'Tecnologia'),
(3, 'Fundamentos da eletroeletrônica:', 180, 'Mecatrônica');

INSERT INTO cursos
(
    id_curso,
    nome_curso,
    id_unidade_curricular,
    carga_horaria_curso,
    valor_curso,
    qntd_periodos,
    capacidade,
    categoria
)
VALUES
(1, 'Técnico em Des. de Sistemas', 1, 1200, 2433.6, 3, 32, 'Técnico'),
(2, 'Automação Industrial', 1, 1200, 3200.87, 4, 32, 'CAI'),
(3, 'Programação Python', 1, 1200, 2000, 1, 16, 'FIC'),
(4, 'Eletroeletrônica', 1, 1500, 3124.9, 4, 32, 'Técnico');

INSERT INTO turmas
(
    id_turma,
    nome_turma,
    id_curso,
    data_inicio_turma,
    periodo_turma,
    data_conclusao_turma,
    total_alunos
)
VALUES
(1, 'M1P', 1, 2022 - 07 - 27, 'Manhã', 2023 - 12 - 21, 32),
(2, 'T2E', 4, 2022 - 01 - 27, 'Tarde', 2023 - 12 - 21, 32),
(3, 'M1E', 4, 2022 - 07 - 27, 'Manhã', 2023 - 12 - 21, 32);

INSERT INTO lista_prof_turma
(
    id_lista_prof_turma,
    id_turma,
    nif_professor
)
VALUES
(1, 1, '1178922'),
(2, 1, '1080043'),
(3, 2, '12098876');

INSERT INTO lista_alunos
(
    id_lista_alunos,
    id_turma,
    id_aluno,
	divisao
)
VALUES
(1, 1, '20950392', 'A'),
(2, 2, '22250420', 'B');

INSERT INTO lista_turma_uc
(
    id_lista_turma_uc,
    id_unidade_curricular,
    id_turma
)
VALUES
(1, 1, 1);

INSERT INTO lista_disc_prof
(
    id_lista_disc_prof,
    nif_professor,
    id_unidade_curricular
)
VALUES
(1, '1080043', 2),
(2, '12098876', 1),
(3, '1178922', 3);

INSERT INTO boletim (id_boletim,
	nota_boletim,
	frequencia_boletim,
    id_aluno,
    id_turma,
	id_unid_curricular)
	VALUES (1, 'A', 92.2, '20950392', 1, 1),
	(2, 'R', 85, '22250420', 1, 2);
