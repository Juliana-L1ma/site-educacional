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
    $matricula = $_POST['matricula'];

    $sql = "UPDATE alunos SET $coluna = '$valor' WHERE num_matricula_aluno = '$matricula'";

    if ($conn->query($sql) === TRUE) {
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
            echo "<th>Endereço</th>";
            echo "<th>Telefone</th>";

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
                    echo "<td class='attEndAluno'>" . $row["endereco_aluno"] . "</td>";
                    echo "<td class='attTelAluno'>" . $row["telefone_aluno"] . "</td>";
                    // Adicione outras colunas conforme necessário
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>

    <script src="atualizarDados.js"></script>

</body>

</html>