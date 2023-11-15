<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "senai117_bd";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falha!" . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $coluna = $_POST['coluna'];
    $valor = $_POST['valor'];
    $nif = $_POST['nif'];
    $matricula = $_POST['matricula'];

    // Use uma consulta condicional para atualizar em ambas as tabelas
    $sql = "UPDATE alunos SET $coluna = '$valor' WHERE num_matricula_aluno = '$matricula';";
    $sql .= "UPDATE professores SET $coluna = '$valor' WHERE nif_professor = '$nif';";

    if ($conn->multi_query($sql) === TRUE) {
        echo "Atualização realizada com sucesso!";
    } else {
        echo "Erro na atualização: " . $conn->error;
    }

    header("Refresh:1; url = atualizar.php");
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Atualizar dados</title>
    <style>
        table,
        tr {
            border-collapse: collapse;
            border: 1px solid #000;
        }

        .tabelaAtt {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        table td {
            cursor: pointer;
            transition: 300ms;
        }

        td:hover {
            transition: 500ms;
            background-color: #d9dedb;
        }

        #swal2-html-container {
            color: #fff;
        }
    </style>
</head>
<br><br>

<body>
    <!-- TABELA ALUNOS -->
    <div class="tabelaAtt">
        <table cellpadding="6">
            <?php
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
            ?>
        </table>
        <br>
        <!-- TABELA PROFESSORES -->
        <table cellpadding="6">
            <?php
            $sql = "SELECT * FROM professores";
            $result = $conn->query($sql);
            echo "<nav>
        <h2>Professores</h2>
    </div>
    </nav>";
            echo "<th>NIF</th>";
            echo "<th>Nome</th>";
            echo "<th>Sobrenome</th>";
            echo "<th>RG</th>";
            echo "<th>Data de Nascimento</th>";
            echo "<th>Endereço</th>";
            echo "<th>Número</th>";
            echo "<th>Complemento</th>";
            echo "<th>Telefone</th>";
            echo "<th>Email</th>";
            echo "<th>Email Educacional</th>";
            echo "<th>Senha Educacional</th>";

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["nif_professor"] . "</td>";
                    echo "<td class='attNomeProfessor'>" . $row["nome_professor"] . "</td>";
                    echo "<td class='attSobProfessor'>" . $row["sobrenome_professor"] . "</td>";
                    echo "<td class='attRgProfessor'>" . $row["rg_professor"] . "</td>";
                    echo "<td class='attNascProfessor'>" . $row["data_nascimento_professor"] . "</td>";
                    echo "<td class='attEndProfessor'>" . $row["endereco_professor"] . "</td>";
                    echo "<td class='attNumeroProfessor'>" . $row["numero_end_professor"] . "</td>";
                    echo "<td class='attCompProfessor'>" . $row["complemento_end_professor"] . "</td>";
                    echo "<td class='attTelProfessor'>" . $row["telefone_professor"] . "</td>";
                    echo "<td class='attEmailProfessor'>" . $row["email_pessoal_professor"] . "</td>";
                    echo "<td class='attEmailEdProfessor'>" . $row["email_educacional_professor"] . "</td>";
                    echo "<td class='attSenhaEdProfessor'>" . $row["senha_educacional_professor"] . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
        <br>
        <!-- TABELA TURMAS -->
        <table cellpadding="6">
            <?php
            $sql = "SELECT * FROM turmas";
            $result = $conn->query($sql);
            echo "<nav>
        <h2>Turmas</h2>
    </div>
    </nav>";
            echo "<th>Turma</th>";
            echo "<th>Alunos</th>";
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='attNomeTurma'>" . $row["nome_turma"] . "</td>";
                    echo "<td class='attTotalAluno'>" . $row["total_alunos"] . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
        <br>
        <!-- TABELA DISCIPLINAS-->
        <table cellpadding="6">
            <?php
            $sql = "SELECT * FROM unidades_curriculares";
            $result = $conn->query($sql);
            echo "<nav>
        <h2>Disciplinas</h2>
    </div>
    </nav>";
            echo "<th>Disciplina</th>";
            echo "<th>Carga Horária</th>";
            echo "<th>Área Vinculada</th></th>";
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='attNomeUc'>" . $row["nome_uc"] . "</td>";
                    echo "<td class='attCargaHoraria'>" . $row["carga_horaria"] . "</td>";
                    echo "<td class='attAreaVinculada'>" . $row["area_vinculada"] . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
        <br><br>
        <!-- TABELA DISCIPLINAS PROFESSORES-->
        <table cellpadding="6">
            <?php
            $sql = "SELECT * FROM lista_disc_prof";
            $result = $conn->query($sql);
            echo "<nav>
        <h2>Professores e Disciplina</h2>
    </div>
    </nav>";
            echo "<th>NIF</th>";
            echo "<th>ID Disciplina</th>";
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='attNomeProf'>" . $row["nif_professor"] . "</td>";
                    echo "<td class='attUc'>" . $row["id_unidade_curricular"] . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
        <br><br>
        <!-- TABELA DE PROFESSORES DA TURMA-->
        <table cellpadding="6">
            <?php
            $sql = "SELECT * FROM lista_prof_turma";
            $result = $conn->query($sql);
            echo "<nav>
        <h2>Professores da Turma</h2>
    </div>
    </nav>";
            echo "<th>ID Turma</th>";
            echo "<th>NIF</th>";
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='attTurma'>" . $row["id_turma"] . "</td>";
                    echo "<td class='attProf'>" . $row["nif_professor"] . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
        <br><br>
        <!-- TABELA DISCIPLINAS LECIONADAS NA TURMA-->
        <table cellpadding="6">
            <?php
            $sql = "SELECT * FROM lista_turma_uc";
            $result = $conn->query($sql);
            echo "<nav>
        <h2>Disciplinas da Turma</h2>
    </div>
    </nav>";
            echo "<th>ID Disciplina</th>";
            echo "<th>ID Turma</th>";
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='attUc'>" . $row["id_unidade_curricular"] . "</td>";
                    echo "<td class='attTurma'>" . $row["id_turma"] . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
        <br>
    </div>
    <script src="atualizarDados.js"></script>
</body>
</html>
