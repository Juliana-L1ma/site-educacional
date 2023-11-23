<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Planejamento de Aulas</title>

  <style>
    .botao-PDA{
      margin: 5%;
     
    }
    #link-pdf{
      color: black;
    }
  </style>
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
          <br>
          <li><a class="header-item" href="index.html">Home</a></li><br>
          <hr>
          <br>
          <li> <a class="header-item" href="products.html">Products</a></li><br>
          <hr>
          <br>
          <li><a class="header-item" href="aboutus.html">About us</a></li> <br>
          <hr>
        </ul>
      </nav>
    </div>
    <div class="div-cabecalho" id="modo-mobilee">
      <a href="https://www.flaticon.com/br/icones-gratis/perfil" title="Perfil ícones criados por inkubators - Flaticon"
        id="icone-perfil">
        <img src="./img/perfil-de-usuario.png" />
      </a>
      <a href="https://www.flaticon.com/br/icones-gratis/engrenagem"
        title="Engrenagem ícones criados por Freepik - Flaticon" id="icone-engrenagem"> <img
          src="./img/engrenagem.png" />
      </a>
    </div>
  </header>

  <main>


<?php
session_start();
require_once("conexao.php");

// Obtém o nif_professor da sessão
$nif_professor = $_SESSION["id_usuario"];

// Substitua 'sua_tabela_lista_disc_prof' e 'sua_tabela_unidades_curriculares' pelos detalhes reais das suas tabelas
$sql = "SELECT uc.nome_uc, uc.pdf_path
        FROM lista_disc_prof lista
        INNER JOIN unidades_curriculares uc ON lista.id_unidade_curricular = uc.id_unid_curricular
        WHERE lista.nif_professor = '$nif_professor'";

// Execute a consulta SQL
$result = mysqli_query($conn, $sql);

// Verifique se a consulta foi bem-sucedida
if ($result) {
    // Fetch os resultados
    $resultados = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
} else {
    // Trate erros, se houver
    echo "Erro na consulta: " . mysqli_error($conn);
}

// Feche a conexão, se necessário
mysqli_close($conn);

?>

    <div class="titulo-PlanejamentoDeAula">
      <a href="./planoEregistro.html"><img class="img-PlanejamentoDeAula" src="img/seta-planejamentoDeAula.png" alt=""></a>


      <p id="titulo-PlanejamentoDeAula2">Plano de curso</p>
    </div>

    <br>

    <div class="meio-PDA">
      <img class="livroPDA" src="img/livro-PDA-removebg-preview.png" alt="">
      <p class="disciplina-PDA">Suas disciplinas:</p>
    </div>

    Clique para fazer o download do PDF <br>
    <?php
    // Conectar ao banco de dados
$usuario = 'root';
$senha = '';
$database = 'senai117_bd';
$host = 'localhost';

$conn= new mysqli($host, $usuario, $senha, $database);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}
// Verifica se o ID do documento é válido
if (isset($_GET['id_unid_curricular'])) {
  $id_unid_curricular = $_GET['id_unid_curricular'];

  $sql = "SELECT pdf_path FROM unidade_curriculares WHERE id_unid_curricular = $id_unid_curricular";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();


      // Exibe o conteúdo do PDF
      echo $row['pdf_path'];
  } else {
      echo "Documento não encontrado.";
  }
}
$conn->close();
?>

  </main>

  <footer class="footer-professor-adm">

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
                   <a href="mailto:beatriz.britofer@gmail.com">Enviar email para Beatriz Brito</a><br>
                  <a href="mailto:evelynvic23toria10@gmail.com">Enviar email para Evelyn Victoria</a><br>
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
                    Copyright 2023 - Beatriz Brito, Evelyn Victoria Santos, Juliana Lima e Trinity Nascimento<br>
                    Esse site foi produzido pelas alunas citadas acima no curso de Desenvolvimento de Sistemas do Senai "Nami Jafet" para uso escolar e administrativo
                </p>
               
            </div>
          </div>
      </div>

</footer>

</body>


<script>
  $(document).ready(function() {
  // Quando um botão de disciplina for clicado
  $(".btn-disciplina").click(function() {
    // Obtenha o ID da disciplina a partir do atributo data-id
    let disciplinaId = $(this).data("id");

    // Agora você pode usar o ID da disciplina para realizar ações, como consulta ao banco de dados
    // ou navegação para uma página relacionada a essa disciplina
    // Exemplo de ação:
    console.log("Disciplina selecionada (ID): " + disciplinaId);
  });
});

</script>

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

</html>
