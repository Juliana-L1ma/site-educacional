<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- sweet alert -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <script src="script/script.js"></script> -->
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
    .select_secundario {
            display: none;
        }
    </style>
    <?php
    // Crie a conexão
    $conect = mysqli_connect("localhost", "root", "", "senai117_bd");

    // Verifique a conexão
    if ($conect->connect_error) {
        die("Conexão falhou: " . $conect->connect_error);
    }
    ?>
    <link rel="stylesheet" href="css/style.css">
    <title>Cadastro de Informações</title>
</head>

<body>
<!-- onload="someTudo()" -->
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
            </div>
        </header>

        <div class="central">
            <h1 class="titulocentral">Cadastro de Informações</h1>
            <hr class="hrVerde_cadastroInfo">

            <div id="divCategorias_cadastroinfo">
                <select name="" id="selecionarOpcao" class="select_cadastroInfos_turma">
                    <option id="" value=""></option>
                    <option value="aluno">Aluno</option>
                    <option value="curso">Curso</option>
                    <option value="unidade_curricular">Disciplina</option>
                    <option value="professor">Professor</option>
                    <option value="turma">Turma</option>
                    <option value="disc_curso">Disciplina por curso</option>
                </select>

                <!-- // select's secundários -->
                <br>
                <div style="display: flex; width: 90%">
                    <div class="categoriaSelecionada_cadastroInfo">
                        <select name="" class="select_secundario select_cadastroInfos_style" id="selecionarOpcao_aluno">
                            <option value="sim"></option>
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

                    <select name="selectCurso_turma" class="select_secundario select_cadastroInfos_style"
                        id="selecionarOpcao_turma">
                        <option value="sim"></option>
                        <?php
                        // Consulta para buscar as opções do banco de dados
                        $sql = "SELECT id_curso, nome_curso FROM cursos";
                        $result = $conect->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo $result;
                                $id = $row['id_curso'];
                                $nomeCurso = $row['nome_curso'];
                                echo '<option value="' . $id . '"';
                                echo '>' . $nomeCurso . '</option>';
                            }
                        }
                        ?>
                    </select>

                    <select name="" class="select_secundario select_cadastroInfos_style" id="selecionarOpcao_turma2">
                        <option value=""></option>
                        <option value="Manhã">Manhã</option>
                        <option value="Tarde">Tarde</option>
                        <option value="Noite">Noite</option>
                    </select>


                    <select name="" class="select_secundario select_cadastroInfos_style"
                        id="selecionarOpcao_unidade_curricular">
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
                    <!-- a div a seguir fechou o style das selects secundarias -->
                </div>

            </div>
            <!-- //// a div a seguir fecha o header ////// -->
        </div>

        <h2 id="texto_preenchaDados_cadastroInfo" style="margin-left: none;">Preencha com os dados exigidos</h2>

        <main class="main_cadastroInfos">

            <div id="t2" style="display: flex;">
                <form action="" method="POST" class="divCategoria2_naoVisivel" id="div_cadastroInfo_unidade_curricular">
                    <input type="hidden" name="cursoSelecionado_disciplina" id="cursoSelecionado_disciplina" value="">
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

            <form action="" method="POST" class="divCategoria2_naoVisivel" id="div_cadastroInfo_aluno">
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

            <form action="" method="POST" class="divCategoria2_naoVisivel" id="div_cadastroInfo_professor">
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

            <form action="" method="POST" class="divCategoria2_naoVisivel" id="div_cadastroInfo_curso">
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

    <form action="" method="POST" class="divCategoria2_naoVisivel" id="div_cadastroInfo_turma">
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







    <form action="" method="POST" class="divCategoria2_naoVisivel" id="div_cadastroInfo_disc_curso">
        <!-- <input type="hidden" name="cursoSelecionado_turma" id="cursoSelecionado_turma" value="">
                <input type="hidden" name="periodoSelecionado_turma" id="periodoSelecionado_turma" value=""> -->
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


    <?php
        // pegando o valor do select 'professores' da turma
        $select_prof_turma = filter_input(INPUT_POST, 'selectprofessores_turma', FILTER_SANITIZE_STRING);
        $select_periodo_turma = filter_input(INPUT_POST, 'select_periodo_turma', FILTER_SANITIZE_STRING);
        $select_uc_turma = filter_input(INPUT_POST, 'selectDisciplinas_turma', FILTER_SANITIZE_STRING);
        $select_curso_turma = filter_input(INPUT_POST, 'selectCurso_turma', FILTER_SANITIZE_STRING);

        $conect = mysqli_connect("localhost", "root", "", "senai117_bd");

        //Declaramos a variável que vai receber o conteúdo da lista
        $professorChecado_check = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['identificadorForm'])) {
                $identificadorDoFormulario = $_POST['identificadorForm'];

                if ($identificadorDoFormulario === 'aluno') {
                    $num_matricula = $_POST['numMatricula_aluno'];
                    $nome_aluno = $_POST['nome_aluno'];
                    $sobrenome_aluno = $_POST['sobrenome_aluno'];
                    $cpf_aluno = $_POST['cpf_aluno'];
                    $rg_aluno = $_POST['rg_aluno'];
                    $data_nascimento_aluno = $_POST['dataNasc_aluno'];
                    $endereco_aluno = $_POST['endereco_aluno'];
                    $numEndereco_aluno = $_POST['numEndereco_aluno'];
                    $telefone_aluno = $_POST['telefone_aluno'];
                    $complemento_aluno = $_POST['complemento_aluno'];
                    $email_aluno = $_POST['email_aluno'];
                    $email_educacional = $_POST['emailEdu_aluno'];
                    $senha_educacional = $_POST['senhaEdu_aluno'];


                    $sql_aluno = "INSERT INTO alunos (num_matricula_aluno, cpf_aluno, nome_aluno, sobrenome_aluno, rg_aluno, data_nascimento_aluno, endereco_aluno, endereco_numero_aluno, complemento_end_aluno, telefone_aluno, email_pessoal_aluno, email_educacional_aluno, senha_educacional_aluno) VALUES ('$num_matricula','$cpf_aluno', '$nome_aluno', '$sobrenome_aluno', '$rg_aluno', '$data_nascimento_aluno', '$endereco_aluno', '$numEndereco_aluno' , '$complemento_aluno', '$telefone_aluno', '$email_aluno', '$email_educacional', '$senha_educacional')";

                    //////////////////////// inserir na tabela PROFESSORES
                    if (mysqli_query($conect, $sql_aluno)) {
                        $turmaDoAluno = $_POST['turmaSelecionada_aluno'];
                        $divisaoNaTurma = $_POST['divisao_aluno'];

                        $sql_lista_alunos = "INSERT INTO lista_alunos (divisao, id_turma, id_aluno) VALUES ('$divisaoNaTurma','$turmaDoAluno', '$num_matricula')";
                        mysqli_query($conect, $sql_lista_alunos);
                    }
                }

                if ($identificadorDoFormulario === 'curso') {
                    $nome_curso = $_POST['nomeCurso_input'];
                    $carga_horaria = $_POST['cargaHorariaCurso_input'];
                    $capacidade = $_POST['capacidadeCurso_input'];
                    $categoria = $_POST['selectCategoria_curso'];
                    $custo = $_POST['custo_curso'];
            
                    $sql_curso = "INSERT INTO cursos ( nome_curso, carga_horaria_curso, valor_curso, capacidade, categoria) VALUES ( '$nome_curso', '$carga_horaria', '$custo', '$capacidade', '$categoria');";
                    mysqli_query($conect, $sql_curso);

                }

                if ($identificadorDoFormulario === 'disciplina') {
                    // inserindo dentro de disciplinas
                    $nomeUc_disciplina = $_POST['nomeUC_input'];
                    $cargaUc_disciplina = $_POST['cargaHorariaUC_INPUT'];
                    $areaVinculadaUc_disciplina = $_POST['areaVinculadaUC_input'];
                    $cursoSelecionado_disc = $_POST['cursoSelecionado_disciplina'];

                    $sql_disciplina = "INSERT INTO unidades_curriculares (nome_uc, carga_horariaUc, area_vinculadaUc) VALUES ( '$nomeUc_disciplina', '$cargaUc_disciplina', '$areaVinculadaUc_disciplina');";

                    //////////////////////// inserir na tabela PROFESSORES
                    if (mysqli_query($conect, $sql_disciplina)) {
                        // pego o ID recém inserido
                        $resultado_Id = mysqli_query($conect, "SELECT * FROM unidades_curriculares ORDER BY id_unid_curricular DESC LIMIT 1");
                        $row = mysqli_fetch_assoc($resultado_Id);

                        $id_uc_recente = $row["id_unid_curricular"];

                        $sql_curso_uc = "INSERT INTO lista_curso_uc (id_curso, id_unidade_curricular) VALUES ( '$cursoSelecionado_disc', '$id_uc_recente');";
                        mysqli_query($conect, $sql_curso_uc);
                    }
                }

                if ($identificadorDoFormulario === 'professor') {
                    // inserindo dentro de professores
                    $nome_professor = $_POST['nome_professor'];
                    $sobrenome_professor = $_POST['sobrenome_professor'];
                    $nif_professor = $_POST['nif_professor'];
                    $data_nascimento_prof = $_POST['dataNasc_prof'];
                    $endereco_prof = $_POST['endereco_prof'];
                    $num_prof = $_POST['num_prof'];
                    $complemento_prof = $_POST['complemento_prof'];
                    $formacao_prof = $_POST['formacao_prof'];
                    $email_prof = $_POST['email_prof'];
                    $telefone_prof = $_POST['telefone_prof'];
                    $email_educacional = $_POST['emailEd_prof'];
                    $senha_educacional = $_POST['senhaEd_prof'];


                    $sql_professor = "INSERT INTO professores (nif_professor, nome_professor, sobrenome_professor, data_nascimento_professor, endereco_professor, numero_end_professor, complemento_end_professor, telefone_professor, email_pessoal_professor, email_educacional_professor, senha_educacional_professor) VALUES ( '$nif_professor', '$nome_professor', '$sobrenome_professor', '$data_nascimento_prof', '$endereco_prof', '$num_prof', '$complemento_prof', '$telefone_prof', '$email_prof', '$email_educacional', '$senha_educacional');";

                    //////////////////////// inserir na tabela PROFESSORES
                    mysqli_query($conect, $sql_professor);
                }

                if ($identificadorDoFormulario === 'turma') {
                    $id_curso = $_POST['cursoSelecionado_turma'];
                    $periodo = $_POST['periodoSelecionado_turma'];

                    // inserindo dentro de turmas
                    $nome = $_POST['nome_turma'];
                    $inicio = $_POST['inicio_turma'];
                    $conclusao = $_POST['conclusao_turma'];
                    $totalAlunos = $_POST['totalAlunos_turma'];

                    $sql = "INSERT INTO turmas (id_curso, nome_turma, data_inicio_turma, periodo_turma, data_conclusao_turma, total_alunos) VALUES ('$id_curso', '$nome', '$inicio', '$periodo', '$conclusao', '$totalAlunos');";

                    //////////////////////// inserir na tabela associativa TURMAS
                    if (mysqli_query($conect, $sql)) {
                        // pego o ID recém inserido
                        $result = mysqli_query($conect, "SELECT * FROM turmas ORDER BY id_turma DESC LIMIT 1");
                        $linha = mysqli_fetch_assoc($result);



                        ///////////////////////////// PARA A LISTA ASSOCIATIVA lista_prof_turma //////////////////////////
                        if(isset($_POST['professores_selecionados'])){
                        //Atribuimos a variável todo conteúdo do índice
                        $professorChecado_check = $_POST['professores_selecionados'];

                        if ($professorChecado_check !== null)

                            for ($i = 0; $i < count($professorChecado_check); $i++)
                                $professorChecado_check[$i];

                        $professorEscolhido = $professorChecado_check[$i - 1];

                        // Exibe o ID da linha
                        $id_turma_recente = $linha["id_turma"];

                        $sql2 = "INSERT INTO lista_prof_turma (id_turma, nif_professor) VALUES ('$id_turma_recente', '$professorEscolhido');";

                        if (mysqli_query($conect, $sql2)) {
                            $disciplina = $_POST['selectDisciplinas_turma'];

                            $sql3 = "INSERT INTO lista_disc_prof (nif_professor, id_unidade_curricular) VALUES ('$professorEscolhido', '$disciplina');";

                            if(mysqli_query($conect, $sql3)){
                                echo 'foi';
                            }else{
                                echo 'não foi';
                            }
                        } else {
                            echo "Registro não realizado, a unidade curricular já tem um professor encarregado";
                        }
                    }else{
                    }
                    }
                }
            }
        }
        ?>


    <script>
    //////////////////////////associando uma uc a um professor
    var checkboxSelecionado_nif;

    function addProfessor() {
        var select = document.getElementById("professor");
        var cpf = select.value;
        var nome = select.options[select.selectedIndex].text;

        if (document.getElementById(cpf)) {
            Swal.fire({
                text: 'Você já adicionou esse professor!',
                icon: 'error',
                confirmButtonText: 'Entendi'
            });
            return;
        }

        var divCheckboxes = document.getElementById("escolha_prof_uc");
        var div = document.createElement('div')
        var label = document.createElement('label')
        var checkbox = document.createElement('input')
        checkbox.name = "professores_selecionados[]";
        checkbox.value = cpf;
        checkbox.type = 'checkbox';
        checkbox.id = cpf;
        label.htmlFor = cpf;
        label.appendChild(document.createTextNode(nome));

        div.classList.add('div');
        checkbox.classList.add('checkProfessores_turma');
        label.classList.add("label_prof_uc")



        divCheckboxes.appendChild(div)
        div.appendChild(checkbox)
        div.appendChild(label)




        // Desabilitar todos os checkboxes, exceto o que foi clicado
        var checkboxes = divCheckboxes.querySelectorAll('input[type="checkbox"]');

        checkboxes.forEach(function(chk) {
            chk.addEventListener('change', function() {
                if (chk.checked) {
                    checkboxes.forEach(function(chkInner) {
                        if (chkInner !== chk) {
                            chkInner.checked =
                                false; // Desmarca todos os outros checkboxes se o atual estiver marcado
                        }
                    });
                    checkboxSelecionado_nif = chk.id;
                }
                checkboxes.forEach(function(chkInner) {
                    if (chkInner !== chk) {
                        chkInner.disabled = chk
                            .checked; // Desabilita todos os outros checkboxes se o atual estiver marcado
                    }
                });
            });
        });


        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        Toast.fire({
            icon: 'success',
            title: 'Professor adicionado à turma com sucesso.'
        });
    }




    // PARA O AJAX - mantendo a página sem resetar ao associar uma unidade curricular a um professor
    document.getElementById("btn_add_profUc").addEventListener("click", function() {
        var id_unid_curricular = document.getElementById("unidade_curricular_select");
        var id_unid_curricular_selecionada = id_unid_curricular.options[id_unid_curricular
                .selectedIndex]
            .value;

        if (id_unid_curricular_selecionada && checkboxSelecionado_nif) {
            //envio em formato JSON para processar:
            var data = {
                origem: 'disc',
                id_unid_cur_selected: id_unid_curricular_selecionada,
                nif_professor: checkboxSelecionado_nif
            };

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "processoNovo.php", true);
            xhr.setRequestHeader("Content-type", "application/json");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            Swal.fire(
                                'Sucesso!',
                                'A matéria foi associada a um professor',
                                'success'
                            );
                        } else {
                            Swal.fire(
                                'Erro!',
                                'A unidade curricular já está associada a um professor',
                                'error'
                            );
                        }
                    } else {
                        alert("Ocorreu um erro ao processar a solicitação.");
                    }
                }
            };

            xhr.send(JSON.stringify(
                data)); //isso é o que define o formato que estarei enviando para processar
        } else {
            alert("Por favor, selecione um professor e uma unidade curricular.");
        }
    });



    /////////////// PARA DESATIVAR OS CHECKBOXES DA PARTE DE CURSO /////////////////////////////
    var checkboxesCategoria = document.querySelectorAll('.checkbox_categoria_curso');
    var divCategoriasCurso = document.getElementById("alinharOpCurso");

    checkboxesCategoria.forEach(function(chk) {
        chk.addEventListener('change', function() {
            if (chk.checked) {
                checkboxesCategoria.forEach(function(chkInner) {
                    if (chkInner !== chk) {
                        chkInner.checked = false;
                    }
                });
                divCategoriasCurso.value = chk.name;
            }
            checkboxesCategoria.forEach(function(chkInner) {
                if (chkInner !== chk) {
                    chkInner.disabled = chk.checked;
                }
            });
        });
    });




    function envioAJAX(formId) {
        if (formId === 'div_cadastroInfo_unidade_curricular') {
            var data = {
                origem: 'formulário padrão',
                nomeFormulario: "disciplina",
                nomeUc: document.getElementById("nomeUC_input").value,
                cargaHoraria: document.getElementById("cargaHorariaUC_INPUT").value
            };
        }

        if (formId === 'div_cadastroInfo_aluno') {
            var data = {
                origem: 'formulário padrão',
                nomeFormulario: "aluno",
                numero_matricula: document.getElementById("numMatricula_aluno").value,
                cpf: document.getElementById("cpf_aluno").value,
                rg: document.getElementById("rg_aluno").value
            };
        }

        if (formId === 'div_cadastroInfo_professor') {
            var data = {
                origem: 'formulário padrão',
                nomeFormulario: "professor",
                nif_professor: document.getElementById("nif_professor").value,
                email_pessoal_professor: document.getElementById("email_prof").value,
                email_educacional_professor: document.getElementById("emailEd_prof").value
            };
        }

        if (formId === 'div_cadastroInfo_curso') {
            document.getElementById("selectCategoria_curso").value = divCategoriasCurso.value;

            var data = {
                origem: 'formulário padrão',
                nomeFormulario: "curso",
                nome_curso: document.getElementById("nomeCurso_input").value,
                categoria: document.getElementById("selectCategoria_curso").value
            };
        }

        if (formId === 'div_cadastroInfo_turma') {
            //crio a condição que muda o value para que eu possa pegar o id do curso e do período selecionados no php depois
            document.getElementById("cursoSelecionado_turma").value = primeiroSelectTurma.value;
            document.getElementById("periodoSelecionado_turma").value = segundoSelectTurma
                .value;

            var data = {
                origem: 'formulário padrão',
                nomeFormulario: "turma",
                nomeTurma: document.getElementById("nome_turma").value,
                inicio_turma: document.getElementById("inicio_turma").value,
            };
        }

        if (formId === 'div_cadastroInfo_disc_curso') {
            var data = {
                origem: 'formulário padrão',
                nomeFormulario: "disc_curso",
                unidade_curricular: document.getElementById("unidCurr_selectDiscCurso").value,
                curso: document.getElementById("curso_selectDiscCurso").value,
            };
        }

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "processoNovo.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.sucesso_operacao) {
                        Swal.fire({
                            title: 'Deseja enviar o formulário?',
                            showDenyButton: true,
                            showCancelButton: true,
                            confirmButtonText: 'Enviar',
                            denyButtonText: `Não enviar`,
                            cancelButtonText: 'Cancelar',
                            // closeOnConfirm: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    title: 'Formulário enviado!',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        var form = document.getElementById(
                                            formId);
                                        form.submit();
                                        var formData = new FormData(form);
                                        var xhr = new XMLHttpRequest();
                                        xhr.open("POST",
                                            "processoNovo.php", true);
                                        xhr.onreadystatechange =
                                            function() {
                                                if (xhr.readyState === 4 &&
                                                    xhr.status ===
                                                    200) {

                                                }
                                            };
                                        xhr.send(formData);
                                    }
                                });
                            } else if (result.isDenied) {
                                Swal.fire('Mudanças não foram salvas', '', 'info')
                            }
                        })
                    } else {
                        alert("Valor já existente na tabela")
                    }
                } else {
                    alert("Ocorreu um erro ao processar a solicitação.");
                }
            }
        };

        xhr.send(JSON.stringify(
            data)); //isso é o que define o formato que estarei enviando para processar
    }












