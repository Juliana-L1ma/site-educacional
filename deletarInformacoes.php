<?php
require_once("conexao.php"); // Arquivo de conexão com o banco de dados

//CONDIÇÃO ALUNO
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['num_matricula_aluno'])) {
    $id = $_POST['num_matricula_aluno'];
    // Exclusão em cascata para manter a integridade referencial
    //Alunos
    $sql_delete_boletim = "DELETE FROM boletim WHERE id_aluno = '$id'";
    $sql_delete_lista_alunos = "DELETE FROM lista_alunos WHERE id_aluno = '$id'";
    $sql_delete_alunos = "DELETE FROM alunos WHERE num_matricula_aluno = '$id'";

    //Executando as exclusões em ordem: boletim, lista_alunos e depois alunos
    if (
      $conn->query($sql_delete_boletim) === TRUE &&
      $conn->query($sql_delete_lista_alunos) === TRUE &&
      $conn->query($sql_delete_alunos) === TRUE
    ) {
      echo "success";
    } else {
      echo "error";
    }
  }

  //CONDIÇÃO PROFESSOR
  if (isset($_POST['nif_professor'])) {
    $idProfessor = $_POST['nif_professor'];

    //Professores
    $sql_delete_professor = "DELETE FROM professores WHERE nif_professor = $idProfessor";
    $sql_delete_listaProTurma = "DELETE FROM lista_prof_turma WHERE nif_professor = $idProfessor";
    $sql_delete_listaDiscProf = "DELETE FROM lista_disc_prof WHERE nif_professor = $idProfessor";

    if (
      $conn->query($sql_delete_listaDiscProf) === TRUE &&
      $conn->query($sql_delete_listaProTurma) === TRUE &&
      $conn->query($sql_delete_professor) === TRUE
    ) {
      echo "success";
    } else {
      echo "error";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/style.css">
  <title>Deletar informações</title>
  <script>
    //EXCLUIR ALUNO
    $(document).ready(function () {
      $('.btn-excluir-aluno').click(function () {
        var num_matricula_aluno = $(this).closest('tr').find('td:first').text();
        var row = $(this).closest('tr');

        $.ajax({
          type: "POST",
          url: "deletarDados.php",
          data: { num_matricula_aluno: num_matricula_aluno },
          success: function (response) {
            if (response.trim() === "success") {
              row.remove();
              Swal.fire('Sucesso', 'Aluno excluído com sucesso!', 'success');
            } else {
              Swal.fire('Erro', 'Falha ao excluir aluno.', 'error');
            }
          }
        });
      });
    });

    //EXCLUIR PROFESSORES
    $(document).ready(function (e) {
      $('.btn-excluir-professor').click(function () {
        var nif_professor = $(this).closest('tr').find('td:first').text();
        var row = $(this).closest('tr');

        $.ajax({
          type: "POST",
          url: "deletarDados.php",
          data: { nif_professor: nif_professor },
          success: function (response) {
            if (response.trim() === "success") {
              row.remove();
              Swal.fire('Sucesso', 'Curso excluído com sucesso!', 'success');
            } else {
              Swal.fire('Erro', 'Falha ao excluir curso.', 'error');
            }
          }
        });
      });
    });

  </script>
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
        <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
          <span id="hamburger">
            <img src="./img/barra-de-menu.png" alt="Menu aberto ícones criados por verry purnomo - Flaticon" />
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
      <a href="https://www.flaticon.com/br/icones-gratis/perfil" title="Perfil ícones criados por inkubators - Flaticon"
        id="icone-perfil">
        <img src="./img/perfil-de-usuario.png" />
      </a>
      <a href="https://www.flaticon.com/br/icones-gratis/engrenagem"
        title="Engrenagem ícones criados por Freepik - Flaticon" id="icone-engrenagem">
        <img src="./img/engrenagem.png" />
      </a>
    </div>
  </header>
  <div id="mainAtt">
    <h1 id="textoAtt">Deletar</h1>
    <h2>Gerencie com segurança</h2>
    <div id="linhaAtt"></div>
  </div>
  <main id="alinhando">
    <div id="areaAtt" class="geralAtt">
      <p>Selecione a categoria para deletar</p>
      <form method="POST" id="formm">
        <select class="form-control" name="nome_tabela" id="categoriaAtt">
          <?php
          // Defina o mapeamento de nomes de tabelas preferidos
          $tabelasMapeadas = array(
            "administrador" => "",
            "alunos" => "Alunos",
            "unidades_curriculares" => "Disciplinas",
            "professores" => "Professores",
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

            echo '<th scope="col">Matrícula</th>';
            echo '<th scope="col">Nome</th>';
            echo '<th scope="col">Sobrenome</th>';
            echo '<th scope="col">RG</th>';
            echo '<th scope="col">CPF</th>';
            echo '<th scope="col">Data de nascimento</th>';
            echo '<th scope="col">Endereço</th>';
            echo '<th scope="col">Telefone</th>';

            $sql = "SELECT * FROM alunos";
            $result = $conn->query($sql); // Execute a consulta SQL
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["num_matricula_aluno"] . "</td>";
                echo "<td>" . $row["nome_aluno"] . "</td>";
                echo "<td>" . $row["sobrenome_aluno"] . "</td>";
                echo "<td>" . $row["rg_aluno"] . "</td>";
                echo "<td>" . $row["cpf_aluno"] . "</td>";
                echo "<td>" . $row["data_nascimento_aluno"] . "</td>";
                echo "<td>" . $row["endereco_aluno"] . "</td>";
                echo "<td>" . $row["telefone_aluno"] . "</td>";
                echo "<td><button class='btn-excluir-aluno'>Excluir</button></td>"; // Adicionando uma classe ao botão de exclusão
                echo "</tr>";
              }
            }
          }
          if ($nome_tabela === "professores") {
            echo '<th scope="col">NIF</th>';
            echo '<th scope="col">Nome</th>';
            echo '<th scope="col">Sobrenome</th>';
            echo '<th scope="col">RG</th>';
            echo '<th scope="col"></th>';
  
            $sql = "SELECT * FROM professores";
            $result = $conn->query($sql); // Execute a consulta SQL
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["nif_professor"] . "</td>";
                echo "<td>" . $row["nome_professor"] . "</td>";
                echo "<td>" . $row["sobrenome_professor"] . "h</td>";
                echo "<td><button class='btn-excluir-professor'>Excluir</button></td>"; // Adicionando uma classe ao botão de exclusão
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='3'>Nenhum registro encontrado.</td></tr>";
            }
          }
        }
        ?>
        </thead>
      </table>
      <div id="alinhaDel">
        <button type="submit" id="btnPesquisar"></button>
      </div>
      </footer>
</body>

</html>
<?php
// Fechar a conexão com o banco de dados
mysqli_close($conn);
?>