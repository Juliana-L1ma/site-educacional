<?php
require_once("conexao.php"); // Arquivo de conexão com o banco de dados
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css">
    <title>Atualizar informações</title>
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
                    <br />
                    <li><a class="header-item" href="index.html">Home</a></li>
                    <br />
                    <hr />
                    <br />
                    <li><a class="header-item" href="products.html">Perfil</a></li>
                    <br />
                    <hr />
                    <br />
                    <li>
                        <a class="header-item" href="aboutus.html">Funcionalidades</a>
                    </li>
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
    <div id="mainAtt">
        <h1 id="textoAtt">Atualizar</h1>
        <h2>Gerencie com segurança</h2>
        <div id="linhaAtt"></div>
    </div>
    <main id="alinhando">
        <div id="areaAtt" class="geralAtt">
            <p>Selecione a categoria para atualizar</p>
            <form method="POST" id="formm">
                <select class="form-control" name="nome_tabela" id="categoriaAtt">
                    <?php
                    // Defina o mapeamento de nomes de tabelas preferidos
                    $tabelasMapeadas = array(
                        "administrador" => "",
                        "alunos" => "Alunos",
                        "cursos" => "Cursos",
                        "unidades_curriculares" => "Disciplinas",
                        "professores" => "Professores",
                        "turmas" => "Turmas"
                    );

                    $sql = "SHOW TABLES FROM senai117_bd";
                    $resultado = mysqli_query($conn, $sql);

                    if (!$resultado) {
                        // Tratar erros de consulta, se houverem
                        echo "Erro na consulta: " . mysqli_error($conn);
                    } else {
                        while ($row = mysqli_fetch_row($resultado)) {
                            $nomeTabela = $row[0];
                            // Verifique se a tabela está no mapeamento
                            if (array_key_exists($nomeTabela, $tabelasMapeadas)) {
                                // Use o nome preferido ao exibir a opção
                                echo '<option value="' . $nomeTabela . '">' . $tabelasMapeadas[$nomeTabela] . '</option>';
                            }
                        }
                    }
                    ?>
                </select>
        </div>
            <div class="tabelaAtt">
                <table id="tabelaAtt">
                    <?php
                    // Verificar se o formulário foi enviado
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $nome_tabela = $_POST["nome_tabela"];

                        if ($nome_tabela === "alunos") {
                            $sql = "SELECT * FROM alunos";
                            $result = $conn->query($sql);
                            echo "<nav>
                <h2>Alunos</h2>
            </div>
            </nav>";
                            echo "<th>Matrícula</th>";
                            echo "<th>Nome</th>";
                            echo "<th>Sobrenome</th>";
                            echo "<th>RG</th>";
                            echo "<th>CPF</th>";
                            echo "<th>Data de Nascimento</th>";
                            echo "<th>Telefone</th>";
                            echo "<th>Endereço</th>";
                            echo "<th>Número</th>";
                            echo "<th>Complemento</th>";
                            echo "<th>E-mail</th>";
                            echo "<th>E-mail Educacional</th>";
                            echo "<th>Senha Educacional</th>";


                            if ($result->num_rows > 0) {
                                // Loop através dos resultados e exibe cada aluno na tabela
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["num_matricula_aluno"] . "</td>";
                                    echo "<td class='attNomeAluno'>" . $row["nome_aluno"] . "</td>";
                                    echo "<td class='attSobAluno'>" . $row["sobrenome_aluno"] . "</td>";
                                    echo "<td class='attRgAluno'>" . $row["rg_aluno"] . "</td>";
                                    echo "<td class='attCpfAluno'>" . $row["cpf_aluno"] . "</td>";
                                    echo "<td class='attNascAluno'>" . $row["data_nascimento_aluno"] . "</td>";
                                    echo "<td class='attTelAluno'>" . $row["telefone_aluno"] . "</td>";
                                    echo "<td class='attEndAluno'>" . $row["endereco_aluno"] . "</td>";
                                    echo "<td class='attNumAluno'>" . $row["endereco_numero_aluno"] . "</td>";
                                    echo "<td class='attCompAluno'>" . $row["complemento_end_aluno"] . "</td>";
                                    echo "<td class='attEmailAluno'>" . $row["email_pessoal_aluno"] . "</td>";
                                    echo "<td class='attEmailEdAluno'>" . $row["email_educacional_aluno"] . "</td>";
                                    echo "<td class='attSenhaEdAluno'>" . $row["senha_educacional_aluno"] . "</td>";
                                    echo "</tr>";
                                }
                            }
                        }
                    }
                    ?>
                </table>
            </div>
            <div id="envioAtt">
                <input id="botaoEnvioAtt" type="submit" value="">
            </div>
            </form>
        </div>
        <div id="resposta"></div>
    </main>
    <footer class="footer-professor-adm">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <p class="tituloRodape">Site SENAI oficial:</p>
                    <hr>
                    <p class="textoRodape">Acesse o site oficial do SENAI para ver outras informações <a
                            href="https://www.sp.senai.br/">Clique aqui</a></p>
                </div>
                <div class="col-6">
                    <div class="contatos">
                        <p class="tituloRodape">Contatos</p>
                        <hr>
                        <p class="textoRodape">
                            <a href="mailto:beatriz.britofer@gmail.com">Enviar email para Beatriz Brito</a><br>
                            <a href="mailto:evelynvic23toria10@gmail.com">Enviar email para Evelyn Victória</a><br>
                            <a href="mailto:jp6001707@gmail.com">Enviar email para Juliana Lima</a><br>
                            <a href="mailto:trinitynascimento@gmail.com">Enviar email para Trinity Domingues</a><br>
                            <br>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="direitosAutorais">
                        Copyright 2023 - Beatriz Brito, Evelyn Victória Santos, Juliana Lima e Trinity Nascimento<br>
                        Esse site foi produzido pelas alunas citadas acima no curso de Desenvolvimento de Sistemas do
                        Senai "Nami
                        Jafet" para uso escolar e administrativo
                    </p>

                </div>
            </div>
        </div>
    </footer>
    <script src="atualizarDados.js"></script>

</body>
</html>
<?php
// Fechar a conexão com o banco de dados
mysqli_close($conn);
?>