<?php
session_start();
// Recupere o nome do usuário da sessão
$nomeUsuario = $_SESSION["nome_usuario"] . " " . $_SESSION["sobrenome_usuario"];
$id_aluno = $_SESSION["id_usuario"];

$conect = mysqli_connect("localhost", "root", "", "senai117_bd");
if ($conect->connect_error) {
    die("Conexão falhou: " . $conect->connect_error);
}
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <style> 
    #cursos option{
      color: #000;
      text-align: center;
    }
    #fotoDePerfil{
  width: 100px;
  height: 100px;
  border-radius: 50%;
  margin: 0 auto;
  padding: 5%;
  padding-top: 5%;
}
.imagemAluno {
  background-color: #0A395E;
  width: 0px;
  height: 0px;
  margin-left: 40%;
  padding: 5%;
  padding-top: 5%;
}

.form-aluno-area{
  margin-top: 3%; 
  margin-left: 40%;
}
.btn-form-enviar{
  padding: 1%;
  border-radius: 5%;
  border-color: #912B64;
  color: #912B64;
  --fontes-de-titulo: 'Roboto', sans-serif;
}
    </style>
    <title>Home do aluno</title>
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
            <img src="./img/barra-de-menu.png" alt="Menu aberto ícones criados por verry purnomo - Flaticon"/> 
          </span>
        </button>
        <ul id="menu" role="menu">
          <br><li><a class="header-item" href="index.html">Home</a></li><br><hr>
          <br><li> <a class="header-item" href="products.html">Perfil</a></li><br><hr>
          <br><li><a class="header-item" href="aboutus.html">Funcionalidades</a></li> <br><hr>          
      </ul>
      </nav>
    </div>
    <div class="div-cabecalho" id="modo-mobilee">
      <a href="https://www.flaticon.com/br/icones-gratis/perfil" title="Perfil ícones criados por inkubators - Flaticon" id="icone-perfil"> 
        <img src="./img/perfil-de-usuario.png"/>
      </a>
      <a href="https://www.flaticon.com/br/icones-gratis/engrenagem" title="Engrenagem ícones criados por Freepik - Flaticon" id="icone-engrenagem"> <img src="./img/engrenagem.png"/>
      </a>
    </div>
  </header>

    <main id="mainAluno">

      <div class="imagemAluno">
      <?php
  require_once("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $targetDir = "uploadPerfil/"; // Pasta onde as imagens serão armazenadas
  $targetFile = $targetDir . basename($_FILES["imagem"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

  // Verifique se o arquivo é uma imagem real ou uma imagem falsa
  if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["imagem"]["tmp_name"]);
      if ($check !== false) {
          echo "O arquivo é uma imagem - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          echo "O arquivo não é uma imagem.";
          $uploadOk = 0;
      }
  }

  // Verifique se o arquivo já existe
  if (file_exists($targetFile)) {
      // echo " Desculpe, o arquivo já existe. ";
      $uploadOk = 0;
  }

  // Verifique o tamanho máximo do arquivo (ajuste para o tamanho desejado)
  if ($_FILES["imagem"]["size"] > 500000) {
      // echo "Desculpe, o arquivo é muito grande.";
      $uploadOk = 0;
  }

  // Verifique se $uploadOk está definido como 0 por algum erro
  if ($uploadOk == 0) {
      // echo " Desculpe, seu arquivo não foi enviado. "
  } else {
    if ($_SESSION['tipo_usuario'] === 'alunos' && isset($_SESSION['num_matricula_aluno'])) {
      $id_usuari = $_SESSION['num_matricula_aluno'];
  
   // Consulta para obter a imagem anterior do aluno
   $query = "SELECT fotoDoAluno FROM alunos WHERE num_matricula_aluno = $id_usuari";
   $result = mysqli_query($conn, $query);

   if ($result && mysqli_num_rows($result) > 0) {
       $row = mysqli_fetch_assoc($result);
       $imagem_anterior = $row['fotoDoAluno'];

       // Verifique se existe uma imagem anterior
       if (!empty($imagem_anterior)) {
           // Exclua a imagem anterior do servidor
           if (file_exists($imagem_anterior)) {
               unlink($imagem_anterior);
           }
       }
   }

      if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $targetFile)) {
          // echo "O arquivo " . htmlspecialchars(basename($_FILES["imagem"]["name"])) . " foi enviado com sucesso.";
  
          // Atualize o banco de dados com o caminho da imagem do aluno
          $query = "UPDATE alunos SET fotoDoAluno = '$targetFile' WHERE num_matricula_aluno = $id_usuari";
          if (mysqli_query($conn, $query)) {
              // echo "Banco de dados atualizado com sucesso.";
          } else {
              // echo "Erro ao atualizar o banco de dados: " . mysqli_error($conn);
          }
      } else {
          // echo "Desculpe, houve um erro ao enviar o arquivo.";
      }
  }

  }
}

