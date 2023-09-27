<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>Home Professor</title>
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

    <main id="main-professor">
      <h2 id="bemvindo-professor"><b>Seja bem vindo(a) $nomeDoProfessor</b></h2>
    <br>

    <div class="caixa-de-funcionalidades">
        <h3 id="titulo-funcionalidade"><b>Acessar funcionalidades</b></h3>
        <br>

        <div class="container">
            <div class="row">
              <div class="col">
                <button class="botao-funcionalidade">
                    <img class="icone-funcionalidades" src="./img/boletim.png"><br>
                    Notas
                </button>  
            </div>

              <div class="col">
                <button class="botao-funcionalidade">
                    <img class="icone-funcionalidades" src="./img/planejamento.png" title="Plano estratégico ícones criados por Freepik - Flaticon"><br>
                    Planejamento e registro de aulas
                </button>

              </div>
             
              <div class="w-100"></div>
              <br>
              <hr size="15" id="separacao-roxa">
              <div class="col">
                <button class="botao-funcionalidade">
                   <img class="icone-funcionalidades" src="./img/check-mark.png" title="Verifica ícones criados por Freepik - Flaticon"><br>
                   Registrar critérios
                </button>
            </div>

              <div class="col">
                <button class="botao-funcionalidade">
                    <img class="icone-funcionalidades" src="./img/central-de-atendimento.png"><br>
                    Ajuda
                </button>
            </div>

            </div>
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
                        Esse site foi produzido pelas alunas citadas acima no curso de Desenvolvimento de Sistemas do Senai "Nami Jafet" para uso escolar e administrativo
                    </p>
                   
                </div>
              </div>
          </div>
    
    </footer>

    <!-- js para fazer as ações do menu hamburguer -->
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
</body>
</html>


