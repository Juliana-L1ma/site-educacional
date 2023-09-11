CREATE TABLE alunos(
    cpf_aluno BIGINT PRIMARY KEY,
    nome_aluno VARCHAR(50),
    sobrenome_aluno VARCHAR(70),
    rg_aluno INT,
    data_nascimento_aluno DATETIME,
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
    cpf_professor BIGINT PRIMARY KEY,
    nome_professor VARCHAR(50),
    sobrenome_professor VARCHAR(70),
    rg_aluno INT,
    data_nascimento_professor DATETIME,
    endereco_professor VARCHAR(100),
    complemento_end_professor VARCHAR(70),
    telefone_professor BIGINT,
    email_pessoal_professor VARCHAR(100),
    email_educacional_professor VARCHAR(110),
    senha_educacional_professor VARCHAR(15)
);

CREATE TABLE unidade_curricular
(
    id_unid_curricular INT PRIMARY KEY,
    nome VARCHAR(100),
    carga_horaria INT,
    area_vinculada VARCHAR(30)
);

CREATE TABLE cursos(
    id_curso INT PRIMARY KEY,
    id_unidade_curricular INT,
    carga_horaria_curso INT,
    valor_curso FLOAT,
    nome_curso VARCHAR(100),
    qntd_periodos INT,
    CONSTRAINT assoc_curso_uc
        FOREIGN KEY (id_unidade_curricular)
        REFERENCES unidade_curricular (id_unid_curricular),
    plano_curso LONGBLOB,
    capacidade INT,
    categoria VARCHAR(25)
);

CREATE TABLE turmas(
    id_turma INT PRIMARY KEY,
    id_curso INT,
    nome_turma VARCHAR(10),
    data_inicio_turma DATETIME,
    periodo_turma VARCHAR(20),
    data_conclusao_turma DATETIME,
    total_alunos INT,
    CONSTRAINT id_curso_turm
        FOREIGN KEY (id_curso)
        REFERENCES cursos (id_curso)
);

CREATE TABLE lista_prof_turma
(
    id_lista_prof_turma INT PRIMARY KEY,
    id_turma INT,
    id_professor BIGINT,
    CONSTRAINT assoc_turma_listprofturma
        FOREIGN KEY (id_turma)
        REFERENCES turmas (id_turma),
    CONSTRAINT assoc_prof_listprofturma
        FOREIGN KEY (id_professor)
        REFERENCES professores (cpf_professor)
);

CREATE TABLE lista_alunos(
    id_lista_alunos INT PRIMARY KEY,
    id_turma INT,
    id_aluno BIGINT,
    CONSTRAINT assoc_alunos_listaalunos
        FOREIGN KEY (id_aluno)
        REFERENCES alunos (cpf_aluno),
    CONSTRAINT assoc_turma_listaalunos
        FOREIGN KEY (id_turma)
        REFERENCES turmas (id_turma)
);

CREATE TABLE lista_turma_uc(
    id_lista_turma_uc INT PRIMARY KEY,
    id_unidade_curricular INT,
    id_turma INT,
    CONSTRAINT assoc_turma_listaturmauc
        FOREIGN KEY (id_turma)
        REFERENCES turmas (id_turma),
    CONSTRAINT assoc_uc_listaturmauc
        FOREIGN KEY (id_unidade_curricular)
        REFERENCES turmas (id_turma)
);

INSERT INTO alunos(
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
VALUES(
 05496878526,
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
(46825936875,
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
    cpf_professor,
    nome_professor,
    sobrenome_professor,
    rg_aluno,
    data_nascimento_professor,
    endereco_professor,
    complemento_end_professor,
    telefone_professor,
    email_pessoal_professor,
    email_educacional_professor,
    senha_educacional_professor
)
VALUES
(45896735826,
 'Silas',
 'Bastianelli Pinto',
 876459302,
 1982 - 10 - 21,
 'Rua Doutor Alvarez de Alvarenga',
 'N°21',
 985689529,
 'silas.bapinto@gmail.com',
 'silas.pinto@educador.senai117.com',
 'silascou12'
),
(47865923845,
 'Bruno',
 'Messias Aguiar',
 987536988,
 1986 - 09 - 04,
 'Avenida Dom Juan I',
 'N° 133',
 11963587269,
 'brunomessias098@yahoo.com.br',
 'bruno.aguiar@educador.senai117.com',
 'brunoaguia82'
),
(45932568974,
 'Ismael',
 'Alves Faria Lima',
 365899587,
 1964 - 12 - 15,
 'Rua Super Rico Terceiro',
 'N° 1041',
 119635587469,
 'ismasalves.falima@gmail.com',
 'ismael.lima@educador.senai117.com',
 'ismaellima23'
);

INSERT INTO unidade_curricular
(
    id_unid_curricular,
    nome,
    carga_horaria,
    area_vinculada
)
VALUES
(1, 'Hardware', 75, 'Tecnologia'),
(2, 'Programação Web Front-End', 75, 'Tecnologia');

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
(1, 'Desenvolvimento de Sistemas', 1, 1200, 2433.6, 3, 32, 'Tecnologia da Informa��o'),
(2, 'Eletroeletr�nica', 1, 1500, 3124.9, 4, 32, 'Eletricidade');

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
(1, 'M1P', 1, 2022 - 07 - 27, 'Manh�', 2023 - 12 - 21, 32),
(2, 'T2E', 2, 2022 - 01 - 27, 'Tarde', 2023 - 12 - 21, 32),
(3, 'M1E', 2, 2022 - 07 - 27, 'Manh�', 2023 - 12 - 21, 32);

INSERT INTO lista_prof_turma
(
    id_lista_prof_turma,
    id_turma,
    id_professor
)
VALUES
(1, 1, 45896735826),
(2, 1, 47865923845),
(3, 2, 45932568974);

INSERT INTO lista_alunos
(
    id_lista_alunos,
    id_turma,
    id_aluno
)
VALUES
(1, 1, 05496878526);

INSERT INTO lista_turma_uc
(
    id_lista_turma_uc,
    id_unidade_curricular,
    id_turma
)
VALUES
(1, 1, 1);

SELECT *
FROM lista_prof_turma