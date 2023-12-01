<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="./css/style.css">
    <style>
    #tituloCriterios {
        font-family: var(--fontes-de-titulo);
        font-weight: bold;
    }

    #divTitulo_criterios {
        padding: 5%;
    }

    #tipoCriterio_label {
        display: none;
    }

    #testeHr {
        background-color: var(--verde);
        color: var(--verde);
        height: 2px;
    }

    #conteudoPrincipal_criterios {
        padding: 5%;
    }

    #cursoForm {
        display: flex;
        flex-direction: column;
        width: 50%;
    }

    .caixaSelectBtn_cursoCriterios {
        display: flex;
        align-items: center;
        gap: 10%;
    }

    .btnConfirma_criterios {
        background-color: var(--verde);
        border: none;
        align-items: center;
        border-radius: 20px;
        display: flex;
        height: 3vh;
        max-width: max-content;
        padding-left: 5%;
        padding-right: 5%;
    }

    .simboloConfirmaCurso_criterios {
        color: #f5f5f5;
        font-size: 2.5vh;
    }

    #ucForm {
        display: flex;
        flex-direction: column;
        width: 40vw;
    }

    .selects_criterios {
        background-color: var(--amarelo);
        border: none;
        border-radius: 100px;
        padding: 3%;
    }

    .btnCrit_Dese_criterios {
        border-radius: 100px;
        padding: 1vh;
        border: none;
        font-family: var(--fontes-de-texto);
        font-weight: bold;
    }

    #semestre {
        width: 40vw;
    }

    #botoes {
        margin-top: 5%;
    }

    #quantidade {
        display: flex;
        flex-direction: column;
        margin-top: 5%
    }

    #qntCriterios_row {
        display: flex;
        width: 70%;
        align-items: center;
    }

    #qtdCrit {
        width: 90%;
    }

    #semestresTeste {
        display: flex;
        align-items: center;
    }

    #disc_uc_criterios {
        display: flex;
        width: 100%;
    }

    #objetivoCaixa {
        background-color: #ffff;
        margin-top: 5%;
        font-family: var(--fontes-de-texto);
    }

    #objetivoCaixa label {
        padding: 5%;
    }

    #textoObjetivo {
        width: 100%
    }

    #divBtnCadastro_criterios {
        display: flex;
        justify-content: flex-end;
        width: 100%;
        margin-top: 2%;
    }

    #btnCadastro_criterios {
        background-color: var(--bordo);
        font-family: var(--fontes-de-texto);
        color: var(--background-color-branco);
        font-weight: bold;
        border: none;
        padding: 1vh;
    }

    @media (max-width: 600px) {
        #divTitulo_criterios {
            padding-top: 15%;
        }
    }
    </style>
    <title>Inserção de critérios</title>
</head>

