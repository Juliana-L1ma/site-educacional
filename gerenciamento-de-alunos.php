<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Gerenciamento de Alunos</title>
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


  <main class="main-GDA">

    <div class="div-titulo-GDA">

      <p class="titulo-GDA">Gerenciamento de Alunos</p>


    </div>





    <?php
    //Iniciando a conexão com o banco de dados 
    $cx = mysqli_connect("localhost", "root", "");
   
    //Selecionando o banco de dados 
    $db = mysqli_select_db($cx, "senai117_bd");


    //Criando a query de consulta à tabela criada 
 
    $alunos = mysqli_query($cx, "SELECT * FROM alunos");
    $boletim = mysqli_query($cx, "SELECT * FROM boletim");
    $cursos = mysqli_query($cx, "SELECT * FROM cursos");
    $lista_alunos = mysqli_query($cx, "SELECT * FROM lista_alunos");
    $lista_disc_prof = mysqli_query($cx, "SELECT * FROM lista_disc_prof");
    $lista_prof_turma = mysqli_query($cx, "SELECT * FROM lista_prof_turma");




    $lista_turma_uc = mysqli_query($cx, "SELECT * FROM lista_turma_uc");
    $professores = mysqli_query($cx, "SELECT * FROM professores") or die( 
      mysqli_error($cx) //Caso haja um erro na consultal, exibir erro
      );
      $turmas = mysqli_query($cx, "SELECT * FROM turmas");
      $unidade_curricular = mysqli_query($cx, "SELECT * FROM unidades_curriculares");

      $cursos = mysqli_query($cx, "SELECT * FROM cursos");

     


      ?>






<div class="user-box">
  <label class="label-turma">Curso: </label>
  <select id="select-cursos" class="select-turma">
    <?php
    while ($row = mysqli_fetch_assoc($cursos)) {
      echo '<option value="' . $row['id_curso'] . '">' . $row['nome_curso'] . '</option>';
    }
    ?>
  </select>
</div>

<br>

<div class="user-box">
  <label class="label-turma">Turma: </label>
  <select id="select-turmas" class="select-turma">
    <option value="">Selecione um Curso primeiro</option>
    <?php
    // Aqui você deve preencher as opções de turmas com base no curso selecionado
    // if (isset($_POST['cursos'])) {
      // Use o valor de $_POST['cursoSelecionado'] para buscar as turmas relacionadas a esse curso
      // e preencher as opções do dropdown de Turmas
      while ($row = mysqli_fetch_assoc($turmasDoCurso)) {
        echo '<option value="' . $row['id_turma'] . '">' . $row['nome_turma'] . '</option>';
      }
    // }
    ?>
  </select>
</div>


    <div class="div-azul">

      Alunos

    </div>

    <div class="div-amarela">





      <br>



      <div id="informacoes" class="hidden">
        <!-- <div class="links-GDA"> -->
          <div class="b"></div>
        <a class="link-GDA" href="#">Boletim</a>
        <a class="link-GDA" href="#">Informações pessoais</a>
        <!-- </div> -->
      </div>




      <hr class="linha-nomes-GDA">

      <div class="mostraTextos">



      <p class="mostrarTexto" onclick="pessoa_clique('${variavel1}')" id="${variavel1}">Evelyn Victoria da Silva Santos
      </p>


      <hr class="linha-nomes-GDA">

      <p class="mostrarTexto" onclick="pessoa_clique('${variavel2}')" id="${variavel2}">Juliana Pereira</p>

      <hr class="linha-nomes-GDA">

      <p class="mostrarTexto" onclick="pessoa_clique('${variavel3}')" id="${variavel3}">Trinity Domingues</p>

      <hr class="linha-nomes-GDA">

      <p class="mostrarTexto" onclick="pessoa_clique('${variavel4}')" id="${variavel4}">Crislaine Ferreira</p>

      <hr class="linha-nomes-GDA">

      <p class="mostrarTexto" onclick="pessoa_clique('${variavel5}')" id="${variavel5}">Camila Santos</p>

      <hr class="linha-nomes-GDA">

      <p class="mostrarTexto" onclick="pessoa_clique('${variavel6}')" id="${variavel6}">Victoria dos Santos</p>

      <hr class="linha-nomes-GDA">
    </div>

  </div>

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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Certifique-se de incluir a biblioteca jQuery -->

<script>
$(document).ready(function() {
  // Quando o dropdown de "Cursos" for alterado
  $("#select-cursos").change(function() {
    var cursoSelecionado = $(this).val();
    
    // Use AJAX para buscar as turmas relacionadas ao curso
    $.ajax({
      url: "busca_turmas.php", // Substitua pelo URL do seu arquivo PHP que busca as turmas
      method: "POST",
      data: { curso: cursoSelecionado },
      success: function(data) {
        // Preencha o dropdown de "Turmas" com os dados retornados
        $("#select-turmas").html(data);
      }
    });
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





<script>

  // Criação das variáveis
  // Inserindo o conteúdo as divs já existentes.
  var elementosMostrarTexto = document.getElementsByClassName("mostrarTexto");
  var infoDiv = document.getElementById("informacoes");
  
  var textoExibido = "";
  
  // Crie um objeto para rastrear quais elementos já receberam os links
  var elementosComLinks = {};
  
  function pessoa_clique(cpf) {

    // De acordo com o CPF da pessoa
    var pessoa_selecionada = document.getElementById(`${cpf}`);
  
    // Verifique se os links já foram adicionados a esse elemento
    if (!elementosComLinks[cpf]) {

      // Criando um elemento de texto
      var boletim = document.createElement("a");
      boletim.innerHTML = 'Boletim';
      boletim.href = '#';

      boletim.style.color = "#70A288";
      boletim.style.paddingRight= "7%";
      boletim.style.paddingLeft= "2%";
      boletim.style.fontSize = "20px";
  
        // Criando um elemento de texto
      var informacoes = document.createElement("a");
     
      informacoes.innerHTML = 'Informações pessoais';
      informacoes.href = '#';

      informacoes.style.fontSize = "20px";
      informacoes.style.color = "#70A288";
      boletim.style.paddingRight= "7%";
      boletim.style.paddingLeft= "7%";

      
  
      // Criando um appendChild para que os links fiquem organizados
      pessoa_selecionada.appendChild(boletim);
      pessoa_selecionada.appendChild(informacoes);
  
      // Marque o elemento como tendo os links adicionados
      elementosComLinks[cpf] = true;
    }
  }
  

</script>


</html>