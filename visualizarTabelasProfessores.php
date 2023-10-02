<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Visualizar - Professores</title>
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


      <nav class="topo-areaDeFormacao">
        <a href="./atualizarInformacoes.html"><img src="./img/seta-esquerda-azul.png" alt="seta esquerda azul" class="seta-esquerda-azul">
        </a>
        <div class="infoAreaDeFormacao">
        <h1>Área de formação</h1>
        <h3>Tecnologia</h3>
      </div>
      </nav>

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
        $unidade_curricular = mysqli_query($cx, "SELECT * FROM unidade_curricular");



        ?>

<div class="table-responsive">
       <table class="table table-bordered tabela-customizada" id="tabela-professores-atualizar">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>CPF</th>
            <th>RG</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>Nascimento</th>
            <th>Email</th>
            <th>Email Educacional</th>
            <th>Senha Educacional</th>
        </tr>
    </thead>
    <tbody>

     

    <?php
    while ($linha = mysqli_fetch_assoc($professores)) {
        $nome_professor = $linha['nome_professor'];
        $sobrenome_professor = $linha['sobrenome_professor'];
        $cpf_professor = $linha['cpf_professor'];
        $rg_professor = $linha['rg_professor'];
        $endereco_professor = $linha['endereco_professor'];
        $telefone_professor = $linha['telefone_professor'];
        $data_nascimento_professor = $linha['data_nascimento_professor'];
        $email_pessoal_professor = $linha['email_pessoal_professor'];
        $email_educacional_professor = $linha['email_educacional_professor'];
        $senha_educacional_professor = $linha['senha_educacional_professor'];

        echo "<tr>";
        echo "<td>$nome_professor</td>";
        echo "<td>$sobrenome_professor</td>";
        echo "<td>$cpf_professor</td>";
        echo "<td>$rg_professor</td>";
        echo "<td>$endereco_professor</td>";
        echo "<td>$telefone_professor</td>";
        echo "<td>$data_nascimento_professor</td>";
        echo "<td>$email_pessoal_professor</td>";
        echo "<td>$email_educacional_professor</td>";
        echo "<td>$senha_educacional_professor</td>";
        echo "</tr>";
    }
    ?>


</table>

</div>



   






      <!-- CRIAÇÃO DAS TABELAS DAS INFOS DOS PROFESSORES SEPARADAMENTE -->


      <?php
// Consulta SQL para obter a lista de professores
$sqlProfessores = "SELECT DISTINCT cpf_professor, nome_professor, sobrenome_professor FROM professores";

$resultProfessores = $cx->query($sqlProfessores);

if ($resultProfessores->num_rows > 0) {
    // Loop pelos professores
    while ($rowProfessor = $resultProfessores->fetch_assoc()) {
        $cpfProfessor = $rowProfessor["cpf_professor"];
        $nomeProfessor = $rowProfessor["nome_professor"];
        $sobrenomeProfessor = $rowProfessor["sobrenome_professor"];

        // Criar uma tabela para o professor
        $nomeTabelaProfessor = "info_professor_" . $cpfProfessor;
        $sqlCriarTabela = "CREATE TABLE IF NOT EXISTS $nomeTabelaProfessor (
            Disciplina VARCHAR(100),
            Turma VARCHAR(10),
            Curso VARCHAR(100)
        )";

        if ($cx->query($sqlCriarTabela) === TRUE) {
            // Consulta SQL para obter as informações do professor
            $sqlInfoProfessor = "SELECT
                d.nome_uc AS Disciplina,
                t.nome_turma AS Turma,
                c.nome_curso AS Curso
            FROM professores p
            LEFT JOIN lista_disc_prof ld ON p.cpf_professor = ld.id_professor
            LEFT JOIN unidade_curricular d ON ld.id_unidade_curricular = d.id_unid_curricular
            LEFT JOIN lista_prof_turma lpt ON p.cpf_professor = lpt.id_professor
            LEFT JOIN turmas t ON lpt.id_turma = t.id_turma
            LEFT JOIN cursos c ON t.id_curso = c.id_curso
            WHERE p.cpf_professor = '$cpfProfessor'";

            $resultInfoProfessor = $cx->query($sqlInfoProfessor);

            if ($resultInfoProfessor->num_rows > 0) {
             
                echo '<table class="table table-bordered tabela-customizada" id="tabela-professores-atualizar">';
                echo "<tr><td colspan='4'>$nomeProfessor $sobrenomeProfessor</td></tr>";
                echo "<th >Disciplina</th>";
                echo "<th>Turma</th>";
                echo "<th>Curso</th>";
                echo "</tr>";
                // Loop pelas informações do professor e insira na tabela do professor
                while ($rowInfoProfessor = $resultInfoProfessor->fetch_assoc()) {
                    $disciplina = $rowInfoProfessor["Disciplina"];
                    $turma = $rowInfoProfessor["Turma"];
                    $curso = $rowInfoProfessor["Curso"];
                    
                    echo "<tr>";
                    echo "<td>$disciplina</td>";
                    echo "<td>$turma</td>";
                    echo "<td>$curso</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        }
    }
} else {
   
}

$cx->close();
?>








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

function avisoAtualizado(){
    Swal.fire({
        position: 'relative',
        icon: 'success',
        title: 'Dados atualizados com sucesso!',
        showConfirmButton: false,
        timer: 1700
      })
    }
</script>
</html>