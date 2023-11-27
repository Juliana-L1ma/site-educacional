<?php
session_start();
// Recupere o nome do usuário da sessão
$usuarioBoletim = 'Olá, ' . $_SESSION["nome_usuario"];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>Boletim</title>
</head>

<body>
    <header class="header-professor-adm">
        <div class="div-cabecalho" id="modo-desktop">
            <ul>
                <a href="./homeAluno.php">
                    <li>Home</li>
                </a>
                <a href="homeAluno.php">
                    <li>Perfil</li>
                </a>
                <a href="">
                    <li>Sobre o Senai</li>
                </a>
            </ul>
        </div>
        <div class="div-cabecalho" id="modo-mobile">
            <nav id="nav-menu-hamburguer">
                <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu"
                    aria-expanded="false">
                    <span id="hamburger">
                        <img src="./img/barra-de-menu.png"
                            alt="Menu aberto ícones criados por verry purnomo - Flaticon" />
                    </span>
                </button>
                <ul id="menu" role="menu">
                    <br>
                    <li><a class="header-item" href="./homeAluno.php">Home</a></li><br>
                    <hr>
                    <br>
                    <li> <a class="header-item" href="products.html">Perfil</a></li><br>
                    <hr>
                    <br>
                    <li><a class="header-item" href="aboutus.html">Sobre o SENAI</a></li> <br>
                    <hr>
                </ul>
            </nav>
        </div>
        <div class="div-cabecalho" id="modo-mobilee">
            <a href="homeAluno.php"
                title="Perfil ícones criados por inkubators - Flaticon" id="icone-perfil">
                <img src="./img/perfil-de-usuario.png" />
            </a>
            <a href="https://www.flaticon.com/br/icones-gratis/engrenagem"
                title="Engrenagem ícones criados por Freepik - Flaticon" id="icone-engrenagem"> <img
                    src="./img/engrenagem.png" />
            </a>
        </div>
    </header>

    <nav class="topo-boletim">
    <?php
     require_once("conexao.php");
    //Selecionando o banco de dados 
    $conexao = new mysqli("localhost", "root", "", "senai117_bd");


if($_SESSION["email"] !== "" && $_SESSION["senha"]){
  // Acessa a variável de sessão "email"
  $email_usuarioLogado = $_SESSION["email"];
  $senha_usuarioLogado = $_SESSION["senha"];
  $num_matricula = $_SESSION["id_usuario"];
}

if ($_SESSION['tipo_usuario'] === 'alunos' && isset($_SESSION['num_matricula_aluno'])) {
    $id_usuario = $_SESSION['num_matricula_aluno'];
    $query = "SELECT fotoDoAluno FROM alunos WHERE num_matricula_aluno = $id_usuario";
    $result = mysqli_query($conn, $query);
  
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $caminho_imagem = $row['fotoDoAluno'];
  
        if (!empty($caminho_imagem)) {
          echo '<img src="' . $caminho_imagem . '" id="foto-do-aluno"  alt="Imagem do Aluno">';
      } else {
          // echo 'Nenhuma imagem de perfil encontrada.';
      }
    }
  }

?>

        <div id="info-aluno-boletim">
            <h2 id="tituloBoletim"><p id="nomeDoAluno-boletim"><?php echo $usuarioBoletim;?>!</p>
            </h2>
        </div>
    </nav>

    <hr id="linhaVerde-separacao">

    <h2 class="boletim-titulo">Boletim geral</h2>
    <?php
        //Iniciando a conexão com o banco de dados 
        $conexao = mysqli_connect("localhost", "root", "");
   
        //Selecionando o banco de dados 
        $db = mysqli_select_db($conexao, "senai117_bd");
      $view_boletim = mysqli_query($conexao, "SELECT * FROM view_boletim WHERE id_aluno = '$num_matricula'");

      ?>

      <!-- /////////////// para fazer uma tabela, crio a tag table > thead > tbody > th (para os títulos) e fecho todas as tags menos a table. Depois de thead crio um php dentro para colocar as tds  -->
    <table class="table table-bordered" id="tabela-professores-atualizar">
        <thead>
            <!-- <tr class="th"> -->
        <tbody>
            <th>Unidade Curricular</th>
            <th>Nota/situação</th>
            <th>Frequência</th>
            <th>Faltas</th>
        </tbody>
        </tr>
        </thead>

       <?php
       while ($linha = mysqli_fetch_assoc($view_boletim)) {
        $id_unid_curricular = $linha['materia'];
        $nota_boletim = $linha['notas_boletim'];
        $frequencia_boletim = $linha['frequencia'];
        $faltas = $linha['faltas'];
        $id_aluno = $linha['id_aluno'];
        
         echo "<tr>";
         echo "<td>$id_unid_curricular</td>";
         echo "<td>$nota_boletim</td>";
         echo "<td>$frequencia_boletim</td>";
         echo "<td>$faltas</td>";
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


    <!-- TABELAS COM PHP PELA UNIDADE CURRICULAR -->
    <!-- <table class="table table-bordered" id="">
        <thead>
        <tbody>
            <th>Nota/situação</th>
            <th>Frequência</th>
            <th>Faltas</th>
        </tbody>
        </tr>
        </thead>

       <php
       while ($linha = mysqli_fetch_assoc($view_boletim)) {
        $id_unid_curricular = $linha['materia'];
        $nota_boletim = $linha['notas_boletim'];
        $frequencia_boletim = $linha['frequencia'];
        $faltas = $linha['faltas'];
        $id_aluno = $linha['id_aluno'];
        
         echo "<tr>";
         echo "<td>$id_unid_curricular</td>";
         echo "<td>$nota_boletim</td>";
         echo "<td>$frequencia_boletim</td>";
         echo "<td>$faltas</td>";
         echo "</tr>";
     }
     >

    </table> -->

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
                    <p class="tituloRodape">Site SENAI oficial:</p>
                    <hr>
                    <p class="textoRodape">Acesse o site oficial do SENAI para ver outras informações <a
                            href="https://www.sp.senai.br/">Clique aqui</a></p>
                </div>

                <div class="col-6">
                    <div class="contatos">
                        <p class="tituloRodape">Contatos</p>
                        <hr>
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
                        Esse site foi produzido pelas alunas citadas acima no curso de Desenvolvimento de Sistemas do
                        Senai "Nami Jafet" para uso escolar e administrativo
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