//  /////////////// APARECIMENTO OU SUMIÇO DOS SELECTS E DOS SELECTS SECUNDÁRIOS ///////////////////////
//  function someTudo() {
//     // ocultando todos os formulários
//     const formularios = document.querySelectorAll("form");

//     formularios.forEach(function(form) {
//         form.style.display = 'none'
//     });

//     //ocultando todos os selects secundários
//     const selectSecundarios = document.querySelectorAll(".select_secundario");

//     selectSecundarios.forEach(function(select) {
//         select.style.display = 'none'
//     });
// }






    //deixei fora das condições para eu poder pegar o value
    var primeiroSelectTurma;
    var segundoSelectTurma;
    var segundoSelectDisciplina = document.getElementById("cursoSelecionado_disciplina");
    var segundoSelectAluno = document.getElementById("turmaSelecionada_aluno");

   

//     document.addEventListener("DOMContentLoaded", function() {
// console.log("foi");
// });
//     window.onload = function() {
//         console.log("carregou");

// };
    document.addEventListener("DOMContentLoaded", function() {
        console.log("foi")
        const selectOpcao = document.getElementById("selecionarOpcao").value;

        selectOpcao.addEventListener("change", function() {
            console.log("Seleção no primeiro select: " + selectOpcao);

            // Para que não corra o risco de duplicar o select ao sair e voltar para um select primário
            const todosSelects = document.querySelectorAll(".select_secundario");
            todosSelects.forEach(function(select) {
                select.style.display = 'none';
            });

            if (selectOpcao.value !== "") {
                para poder apagar os formulários toda vez que o primeiro select for selecionado
                var informacoesCategoria2_cadastroInfo = document.querySelectorAll(
                    ".divCategoria2_naoVisivel"
                );
                informacoesCategoria2_cadastroInfo.forEach(function(div) {
                    div.style.display = "none";
                    div.style.width = "60%";
                });

                if (selectOpcao.value !== "curso" && selectOpcao.value !==
                    "professor" &&
                    selectOpcao.value !== "turma" &&
                    selectOpcao.value !== "disc_curso") {
                    var segundaOpcao = document.getElementById("selecionarOpcao_" +
                        selectOpcao
                        .value);
                    segundaOpcao.style.display = "block";

                    segundaOpcao.addEventListener("change", function() {
                        document.getElementById("div_cadastroInfo_" +
                                selectOpcao.value)
                            .style.display = "block"
                    });
                }

                if (selectOpcao.value === "unidade_curricular") {
                    console.log(selectOpcao.value)
                    var segundaOpcao = document.getElementById("selecionarOpcao_" +
                        selectOpcao
                        .value);
                    segundaOpcao.style.display = "block";


                    segundaOpcao.addEventListener("change", function() {
                        segundoSelectDisciplina.value = segundaOpcao.value;
                    });
                }

                if (selectOpcao.value === "aluno") {
                    segundaOpcao.addEventListener("change", function() {
                        segundoSelectAluno.value = segundaOpcao.value;
                    });
                }

                if (selectOpcao.value === "disc_curso") {
                    document.getElementById("div_cadastroInfo_" + selectOpcao.value).style.display =
                        "block"
                }

                if (selectOpcao.value === "curso" || selectOpcao.value ===
                    "professor") {
                    document.getElementById("div_cadastroInfo_" + selectOpcao.value)
                        .style.display =
                        "block"
                }

                if (selectOpcao.value === "turma") {
                    primeiroSelectTurma = document.getElementById(
                        "selecionarOpcao_turma");
                    primeiroSelectTurma.style.display = "block"

                    if (primeiroSelectTurma !== "") {
                        primeiroSelectTurma.addEventListener("change", function() {
                            segundoSelectTurma = document.getElementById(
                                "selecionarOpcao_turma2");
                            segundoSelectTurma.style.display = "block";

                            segundoSelectTurma.addEventListener("change",
                                function() {
                                    document.getElementById(
                                            "div_cadastroInfo_" +
                                            selectOpcao.value).style
                                        .display = "block"
                                });
                        });
                    }
                }
            }
        });
    });
    /////////////// FIM DO JS RELACIONADO AO APARECIMENTO OU SUMIÇO DOS SELECTS E DOS SELECTS SECUNDÁRIOS ///////////////////////
    </script>
</body>