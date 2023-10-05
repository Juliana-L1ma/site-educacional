<?php
require_once("conexao.php"); // Arquivo de conexão com o banco de dados
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/style.css">
  <title>Atualizar informações</title>
  <style>
    p {
      margin-bottom: 0;
    }
    table {
      margin-top: 2vh;
      border: collapse;
    }
    table td{
      border: 1px solid #000;
      padding: 5px;
    }
  </style>
</head>

<body onload="carregar()">
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
            "unidade_curricular" => "Disciplinas",
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
    <div class="alinhaSelect">
      <div class="labelEscolha" id="labelCat">
        <label for="">Categoria:</label>
      </div>
      <div class="opcoesGeral">

        <select class="form-control" name="categoria" id="categoria">
          <?php
          // Preencher as opções do select com os valores da coluna "categoria"
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['categoria'] . '">' . $row['categoria'] . '</option>';
          }
          ?>
        </select>

      </div>

      <div class="labelEscolha" id="cursooEsc">
        <label for="">Curso:</label>
      </div>
      <div class="opcoesGeral">
        <select class="form-control" name="nome_curso" id="nome_curso">
          <?php
          // Preencher as opções do segundo select com os valores da coluna "nome_curso"
          while ($row = mysqli_fetch_assoc($resultNomeCurso)) {
            echo '<option value="' . $row['nome_curso'] . '">' . $row['nome_curso'] . '</option>';
          }
          ?>
        </select>
      </div>
      <input type="submit" value="Enviar">
      </form>

      <table border="1">


      <?php
        // Verificar se o formulário foi enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $nome_tabela = $_POST["nome_tabela"];
          $categoria = $_POST["categoria"];
          $nome_curso = $_POST["nome_curso"];

          if ($nome_tabela === "alunos") {
            $sql = "	SELECT alunos.*, nome_turma, nome_curso
            FROM alunos
            INNER JOIN lista_alunos
            ON alunos.cpf_aluno = lista_alunos.id_aluno
             INNER JOIN turmas
                  ON turmas.id_turma = lista_alunos.id_turma
              INNER JOIN cursos
                      ON cursos.id_curso = turmas.id_curso
              WHERE cursos.categoria = '$categoria'";
            $result = $conn->query($sql);

            echo "<th>CPF</th>";
            echo "<th>Nome</th>";
            echo "<th>Sobrenome</th>";
            echo "<th>RG</th>";
            echo "<th>Data de Nascimento</th>";
            echo "<th>Endereço</th>";
            echo "<th>Telefone</th>";
            echo "<th>Turma</th>";
            echo "<th>Curso</th>";


            if ($result->num_rows > 0) {
                // Loop através dos resultados e exibe cada aluno na tabela
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["cpf_aluno"] . "</td>";
                    echo "<td>" . $row["nome_aluno"] . "</td>";
                    echo "<td>" . $row["sobrenome_aluno"] . "</td>";
                    echo "<td>" . $row["rg_aluno"] . "</td>";
                    echo "<td>" . $row["data_nascimento_aluno"] . "</td>";
                    echo "<td>" . $row["endereco_aluno"] . "</td>";
                    echo "<td>" . $row["telefone_aluno"] . "</td>";
                    echo "<td>" . $row["nome_turma"] . "</td>";
                    echo "<td>" . $row["nome_curso"] . "</td>";
                    // Adicione outras colunas conforme necessário
                    echo "</tr>";
                }
            } else {
                echo "Nenhum aluno encontrado.";
            }

              }
            }
          ?>
      </table>
      <div class="labelEscolha" id="labelForm">
        <label for="">Formação:</label>
      </div>
      <div class="opcoesGeral">
        <select name="attCurso" id="formacaoEsc" class="opcoesAtt">
          <option value=""></option>
          <option value="tecnologia">Tecnologia</option>
          <option value="mecanica">Mecânica</option>
          <option value="eletrica">Elétrica</option>
        </select>
      </div>
      <div class="labelEscolha" id="labelSemestre">
        <label for="" id="labelSem">Semestre:</label>
      </div>
      <div class="opcoesGeral">
        <select name="attCurso" id="semestreCurso" class="opcoesAtt">
          <option value=""></option>
          <option value="tecnologia">1° Semestre</option>
          <option value="mecanica">2° Semestre</option>
          <option value="eletrica">3° Semestre</option>
        </select>
      </div>
    </div>
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
            Esse site foi produzido pelas alunas citadas acima no curso de Desenvolvimento de Sistemas do Senai "Nami
            Jafet" para uso escolar e administrativo
          </p>

        </div>
      </div>
    </div>
  </footer>
  <script>
    function carregar() {
      var selectAtualizar = document.getElementById("categoriaAtt");
      var catAttCurso = document.getElementById("categoria");
      var cursoEsc = document.getElementById("cursoEsc");
      var labelForm = document.getElementById("labelForm");
      var opcoesAtt = document.querySelectorAll(".opcoesAtt");
      var labelEscolha = document.querySelectorAll(".labelEscolha");
      var labelSemestre = document.getElementById("labelSemestre")
      var labelSem = document.getElementById("labelSemestre");
      var formacaoEsc = document.getElementById("formacaoEsc");
      var cursooEsc = document.getElementById("cursooEsc");
      var semestreCurso = document.getElementById("semestreCurso");


      opcoesAtt.forEach(function (div) {
        div.style.display = "none";

        labelEscolha.forEach(function (div) {
          div.style.display = "none";
        });
      });

      catAttCurso.style.display = "none";
      document.getElementById("nome_curso").style.display = "none";

      $(document).ready(function () {
        $("#categoriaAtt").change(function () {
          if (selectAtualizar.value === "alunos") {
            labelSem.style.color = "transparent";
            console.log(selectAtualizar.value);
            catAttCurso.style.display = "block";
            document.getElementById("nome_curso").style.display = "block";
            opcoesAtt.forEach(function (div) {
              div.style.display = "block";
              formacaoEsc.style.display = "none";
              semestreCurso.style.display = "none";
              labelEscolha.forEach(function (div) {
                div.style.display = "block";
                labelForm.style.display = "none";

              });
            });
            $(document).ready(function () {
              $("#categoria").change(function () {
                if (catAttCurso.value === "tec") {
                  console.log("Técnico");
                }
                if (catAttCurso.value === "fic") {
                  console.log("FIC");
                }
                if (catAttCurso.value === "cai") {
                  console.log("CAI");
                }
                $(document).ready(function () {
                  $("#cursoEsc").change(function () {
                    console.log("CURSO");
                    console.log("MOSTRAR TABELA");
                  });
                });
              });
            });
          } else {
            console.log(selectAtualizar.value);
            opcoesAtt.forEach(function (div) {
              div.style.display = "none";

              labelEscolha.forEach(function (div) {
                div.style.display = "none";
              });
            });
          }

          var labelCat = document.getElementById("labelCat");
          if (selectAtualizar.value === "curso") {
            catAttCurso.style.display = "block";
            labelCat.style.display = "block";

            $(document).ready(function () {
              $("#nome_curso").change(function () {
                if (catAttCurso.value === "tec") {
                  console.log("Técnico");
                  console.log("MOSTRAR TABELA TÉCNICO");
                }
                if (catAttCurso.value === "fic") {
                  console.log("FIC");
                  console.log("MOSTRAR TABELA FIC");
                }
                if (catAttCurso.value === "cai") {
                  console.log("CAI");
                  console.log("MOSTRAR TABELA CAI");
                }
              });
            });
          }
          if (selectAtualizar.value === "professor") {
            formacaoEsc.style.display = "block";
            labelForm.style.display = "block";
            $(document).ready(function () {
              $("#formacaoEsc").change(function () {
                if (formacaoEsc.value === "tecnologia") {
                  console.log("Tecnologia")
                }
                if (formacaoEsc.value === "mecanica") {
                  console.log("Mecânica")
                }
                if (formacaoEsc.value === "eletrica") {
                  console.log("Elétrica")
                }
              });
            });
          }

          if (selectAtualizar.value === "disciplina") {
            cursoEsc.style.display = 'block';
            cursooEsc.style.display = "block";
            $(document).ready(function () {
              $("#cursoEsc").change(function () {
                if (cursoEsc.value === "c1") {
                  console.log("Curso 1")
                }
                if (cursoEsc.value === "c2") {
                  console.log("Curso 2")
                }
                if (cursoEsc.value === "c3") {
                  console.log("Curso 3")
                }
              });
            });
          }
          if (selectAtualizar.value === "turma") {
            cursoEsc.style.display = 'block';
            cursooEsc.style.display = "block";
            labelSem.style.color = "#000";
            labelSemestre.style.display = "block";
            semestreCurso.style.display = "block";
          }
        });
      });
    }


  </script>
</body>

</html>
<?php
// Fechar a conexão com o banco de dados
mysqli_close($conn);
?>
