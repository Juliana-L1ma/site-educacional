<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Meu boletim</title>
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
              <br><li> <a class="header-item" href="products.html">Products</a></li><br><hr>
              <br><li><a class="header-item" href="aboutus.html">About us</a></li> <br><hr>          
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

      <nav class="topo-boletim">
        <div id="foto-do-aluno"></div>
        
        <div id="info-aluno-boletim">
            <h2 id="tituloBoletim">Aluno(a):  <p id="nomeDoAluno-boletim">$nomeDoAluno</p></h2>
            <div class="alinhaDados"><p><b>Turma:</b></p><p id="turma-do-aluno-valor">$turma</p></div>
            <div class="alinhaDados"><p><b>UC:</b></p> <p id="unidade-curricular-valor">$unidadeCurricular</p></div>
        </div>
      </nav>
     
      <hr id="linhaVerde-separacao">

    <h2 class="boletim-titulo">Boletim geral</h2>





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
    $view_boletim = mysqli_query($cx, "SELECT * FROM view_boletim");

    $lista_turma_uc = mysqli_query($cx, "SELECT * FROM lista_turma_uc");
    $professores = mysqli_query($cx, "SELECT * FROM professores") or die( 
      mysqli_error($cx) //Caso haja um erro na consultal, exibir erro
      );

      $turmas = mysqli_query($cx, "SELECT * FROM turmas");
      $unidade_curricular = mysqli_query($cx, "SELECT * FROM unidade_curricular");



      ?>
      <table class="table table-bordered" id="tabela-professores-atualizar">
      <thead>


      <!-- FALTA LIGAR O ID DA UNIDADE CURRICULAR COM O NOME DELE -->

     <tr class="th">

     <tbody>
   
         <th>Disciplinas</th>
         <th>Notas</th>
         <th>Faltas</th>
      

         </tbody>
    </tr>
         </thead>

     
 
     <?php
     while ($linha = mysqli_fetch_assoc($view_boletim)) {
        $id_unid_curricular = $linha['nome_materia'];
        $nota_boletim = $linha['nota'];
        $frequencia_boletim = $linha['falta'];

  
        
         echo "<tr>";
         echo "<td>$id_unid_curricular</td>";
         echo "<td>$nota_boletim</td>";
         echo "<td>$frequencia_boletim</td>";
         echo "</tr>";
     }
     ?>
 
 </table>

 <br>


































  



      <hr id="linha-separacao-roxa">

      <nav id="legendaCriterios">
        <div id="excelente">
          <p>Excelente: </p>
          <div id="azul"></div>
        </div>

        <div id="regular">
          <p>Regular: </p>
          <div id="verde"></div>
        </div>

        <div id="ruim">
          <p>Ruim: </p>
          <div id="bordo"></div>
        </div>
      </nav>

      <nav id="consideracoes">
        <p class="nome-da-materia">$Redes</p>
        <table class="table table-bordered" id="tabela-CD">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">C1</th>
              <th scope="col">C2</th>
              <th scope="col">C3</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Crítico</th>
              <td>50</td>
              <td>50</td>
              <td>40</td>
            </tr>
            <tr>
              <th scope="row">Desejáveis</th>
              <td>50</td>
              <td>50</td>
              <td>40</td>
            </tr>
          </tbody>
        </table>

        <div id="comportamento">
          <p>Comportamento:</p> 
          <div id="comportamento-color"></div>
        </div>

        <div id="relacionamento">
          <p>Relacionamento: </p>
          <div id="relacionamento-color"></div>
        </div>

        <div id="pontualidade">
          <p>Pontualidade: </p>
          <div id="pontualidade-color"></div>
        </div>
      </nav>

      <nav id="consideracoes">
        <p class="nome-da-materia">$Java</p>
        <table class="table table-bordered" id="tabela-CD">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">C1</th>
              <th scope="col">C2</th>
              <th scope="col">C3</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Crítico</th>
              <td>50</td>
              <td>50</td>
              <td>40</td>
            </tr>
            <tr>
              <th scope="row">Desejáveis</th>
              <td>50</td>
              <td>50</td>
              <td>40</td>
            </tr>
          </tbody>
        </table>

        <div id="comportamento">
          <p>Comportamento:</p> 
          <div id="comportamento-color"></div>
        </div>

        <div id="relacionamento">
          <p>Relacionamento: </p>
          <div id="relacionamento-color"></div>
        </div>

        <div id="pontualidade">
          <p>Pontualidade: </p>
          <div id="pontualidade-color"></div>
        </div>
      </nav>


      <nav id="consideracoes">
        <p class="nome-da-materia">$Linguagem de Marcação</p>
        <table class="table table-bordered" id="tabela-CD">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">C1</th>
              <th scope="col">C2</th>
              <th scope="col">C3</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Crítico</th>
              <td>50</td>
              <td>50</td>
              <td>40</td>
            </tr>
            <tr>
              <th scope="row">Desejáveis</th>
              <td>50</td>
              <td>50</td>
              <td>40</td>
            </tr>
          </tbody>
        </table>

        <div id="comportamento">
          <p>Comportamento:</p> 
          <div id="comportamento-color"></div>
        </div>

        <div id="relacionamento">
          <p>Relacionamento: </p>
          <div id="relacionamento-color"></div>
        </div>

        <div id="pontualidade">
          <p>Pontualidade: </p>
          <div id="pontualidade-color"></div>
        </div>
      </nav>

      <nav id="consideracoes">
        <p class="nome-da-materia">$Sistemas Operacionais</p>
        <table class="table table-bordered" id="tabela-CD">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">C1</th>
              <th scope="col">C2</th>
              <th scope="col">C3</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Crítico</th>
              <td>50</td>
              <td>50</td>
              <td>40</td>
            </tr>
            <tr>
              <th scope="row">Desejáveis</th>
              <td>50</td>
              <td>50</td>
              <td>40</td>
            </tr>
          </tbody>
        </table>

        <div id="comportamento">
          <p>Comportamento:</p> 
          <div id="comportamento-color"></div>
        </div>

        <div id="relacionamento">
          <p>Relacionamento: </p>
          <div id="relacionamento-color"></div>
        </div>

        <div id="pontualidade">
          <p>Pontualidade: </p>
          <div id="pontualidade-color"></div>
        </div>
      </nav>
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
</html>