<body>
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
                    <br>
                    <li><a class="header-item" href="index.html">Home</a></li><br>
                    <hr>
                    <br>
                    <li> <a class="header-item" href="products.html">Perfil</a></li><br>
                    <hr>
                    <br>
                    <li><a class="header-item" href="aboutus.html">Funcionalidades</a></li> <br>
                    <hr>
                </ul>
            </nav>
        </div>
        <div class="div-cabecalho" id="modo-mobilee">
            <a href="https://www.flaticon.com/br/icones-gratis/perfil"
                title="Perfil ícones criados por inkubators - Flaticon" id="icone-perfil">
                <img src="./img/perfil-de-usuario.png" />
            </a>
            <a href="https://www.flaticon.com/br/icones-gratis/engrenagem"
                title="Engrenagem ícones criados por Freepik - Flaticon" id="icone-engrenagem"> <img
                    src="./img/engrenagem.png" />
            </a>
        </div>
    </header>

    <main>
        <div id="divTitulo_criterios">
            <h2 id="tituloCriterios">CRITÉRIOS</h2>
            <h5>Registre os critérios para avaliação</h5>
            <hr id="testeHr">
        </div>

        <div id="conteudoPrincipal_criterios">
            <?php
            $conn = new mysqli("localhost", "root", "", "senai117_bd");

            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

                $result_cursos = $conn->query("SELECT id_curso, nome_curso FROM cursos");
            ?>

            <form id="cursoForm" method="post" action="">
                <label for="curso">Curso:</label>
                <div class="caixaSelectBtn_cursoCriterios">
                    <select id="curso" class="selects_criterios" name="curso">
                        <?php
            while ($row_curso = $result_cursos->fetch_assoc()) {
                $selected = (isset($_POST['curso']) && $_POST['curso'] == $row_curso['id_curso']) ? 'selected' : '';
                echo "<option value='" . $row_curso['id_curso'] . "' $selected>" . $row_curso['nome_curso'] . "</option>";
            }
            ?>
                    </select>
                    <button type="submit" name="submitCurso" class="btnConfirma_criterios"><span
                            class="material-symbols-outlined simboloConfirmaCurso_criterios">
                            done</span></button>
                </div>
            </form>

            <?php
                if (isset($_POST['submitCurso'])) {
                $curso_id = $_POST['curso'];
                $result_uc = $conn->query("SELECT DISTINCT unidades_curriculares.id_unid_curricular, unidades_curriculares.nome_uc FROM lista_curso_uc INNER JOIN unidades_curriculares ON lista_curso_uc.id_unidade_curricular = unidades_curriculares.id_unid_curricular WHERE id_curso = $curso_id");
                echo "<div id='disc_uc_criterios'";
                // class='
                
            // Verificar se há mais de um semestre para a unidade curricular
                $semestre_query = $conn->query("SELECT DISTINCT semestre_uc FROM lista_curso_uc WHERE id_curso = $curso_id");
                $semestres_disponiveis = array();
                while ($semestre_row = $semestre_query->fetch_assoc()) {
                    $semestres_disponiveis[] = $semestre_row['semestre_uc'];
                }

                // Definir a classe com base nas condições
                $container_class = (count($semestres_disponiveis) > 1) ? 'flex_rowSemestre flexSemestre' : 'flex flex-column';

                echo "<div id='disc_uc_criterios' class='$container_class'>";
                echo "<div id='Teste'>";
                echo "<form id='ucForm'>";
                echo "<label for='uc'>Disciplina:</label>";
                echo "<select id='uc' class='selects_criterios' name='uc'>";
                while ($row_uc = $result_uc->fetch_assoc()) {
                    echo "<option value='" . $row_uc['id_unid_curricular'] . "'>" . $row_uc['nome_uc'] . "</option>";
                }
                echo "</select>";
                echo "</div>";

                if (count($semestres_disponiveis) > 1) {
                    echo "<div id='semestres'>";
                    echo "<label for='semestre'>Semestre:</label>";
                    echo "<div id='semestresTeste'>";
                    echo "<select class='selects_criterios' id='semestre' name='semestre'>";
                    foreach ($semestres_disponiveis as $semestre) {
                        echo "<option value='$semestre'>$semestre</option>";
                    }
                    echo "</select>";
                    echo "</div>";
                    echo "</div>";
                }

                echo "<button type='button' onclick='mostrarBotoes_criterios()' class='btnConfirma_criterios'><span class='material-symbols-outlined simboloConfirmaCurso_criterios' class='material-symbols-outlined'>done</span></button>";
                echo "</form>";
                echo "</div>";
                }
            ?>

            <div id='botoes' style='display: none;'>
                <button type='button' id="Crítico" class="btnCrit_Dese_criterios"
                    onclick='mostrarCaixaObjetivo("Crítico", "Desejável")'>Crítico</button>
                <button type='button' id="Desejável" class="btnCrit_Dese_criterios"
                    onclick='mostrarCaixaObjetivo("Desejável", "Crítico")'>Desejável</button>
            </div>

            <div id='quantidade' style='display: none;'>
                <label for='qtdCrit'>Quantidade de Critérios:</label>
                <div id="qntCriterios_row">
                    <input type='number' id='qtdCrit' name='qtdCrit' min='1' max='15'>
                    <button type='button' class='btnConfirma_criterios' onclick='mostrarQtdCaixaObjetivo_criterios()'><span
                            class='material-symbols-outlined simboloConfirmaCurso_criterios'
                            class='material-symbols-outlined'>
                            done</span></button>
                </div>
            </div>

            <div id='objetivo' style='display: none;'>

                <div id='objetivoCaixa' style=''>
                    <label for='textoObjetivo'>Objetivo do Critério:</label>
                    <textarea id='textoObjetivo' name='textoObjetivo'></textarea>
                </div>
                <div id="divBtnCadastro_criterios">
                    <button type='button' id="btnCadastro_criterios" onclick='enviarParaBanco_criterios()'>Enviar</button>
                </div>
            </div>
        </div>
    </main>

    <script src="./script/scriptCriterios.js"></script>

    <script>
    const btnMobile = document.getElementById('btn-mobile');

    function toggleMenu(event) {
        if (event.type === 'touchstart') event.preventDefault();
        const nav = document.getElementById('nav-menu-hamburguer');
        nav.classList.toggle('active');
        const active = nav.classList.contains('active');
        event.currentTarget.setAttribute('aria-expanded', active);
        if (active) {
            event.currentTarget.setAttribute('aria-label', 'Fechar Menu');
        } else {
            event.currentTarget.setAttribute('aria-label', 'Abrir Menu');
        }
    }

    btnMobile.addEventListener('click', toggleMenu);
    btnMobile.addEventListener('touchstart', toggleMenu);
    </script>

</body>

</html>