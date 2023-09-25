<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Curso Técnico</title>
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



  
      <main>

        <div class="tudoCursotec">

            <div class="imgCursotec">

                <img src="img/seta-esquerda-azul.png" alt="">

            </div>

          

            <div class="textoCursotec">
    
                <p class="tituloCursotec">CURSO TÉCNICO</p>
    
            </div>
    

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
        $informacoes_curso = mysqli_query($cx, "SELECT * FROM informacoes_curso");


        $informacoes_curso_turma = mysqli_query($cx, "SELECT * FROM informacoes_curso_turma");
  
        $lista_turma_uc = mysqli_query($cx, "SELECT * FROM lista_turma_uc");
        $professores = mysqli_query($cx, "SELECT * FROM professores") or die( 
          mysqli_error($cx) //Caso haja um erro na consultal, exibir erro
          );
          $turmas = mysqli_query($cx, "SELECT * FROM turmas");
          $unidade_curricular = mysqli_query($cx, "SELECT * FROM unidade_curricular");
  
  
          $cursos = mysqli_query($cx, "SELECT * FROM cursos");

         




  
          ?>
          <table class="table table-bordered" id="tabela-professores-atualizar">
          <thead>
         <tr class="th">
  
         <tbody>
  
       
             <th>Curso</th>
             <th>Turmas</th>
             <th>Carga Horária</th>
          
  
  
             </tbody>
        </tr>
             </thead>
  
         
     
         <?php
         while ($linha = mysqli_fetch_assoc($informacoes_curso)) {
      
             $NomeDoCurso = $linha['NomeDoCurso'];
             $QuantidadeDeTurmas = $linha['QuantidadeDeTurmas'];
             $CargaHorariaDoCurso = $linha['CargaHorariaDoCurso'];


             
     
             echo "<tr>";
             echo "<td>$NomeDoCurso</td>";
             echo "<td>$QuantidadeDeTurmas</td>";
             echo "<td>$CargaHorariaDoCurso</td>";
      
             echo "</tr>";
         }
         ?>
     
     </table>
  
     <br>


     <br>



     
     <?php





     // Verifica se há cursos para iterar
          if (mysqli_num_rows($cursos) > 0) {
              while ($curso = mysqli_fetch_assoc($cursos)) {
                  $cursoId = $curso['id_curso'];
                  $nomeCurso = $curso['nome_curso'];
                  $cargaHoraria = $curso['carga_horaria_curso'];
          
                  // Consulta para obter as turmas do curso atual
                  $turmas = mysqli_query($cx, "SELECT * FROM turmas WHERE id_curso = $cursoId");
          
                  // Exibe o nome do curso em uma tabela separada
                  echo "<table class='table table-bordered'>";
                  echo "<thead><tr><th colspan='3'>$nomeCurso</th></tr></thead>";
                  echo "<thead><tr><th>Turmas</th><th>Início</th><th>Término</th></tr></thead>";
                  echo "<tbody>";
          
                  while ($turma = mysqli_fetch_assoc($turmas)) {
                      $nomeTurma = $turma['nome_turma'];
                      $dataInicioTurma = $turma['data_inicio_turma'];
                      $dataFimTurma = $turma['data_conclusao_turma'];
          
                      // Exibe informações da turma
                      echo "<tr>";
                      echo "<td>$nomeTurma</td>";
                      echo "<td>$dataInicioTurma</td>";
                      echo "<td>$dataFimTurma</td>";
                      echo "</tr>";
                  }
          
                  echo "</tbody></table>";
              }
          } else {
              echo "Nenhum curso encontrado.";
          }
          
          // Fechar a conexão com o banco de dados
          mysqli_close($cx);
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