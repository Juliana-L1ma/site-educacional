<?php
session_start();
//pego o nome do usuário de quem logou
$nomeUsuario = $_SESSION["nome_usuario"];
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style> 
    #cursos option{
      color: #000;
      text-align: center;
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

      <div class="imagemAluno"></div>

      <div class="informacoesDoAluno">

        <p id="nomeDoAluno"><?php echo $nomeUsuario;?></p>
        <hr id="hr-aluno"><br>

        <label class="label-curso" for="turma">Curso:</label>

	<select id="cursos" name="cursos" style="background-color: transparent; border: none; color: #fff; outline: none;">
		<option value="Desenvolvimento de sistemas">Desenvolvimento de sistemas</option>
		<option value="Elétrica">Elétrica</option>
	</select>  

  <p id="nomeDaTurma"> <br>$nomeDaTurma</p>
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
</script>
</html>
