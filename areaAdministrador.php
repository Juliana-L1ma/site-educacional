<?php
session_start();
//pego o nome do usuário de quem logou
$nomeUsuario = $_SESSION["nome_usuario"];
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Área Administrativa</title>
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
            <br><li><a class="header-item" href="login.php">Sair</a></li><br><hr>
            <br><li> <a class="header-item" href="products.html">Products</a></li><br><hr>
            <br><li><a class="header-item" href="aboutus.html">About us</a></li> <br><hr>          
        </ul>
        </nav>
      </div>
      <div class="div-cabecalho" id="modo-mobilee">
        <a title="Perfil ícones criados por inkubators - Flaticon" id="icone-perfil"> 
          <img src="./img/perfil-de-usuario.png"/>
        </a>
        <a title="Engrenagem ícones criados por Freepik - Flaticon" id="icone-engrenagem"> <img src="./img/engrenagem.png"/>
        </a>
      </div>
    </header>
    <div>
      <a href="login.php" id="divSair">
        <button id="btnSair">
          <img src="img/sair.png" alt="">
        </button>
      </a>
    </div>
    <main>
      <div id="container-adm">
        <div class="fotoPerfil"></div>
        <div id="nomeUsuario">
          <p id="nomeUserAdm" style="white-space: nowrap;"><?php echo $nomeUsuario; ?></p>
          <img src="img/editar.png" id="editar">
        </div>
        <div class="linha"></div>
        <p class="adm">Administrador</p>
        <p class="subtitulo">Gerencie o Portal Educacional</p>
      </div>
      <div id="areaBotoes">
        <div id="botoes1">
          <button>
            <img src="img/visao.png" alt="">
            Visualizar
          </button>
          <button>
            <img src="img/adicionar.png" alt="">
            Cadastrar
          </button>
        </div>
        <div id="botoes2">
          <button>
            <img src="img/atualizar.png" alt="">
            Atualizar
          </button>
          <button>
            <img src="img/excluir.png" alt="">
            Excluir
          </button>
        </div>
      </div>

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
    </main>
    
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

      //LOGOUT
      var i = 0;
      
      var sair = document.querySelector('#icone-engrenagem');
      var caixa = document.getElementById("divSair");
      var botao = document.getElementById("btnSair");

      caixa.style.display = "none";
      botao.style.display = "none";

      sair.addEventListener('click', function click(e) {
        i++;

      caixa.style.display = "flex";
      botao.style.display = "flex";
    });
      
      
    </script>
  </body>
</html>
