<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- sweet alert -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Cadastro</title>
    <style>
    #escolha_prof_uc {
        flex-direction: column;
    }

    #escolha_prof_uc .checkProfessores_turma {
        width: fit-content;
    }

    .label_prof_uc {
        padding-left: 10px;
    }

    .swal2-confirm {
        background-color: #B22222;
    }

    .invisivel_cadastro {
        display: none;
    }
    </style>
    <link rel="stylesheet" href="css/style.css">

    <?php
    // Crie a conexão
    $conect = mysqli_connect("localhost", "root", "", "senai117_bd");

    // Verifique a conexão
    if ($conect->connect_error) {
        die("Conexão falhou: " . $conect->connect_error);
    }
    ?>
</head>

<body>
    <div class="headertitulo">
        <header class="header-professor-adm">
            <div class="div-cabecalho" id="modo-desktop">
                <ul>
                    <a href="">
                        <li>Home</li>
                    </a>
                    <a href="">
                        <li>Perfil</li>
                    </a>
                    <a href="">
                        <li>Funcionalidades</li>
                    </a>
                    <a href="">
                        <li>Sobre o Senai</li>
                    </a>
                </ul>
            </div>
            <div class="div-cabecalho" id="modo-mobile">
                <nav id="nav-menu-hamburguer">
                    <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu"
                        aria-expanded="false">
                        <span id="hamburger">
                            <img src="./img/barra-de-menu.png"
                                alt="Menu aberto ícones criados por verry purnomo - Flaticon" />
                        </span>
                    </button>
                    <ul id="menu" role="menu">
                        <br />
                        <li><a class="header-item" href="index.html">Home</a></li>
                        <br />
                        <hr />
                        <br />
                        <li><a class="header-item" href="products.html">Products</a></li>
                        <br />
                        <hr />
                        <br />
                        <li><a class="header-item" href="aboutus.html">About us</a></li>
                        <br />
                        <hr />
                    </ul>
                </nav>
            </div>
            <div class="div-cabecalho" id="modo-mobilee">
                <a href="https://www.flaticon.com/br/icones-gratis/perfil"
                    title="Perfil ícones criados por inkubators - Flaticon" id="icone-perfil">
                    <img src="./img/perfil-de-usuario.png" />
                </a>
                <a href="https://www.flaticon.com/br/icones-gratis/engrenagem"
                    title="Engrenagem ícones criados por Freepik - Flaticon" id="icone-engrenagem">
                    <img src="./img/engrenagem.png" />
                </a>
        </header>


        <!-- SELECTS HEADER -->
        <div class="central">
            <h1 class="titulocentral">Cadastro de Informações</h1>
            <hr class="hrVerde_cadastroInfo">
            <select id="primeiroSelect_cadastro" class="select_cadastroInfos_turma" onchange="mostraSegundoSelect_cadastro()">
                <option id="" value=""></option>
                <option value="aluno">Aluno</option>
                <option value="curso">Curso</option>
                <option value="disciplina">Disciplina</option>
                <option value="professor">Professor</option>
                <option value="turma">Turma</option>
                <option value="disc_curso">Disciplina por curso</option>
            </select>

            <div id="segundaOpcao_aluno" class="invisivel_cadastro">
                <select name="" class="select_secundario select_cadastroInfos_style" id="selecionarOpcao_aluno">
                    <option value=""></option>
                    <?php
                            // Consulta para buscar as opções do banco de dados
                            $sql = "SELECT id_turma, nome_turma FROM turmas";
                            $result = $conect->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $id = $row['id_turma'];
                                    $nomeTurma = $row['nome_turma'];
                                    echo '<option value="' . $id . '"';
                                    echo '>' . $nomeTurma . '</option>';
                                }
                            }

                            ?>
                </select>
            </div>

            <div id="segundaOpcao_turma1" class="invisivel_cadastro">
                <select name="" class="select_secundario select_cadastroInfos_style" id="opcaoTurma1">
                    <option value=""></option>
                    <?php
                        // Consulta para buscar as opções do banco de dados
                        $sql = "SELECT id_curso, nome_curso FROM cursos";
                        $result = $conect->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $id = $row['id_curso'];
                                $nomeCurso = $row['nome_curso'];
                                echo '<option value="' . $id . '"';
                                echo '>' . $nomeCurso . '</option>';
                            }
                        }
                        ?>
                </select>
            </div>

            <div id="segundaOpcao_turma2" class="invisivel_cadastro">
                <select name="" class="select_secundario select_cadastroInfos_style" id="opcaoTurma2">
                    <option value=""></option>
                    <option value="Manhã">Manhã</option>
                    <option value="Tarde">Tarde</option>
                    <option value="Noite">Noite</option>
                </select>
            </div>

            <div id="segundaOpcao_disciplina" class="invisivel_cadastro">
                <select name="" class="select_secundario select_cadastroInfos_style" id="selecionarOpcao_disciplina">
                    <option value=""></option>
                    <?php
                        // Consulta para buscar as opções do banco de dados
                        $sql = "SELECT id_curso, nome_curso FROM cursos";
                        $result = $conect->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $id = $row['id_curso'];
                                $nomeCurso = $row['nome_curso'];
                                echo '<option value="' . $id . '"';
                                echo '>' . $nomeCurso . '</option>';
                            }
                        }
                        ?>
                </select>
            </div>
        </div>
    </div>

    <h2 id="texto_preenchaDados_cadastroInfo" style="margin-left: none;">Preencha com os dados exigidos</h2>

    <main class="main_cadastroInfos">

        <form action="" method="POST" class="invisivel_cadastro" id="div_cadastroInfo_aluno">
            <input type="hidden" name="turmaSelecionada_aluno" id="turmaSelecionada_aluno" value="">

            <div class="t1">
                <label for="numMatricula_aluno">Número de matrícula do aluno:</label>
                <input type="text" name="numMatricula_aluno" id="numMatricula_aluno">
            </div>
            <br>
            <div class="t1">
                <label for="nome_aluno">Nome:</label>
                <input type="text" name="nome_aluno" id="nome_aluno">
            </div>
            <div class="t1">
                <label for="sobrenome_aluno">Sobrenome:</label>
                <input type="text" name="sobrenome_aluno" id="sobrenome_aluno">
            </div>
            <br>
            <div class="t1">
                <label for="cpf_aluno">CPF:</label>
                <input type="text" name="cpf_aluno" id="cpf_aluno">
            </div>
            <br>
            <div class="t1">
                <label for="rg_aluno">RG:</label>
                <input type="text" name="rg_aluno" id="rg_aluno">
            </div>
            <br>
            <div class="t1">
                <label for="dataNasc_aluno">Data de nascimento:</label>
                <input type="date" name="dataNasc_aluno" id="dataNasc_aluno">
            </div>
            <br>
            <div class="t1">
                <label for="endereco_aluno">Endereço:</label>
                <input type="text" name="endereco_aluno" id="endereco_aluno">
            </div>
            <br>
            <div class="t1">
                <label for="numEndereco_aluno">Número:</label>
                <input type="number" name="numEndereco_aluno" id="numEndereco_aluno">
            </div>
            <br>
            <div class="t1">
                <label for="complemento_aluno">Complemento:</label>
                <input type="text" name="complemento_aluno" id="complemento_aluno">
            </div>
            <br>
            <div class="t1">
                <label for="telefone_aluno">Telefone:</label>
                <input type="tel" name="telefone_aluno" id="telefone_aluno">
            </div>
            <br>
            <div class="t1">
                <label for="divisao_aluno">Divisão dentro da turma:</label>
                <select name="divisao_aluno" id="divisao_aluno">
                    <option value="A">A</option>
                    <option value="B">B</option>
                </select>
            </div>
            <br>
            <div class="t1">
                <label for="email_aluno">E-mail:</label>
                <input type="email" name="email_aluno" id="email_aluno">
            </div>
            <br>
            <div class="t1">
                <label for="emailEdu_aluno">E-mail educacional:</label>
                <input type="email" name="emailEdu_aluno" id="emailEdu_aluno">
            </div>
            <br>
            <div class="t1">
                <label for="senhaEdu_aluno">Senha:</label>
                <input type="text" name="senhaEdu_aluno" id="senhaEdu_aluno">
            </div>
            <div class="divBtnCadastro">
                <input type="hidden" name="identificadorForm" value="aluno">
                <button type='button' class="btnCadastro" name="botaoCadastro_aluno"
                    onclick="envioAJAX('div_cadastroInfo_aluno')">Cadastrar</button>
                <a href="" class="attCadastro">Precisa atualizar o cadastro?</a>
                <br>
                <hr>
            </div>
        </form>

        <div id="t2" style="display: flex;">
            <form action="" method="POST" class="invisivel_cadastro" id="div_cadastroInfo_unidade_curricular">
                <input type="hidden"
                    name="cursoSelecionado_disciplina" id="cursoSelecionado_disciplina" value="">
                <div class="t1">
                    <label for="nomeUC">Unidade curricular:</label>
                    <input type="text" name="nomeUC_input" id="nomeUC_input">
                </div>
                <br>
                <div class="t1">
                    <label for="cargaHorariaUC">Carga horária:</label>
                    <input type="text" name="cargaHorariaUC_INPUT" id="cargaHorariaUC_INPUT">
                </div>
                <br>
                <div class="t1">
                    <label for="areaVinculadaUC">Área vinculada:</label>
                    <input type="text" name="areaVinculadaUC_input">
                </div>
                <br>
                <div class="divBtnCadastro">
                    <input type="hidden" name="identificadorForm" value="disciplina">
                    <button type='button' class="btnCadastro" name="botaoCadastro_uc"
                        onclick="envioAJAX('div_cadastroInfo_unidade_curricular')">Cadastrar</button>
                    <a href="" class="attCadastro">Precisa atualizar o cadastro?</a>
                    <br>
                    <hr>
                </div>
            </form>
        </div>

        <form action="" method="POST" class="invisivel_cadastro" id="div_cadastroInfo_professor">
            <div class="t1">
                <label for="nomeCompleto_cadastroInfos">Nome:</label>
                <input type="text" name="nome_professor" id="nome_professor">
            </div>
            <br>
            <div class="t1">
                <label for="sobrenome_professor">Sobrenome:</label>
                <input type="text" name="sobrenome_professor" id="sobrenomeCompleto_professor">
            </div>
            <br>
            <div class="t1">
                <label for="nif_professor">NIF:</label>
                <input type="text" name="nif_professor" id="nif_professor">
            </div>
            <br>
            <div class="t1">
                <label for="dataNasc_prof">Data de nascimento:</label>
                <input type="date" id="dataNasc_prof" name="dataNasc_prof">
            </div>
            <br>
            <div class="t1">
                <label for="endereco_prof">Endereço:</label>
                <input type="text" name="endereco_prof" id="endereco_prof">
            </div>
            <div class="t1">
                <label for="num_prof">Número:</label>
                <input type="text" name="num_prof" id="num_prof">
            </div>
            <div class="t1">
                <label for="complemento_prof">Complemento:</label>
                <input type="text" name="complemento_prof" id="complemento_prof">
            </div>
            <br>
            <div class="t1">
                <label for="nomeCompleto_cadastroInfos">Formação:</label>
                <input type="text" name="formacao_prof" id="formacao_prof">
            </div>
            <br>
            <div class="t1">
                <label for="email_prof">E-mail:</label>
                <input type="email" name="email_prof" id="email_prof">
            </div>
            <div class="t1">
                <label for="telefone_prof">Telefone:</label>
                <input type="number" name="telefone_prof" id="telefone_prof">
            </div>
            <div class="t1">
                <label for="emailEd_prof">E-mail educacional:</label>
                <input type="text" name="emailEd_prof" id="emailEd_prof">
            </div>
            <div class="t1">
                <label for="senhaEd_prof">Senha:</label>
                <input type="password" name="senhaEd_prof" id="senhaEd_prof">
            </div>
            <div class="divBtnCadastro">
                <input type="hidden" name="identificadorForm" value="professor">
                <button class="btnCadastro" type="button" name="botaoCadastro_professor"
                    onclick="envioAJAX('div_cadastroInfo_professor')">Cadastrar</button>
                <a href="" class="attCadastro">Precisa atualizar o cadastro?</a>
                <br>
                <hr>
            </div>
        </form>

        <form action="" method="POST" class="invisivel_cadastro" id="div_cadastroInfo_curso">
            <div class="t1">
                <label for="nomeCurso">Nome do curso:</label>
                <input type="text" name="nomeCurso_input" id="nomeCurso_input">
            </div>
            <br>
            <div class="t1">
                <label for="cargaHorariaCurso">Carga horária:</label>
                <input type="number" name="cargaHorariaCurso_input" id="cargaHorariaCurso_input">
            </div>
            <br>
            <div class="t1">
                <label for="capacidadeCurso">Capacidade:</label>
                <input type="number" name="capacidadeCurso_input" id="capacidadeCurso_input">
            </div>
            <div class="opcoesCurso">
                <label for="">Categoria:</label>
                <input type="hidden" id="selectCategoria_curso" name="selectCategoria_curso" value="">
                <div id="alinharOpCurso" value="">
                    <input type="checkbox" name="Técnico" class="checkbox_categoria_curso">
                    <label for="nomeCompleto_cadastroInfos">Técnico</label>
                    <input type="checkbox" name="CAI" class="checkbox_categoria_curso">
                    <label for="nomeCompleto_cadastroInfos">CAI</label>
                    <input type="checkbox" name="FIC" class="checkbox_categoria_curso">
                    <label for="nomeCompleto_cadastroInfos">FIC</label>
                </div>
            </div>
            <div class="t1">
                <label for="nomeCompleto_cadastroInfos">Custo:</label>
                <input type="number" id="datadeConclusao_cadastroInfos" name="custo_curso" placeholder="R$">
            </div>
            <div class="t1">
                <label for="nomeCompleto_cadastroInfos">Plano de curso:</label>
                <div id="pdfAnexado">
                    <input type="file" id="pdf_plano_curso">
                    <!-- <img src="img/envio.png" alt=""> -->
                    <div class="pdfAnexado">planoCurso.pdf</div>
                </div>
            </div>
            <div class="divBtnCadastro">
                <input type="hidden" name="identificadorForm" value="curso">
                <button type='button' class="btnCadastro" name="botaoCadastro_curso"
                    onclick="envioAJAX('div_cadastroInfo_curso')">Cadastrar</button>
                <a href="" class="attCadastro">Precisa atualizar o cadastro?</a>
                <br>
                <hr>
            </div>
            </div>
        </form>

        <form action="" method="POST" class="invisivel_cadastro" id="div_cadastroInfo_turma">
            <input type="hidden" name="cursoSelecionado_turma" id="cursoSelecionado_turma" value="">
            <input type="hidden" name="periodoSelecionado_turma" id="periodoSelecionado_turma" value="">
            <div class="t1">
                <label for="nome_turma">Nome da turma:</label>
                <input name="nome_turma" type="text" id="nome_turma">
            </div>
            <br>
            <div class="t1">
                <label for="inicio_turma">Data de início:</label>
                <input name="inicio_turma" type="date" id="inicio_turma">
            </div>
            <br>
            <div class="t1">
                <label for="conclusao_turma">Data de conclusão:</label>
                <input name="conclusao_turma" type="date" id="conclusao_turma">
            </div>
            <div class="t1">
                <label for="periodo_turma">Período:</label>
                <input name="periodo_turma" type="text" id="periodo_turma">
            </div>
            <div class="t1">
                <label for="totalAlunos_turma">Total de alunos:</label>
                <input name="totalAlunos_turma" type="number" id="totalAlunos_turma">
            </div>
            <div class="t1">
                <label for="nomeCompleto_cadastroInfos" class="labelCad">Professores:</label>
                <div class="alinhaSelect">
                    <select name="selectprofessores_turma" name="opcoes" class="opcoes" id="professor">
                        <?php
                    // Consulta para buscar as opções do banco de dados
                    $sql = "SELECT nif_professor, nome_professor, sobrenome_professor FROM professores";
                    $result = $conect->query($sql);

                    if ($result->num_rows > 0) {
                        $professores = array();
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['nif_professor'];
                            $nomeTurma = $row['nome_professor'] . ' ' . $row['sobrenome_professor'];
                            $professores[] = $row;

                            echo '<option value="' . $id . '"';
                            echo '>' . $nomeTurma . '</option>';
                        }
                    }
                    ?>
                    </select>
                    <button type="button" class="btnAdd" onclick="addProfessor()"><img src="img/adicionarr.png"
                            alt=""></button>
                </div>



            </div>
            <div class="t1">
                <input type="hidden" id="id_unidCur_prof">
                <label for="nomeCompleto_cadastroInfos">Escolha um professor para uma disciplina:</label>
                <div class="alinhaSelect">
                    <select name="selectDisciplinas_turma" class="opcoes" id="unidade_curricular_select">
                        <option value=""></option>
                        <?php
                    // Consulta para buscar as opções do banco de dados
                    $sql = "SELECT id_unid_curricular, nome_uc FROM unidades_curriculares";
                    $result = $conect->query($sql);

                    if ($result->num_rows > 0) {
                        $professores = array();
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['id_unid_curricular'];
                            $nomeTurma = $row['nome_uc'];
                            $professores[] = $row;

                            echo '<option value="' . $id . '"';
                            echo '>' . $nomeTurma . '</option>';
                        }
                    }
                    ?>
                    </select>
                </div>
                <div id="escolha_prof_uc">
                    <!-- Os checkboxes serão gerados aqui -->
                </div>
                <button type="button" class="btnAdd" id="btn_add_profUc"><img src="img/adicionarr.png" alt=""></button>
                <div class="divBtnCadastro">
                    <input type="hidden" name="identificadorForm" value="turma">
                    <button class="btnCadastro" type="button"
                        onclick="envioAJAX('div_cadastroInfo_turma')">Cadastrar</button>
                    <a href="" class="attCadastro">Precisa atualizar o cadastro?</a>
                    <br>
                    <hr>
                </div>
            </div>
        </form>

        <form action="" method="POST" class="invisivel_cadastro" id="div_cadastroInfo_disc_curso">
            <input type="hidden" name="cursoSelecionado_turma" id="cursoSelecionado_turma" value="">
        <input type="hidden" name="periodoSelecionado_turma" id="periodoSelecionado_turma" value="">
            <div class="t1">
                <input type="hidden" id="id_unidCur_prof">
                <label for="nomeCompleto_cadastroInfos">Escolha um curso:</label>
                <div class="alinhaSelect">
                    <select name="selectDisciplinas_turma" class="opcoes" id="curso_selectDiscCurso">
                        <option value=""></option>
                        <?php
                $sql = "SELECT id_curso, nome_curso FROM cursos";
                $result = $conect->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id = $row['id_curso'];
                        $nomeCurso = $row['nome_curso'];
                        echo '<option value="' . $id . '"';
                        echo '>' . $nomeCurso . '</option>';
                    }
                }
                ?>
                    </select>
                </div>

                <label for="selectDisciplinas_curso">Escolha uma disciplina para associar:</label>
                <div class="alinhaSelect">
                    <select name="selectDisciplinas_curso" class="opcoes" id="unidCurr_selectDiscCurso">
                        <option value=""></option>
                        <?php
                    // Consulta para buscar as opções do banco de dados
                    $sql = "SELECT id_unid_curricular, nome_uc FROM unidades_curriculares";
                    $result = $conect->query($sql);

                    if ($result->num_rows > 0) {
                        $professores = array();
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['id_unid_curricular'];
                            $nomeTurma = $row['nome_uc'];
                            $professores[] = $row;

                            echo '<option value="' . $id . '"';
                            echo '>' . $nomeTurma . '</option>';
                        }
                    }
                    ?>
                    </select>
                </div>

                <div class="divBtnCadastro">
                    <button class="btnCadastro" type="button"
                        onclick="envioAJAX('div_cadastroInfo_disc_curso')">Associar</button>
                    <br>
                    <hr>
                </div>
            </div>
        </form>
    </main>

    <footer>

    </footer>

    <script src="./script/scriptCadastro.js"></script>
</body>

</html>