if ($_SESSION['tipo_usuario'] === 'alunos' && isset($_SESSION['num_matricula_aluno'])) {
  $id_usuari = $_SESSION['num_matricula_aluno'];
  $query = "SELECT fotoDoAluno FROM alunos WHERE num_matricula_aluno = $id_usuari";
  $result = mysqli_query($conn, $query);

  if ($result && mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $caminho_imagem = $row['fotoDoAluno'];

      if (!empty($caminho_imagem)) {
        echo '<img src="' . $caminho_imagem . '" id="fotoDePerfil"  alt="Imagem do Aluno">';
    } else {
        // echo 'Nenhuma imagem de perfil encontrada.';
    }
  }
}
else {
echo "nao foi";
}
?>

</div>



<div class="form-aluno-area">

  <form id="formImagem" action="homeAluno.php" method="post" enctype="multipart/form-data">
    <input type="file" name="imagem">
    <input type="button" id="enviarImagemBtn" value="Enviar Imagem">
  </form>

  <img id="editarBtn" src="./img/lapis-edicao.png" alt="Editar Imagem" style="cursor: pointer;">
</div>

   
      <div class="informacoesDoAluno">

      
      <p id="nomeDoAluno"><?php echo $_SESSION['nome_aluno']; ?></p>



        <hr id="hr-aluno"><br>

        <label class="label-curso" for="turma">Curso:</label>

	<select id="cursos" name="cursos" style="background-color: transparent; border: none; color: #fff; outline: none;">
                <?php
$sqlTurmaPorAluno = "SELECT turmas.id_curso, cursos.id_curso, cursos.nome_curso, lista_alunos.id_turma, lista_alunos.id_aluno
                    FROM lista_alunos
                    INNER JOIN turmas ON turmas.id_turma = lista_alunos.id_turma
                    INNER JOIN cursos ON cursos.id_curso = turmas.id_curso
                    WHERE lista_alunos.id_aluno = '$id_aluno'";

$result = $conect->query($sqlTurmaPorAluno);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['id_curso'];
        $nomeCurso = $row['nome_curso']; // Certifique-se de que o nome da coluna está correto
        echo '<option value="' . $id . '">';
        echo $nomeCurso;
        echo '</option>';
    }
}
?>
            </select>
      </div>

      <div id="caixa-botoes">

        <a href="./meuBoletim.php" class="buttonDoAluno">Boletim</a>
        <a href="./" class="buttonDoAluno">Informações</a>

      </div>
      

    </main>

    <footer class="footer-aluno">

        <div class="container">
           

            <div class="row">
              <div class="col-6">
                <p class="tituloRodape">Site SENAI oficial:</p><hr>
                <p class="textoRodape">Acesse o site oficial do SENAI para ver outras informações <a href="https://www.sp.senai.br/">Clique aqui</a></p>
              </div>

              <div class="col-6">
                <div class="contatos">
                    <p class="tituloRodape">Contatos</p><hr>
                    <p class="textoRodape">
                        <a href="mailto:jp6001707@gmail.com">Enviar email para Beatriz Brito</a><br>
                        <a href="mailto:jp6001707@gmail.com">Enviar email para Evelyn Victoria</a><br>
                        <a href="mailto:jp6001707@gmail.com">Enviar email para Juliana Lima</a><br>
                        <a href="mailto:jp6001707@gmail.com">Enviar email para Trinity Domingues</a><br>
                        <br>
                    </p>
                </div>
              </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <p class="direitosAutorais">
                        Copyright 2023 - Beatriz Brito, Evelyn Victoria Santos, Juliana Lima e Trinity Nascimento<br>
                        Esse site foi produzido pelas alunas citadas acima no curso de Desenvolvimento de Sistemas do Senai "Nami Jafet" para uso escolar e administrativo
                    </p>
                   
                </div>
              </div>
          </div>
    
    </footer>
</body>


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

//script do botão de editar
document.addEventListener('DOMContentLoaded', function () {
        var formImagem = document.getElementById('formImagem');
        formImagem.style.display = 'none';

        var enviarImagemBtn = document.getElementById('enviarImagemBtn');
        enviarImagemBtn.addEventListener('click', function () {
            formImagem.submit(); // Submeter o formulário manualmente
        });

        document.getElementById('editarBtn').addEventListener('click', function () {
            formImagem.style.display = (formImagem.style.display === 'none' || formImagem.style.display === '') ? 'block' : 'none';
        });
    });
</script>

</html>
