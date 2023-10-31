<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "senai117_bd";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Conexão falha!" . $conn->connect_error);
}
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
  //CONDIÇÃO CURSO
  if (isset($_POST['id_curso'])) {
    $idCurso = $_POST['id_curso'];
    $idTurma = $_POST['id_turma'];

    //Cursos
    $sql_delete_cursos = "DELETE FROM cursos WHERE id_curso = $idCurso";
    $sql_delete_turmas = "DELETE FROM turmas WHERE id_curso = $idCurso";
    $sql_delete_boletimC = "DELETE FROM boletim WHERE id_turma = '$idTurma'";
    $sql_delete_listaProfTurma = "DELETE FROM lista_prof_turma WHERE id_turma = '$idTurma'";
    $sql_delete_listaAlunos = "DELETE FROM lista_alunos WHERE id_turma = '$idTurma'";
    $sql_delete_listaTurmaUc = "DELETE FROM lista_turma_uc WHERE id_turma = '$idTurma'";

    //Executando as exclusões em ordem: curso, turma, boletim, lista de professores por turma, lista de alunos e lista de unidades curriculares por turma.
    if (
      $conn->query($sql_delete_listaTurmaUc) === TRUE &&
      $conn->query($sql_delete_boletimC) === TRUE &&
      $conn->query($sql_delete_listaAlunos) === TRUE &&
      $conn->query($sql_delete_listaProfTurma) === TRUE &&
      $conn->query($sql_delete_turmas) === TRUE &&
      $conn->query($sql_delete_cursos) === TRUE
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
  //CONDIÇÃO TURMAS
  if (isset($_POST['id_turma'])) {
    $idTurmas = $_POST['id_turma'];

    $sql_delete_turma = "DELETE FROM turmas WHERE id_turma = $idTurmas";
    $sql_delete_boletins = "DELETE FROM boletim WHERE id_turma = $idTurmas";
    $sql_delete_listasProfTurma = "DELETE FROM lista_prof_turma WHERE id_turma = $idTurmas";
    $sql_delete_listasAluno = "DELETE FROM lista_alunos WHERE id_turma = $idTurmas";
    $sql_delete_listasTurmasUc = "DELETE FROM lista_turma_uc WHERE id_turma = $idTurmas";

    if (
      $conn->query($sql_delete_listasTurmasUc) === TRUE &&
      $conn->query($sql_delete_listasAluno) === TRUE &&
      $conn->query($sql_delete_listasProfTurma) === TRUE &&
      $conn->query($sql_delete_boletins) === TRUE &&
      $conn->query($sql_delete_turma) === TRUE
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
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <title>Deletar Dados</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    //EXCLUIR ALUNO
    $(document).ready(function () {
      $('.btn-excluir-aluno').click(function () {
        var num_matricula_aluno = $(this).closest('tr').find('td:first').text();
        var row = $(this).closest('tr');

        $.ajax({
          type: "POST",
          url: "deletar.php",
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
    // EXCLUIR CURSO
    $(document).ready(function () {
      $('.btn-excluir-curso').click(function () {
        var id_curso = $(this).closest('tr').find('td:first').text();
        var row = $(this).closest('tr');

        $.ajax({
          type: "POST",
          url: "deletar.php",
          data: { id_curso: id_curso },
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

    //EXCLUIR PROFESSORES
    $(document).ready(function () {
      $('.btn-excluir-professor').click(function () {
        var nif_professor = $(this).closest('tr').find('td:first').text();
        var row = $(this).closest('tr');

        $.ajax({
          type: "POST",
          url: "deletar.php",
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
    //EXCLUIR TURMAS
    $(document).ready(function () {
    $('.btn-excluir-turmas').click(function () {
      var id_turma = $(this).closest('tr').find('td:first').text();
      var row = $(this).closest('tr');

      $.ajax({
        type: "POST",
        url: "deletar.php",
        data: { id_turma: id_turma },
        success: function (response) {
          if (response.trim() === "success") {
            row.remove();
            Swal.fire('Sucesso', 'Turma excluída com sucesso!', 'success');
          } else {
            Swal.fire('Erro', 'Falha ao excluir turma.', 'error');
          }
        }
      });
    });
  });
  </script>
</head>

<body>
  <nav class="topo-areaDeFormacao">
    <div class="infoAreaDeFormacao">
      <br>
      <h1>DELETAR DADOS</h1>
      <h3>Clique na linha para deletar</h3>
    </div>
  </nav>
  <!-- TABELA ALUNOS -->
  <form>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">Matrícula</th>
          <th scope="col">Nome</th>
          <th scope="col">Sobrenome</th>
          <th scope="col">RG</th>
          <th scope="col">CPF</th>
          <th scope="col">Data de Nascimento</th>
          <th scope="col">Endereço</th>
          <th scope="col">Telefone</th>
          <th scope="col"></th>
          <?php
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
          } else {
            echo "<tr><td colspan='3'>Nenhum registro encontrado.</td></tr>";
          }
          ?>
      </thead>
    </table>
  </form>

  <!-- TABELA CURSOS -->
  <form>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Curso</th>
          <th scope="col">Custo</th>
          <th scope="col">Períodos</th>
          <th scope="col">Plano de Curso</th>
          <th scope="col">Capacidade</th>
          <th scope="col">Categoria</th>
          <th scope="col"></th>
          <?php
          $sql = "SELECT * FROM cursos";
          $result = $conn->query($sql); // Execute a consulta SQL
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row["id_curso"] . "</td>";
              echo "<td>" . $row["nome_curso"] . "</td>";
              echo "<td> R$ " . $row["valor_curso"] . "</td>";
              echo "<td>" . $row["qntd_periodos"] . "</td>";
              echo "<td>" . $row["plano_curso"] . "</td>";
              echo "<td>" . $row["capacidade"] . "</td>";
              echo "<td>" . $row["categoria"] . "</td>";
              echo "<td><button class='btn-excluir-curso'>Excluir</button></td>"; // Adicionando uma classe ao botão de exclusão
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='3'>Nenhum registro encontrado.</td></tr>";
          }
          ?>
      </thead>
    </table>
  </form>
  <br>
  <!-- TABELA PROFESSORES -->
  <form>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">NIF</th>
          <th scope="col">Nome</th>
          <th scope="col">Sobrenome</th>
          <th scope="col">RG</th>
          <th scope="col"></th>
          <?php
          $sql = "SELECT * FROM professores";
          $result = $conn->query($sql); // Execute a consulta SQL
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row["nif_professor"] . "</td>";
              echo "<td>" . $row["nome_professor"] . "</td>";
              echo "<td>" . $row["sobrenome_professor"] . "h</td>";
              echo "<td>" . $row["rg_professor"] . "</td>";
              echo "<td><button class='btn-excluir-professor'>Excluir</button></td>"; // Adicionando uma classe ao botão de exclusão
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='3'>Nenhum registro encontrado.</td></tr>";
          }
          ?>
      </thead>
    </table>
  </form>

    <!-- TABELA TURMAS -->
    <form>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">Período</th>
          <th scope="col">Total Alunos</th>
          <th scope="col">Início</th>
          <th scope="col">Término</th>
          <th scope="col"></th>
          <?php
          $sql = "SELECT * FROM turmas";
          $result = $conn->query($sql); // Execute a consulta SQL
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row["nome_turma"] . "</td>";
              echo "<td>" . $row["periodo_turma"] . "</td>";
              echo "<td>" . $row["total_alunos"] . "h</td>";
              echo "<td>" . $row["data_inicio_turma"] . "</td>";
              echo "<td>" . $row["data_conclusao_turma"] . "</td>";
              echo "<td><button class='btn-excluir-turmas'>Excluir</button></td>"; // Adicionando uma classe ao botão de exclusão
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='3'>Nenhum registro encontrado.</td></tr>";
          }
          ?>
      </thead>
    </table>
  </form>

</html>