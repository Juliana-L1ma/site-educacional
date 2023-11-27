<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Informações SENAI</title>
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

      <div class="separacaoAmarela"></div>

      <main class="quemSomos">
        <div class="dadosSenai">
            <h1 class="nomeSenai">Senai Nami Jafet</h1>
            <br><hr id="separacaoRoxa-quemSomos"><br>
      
            <p id="informacoesDoSenai">
                <a class="links-endereco" href="https://www.google.com/maps/place/SENAI+Nami+Jafet/@-23.522988,-46.1856686,15z/data=!4m6!3m5!1s0x94cdd83f25b7f87b:0x28b1c3bd2eea56e3!8m2!3d-23.522988!4d-46.1856686!16s%2Fg%2F1tg9tt5f?entry=ttu"> ENDEREÇO: R. Dom Antônio Cândido de Alvarenga, 353 - Centro - Mogi das Cruzes/SP</a><br><br>
               <a class="links-endereco" href="tel:+(11) 4728-3900"> TELEFONE: (11) 4728-3900</a><BR><br>
              <a class="links-endereco" href="http://mogidascruzes.sp.senai.br">SITE: http://mogidascruzes.sp.senai.br</a>
            </p>
           </div>
            <iframe class="mapaSenai" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14633.057926341688!2d-46.1856686!3d-23.522988!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cdd83f25b7f87b%3A0x28b1c3bd2eea56e3!2sSENAI%20Nami%20Jafet!5e0!3m2!1spt-BR!2sbr!4v1693403878596!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </main>
      
     
      
      <footer class="footer-quemSomos">
        <img src="./img/imagemInfosSenai.png" alt="" id="img-footer-QS">

        <a class="links-endereco-faleConosco" href="mailto:senaimogidascruzes@sp.senai.br">Fale conosco aqui</a>
        <p class="direitosAutorais-quemSomos">
            Copyright 2023 - Beatriz Brito, Evelyn Victoria Santos, Juliana Lima e Trinity Nascimento<br>
            Esse site foi produzido pelas alunas citadas acima no curso de Desenvolvimento de Sistemas do Senai "Nami Jafet" para uso escolar e administrativo
        </p>
      </footer>
</body>
</html>