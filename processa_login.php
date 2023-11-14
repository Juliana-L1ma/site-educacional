<?php
session_start();
require_once("conexao.php"); // Arquivo de conexão com o banco de dados

$email = $_POST['email'];
$senha = $_POST['senha'];

// Verifica na tabela "aluno"
$query = "SELECT num_matricula_aluno FROM alunos WHERE email_educacional_aluno = '$email' AND senha_educacional_aluno = '$senha'";
$resultAluno = mysqli_query($conn, $query);

 // ...
if ($resultAluno && mysqli_num_rows($resultAluno) > 0) {

    // O usuário é um aluno
    $_SESSION['tipo_usuario'] = 'alunos';
    $_SESSION["email"] = $email;
    $_SESSION["senha"] = $senha;
    $usuario = mysqli_query($conn, "SELECT * FROM alunos WHERE email_educacional_aluno = '$email' AND senha_educacional_aluno = '$senha'");
    
    while($linha = mysqli_fetch_assoc($usuario)){
        $_SESSION['num_matricula_aluno'] = $linha['num_matricula_aluno'];
        $_SESSION['nome_aluno'] = $linha['nome_aluno'];
        $_SESSION["id_usuario"] = $linha["num_matricula_aluno"];
        $_SESSION["nome_usuario"] = $linha["nome_aluno"];
        $_SESSION["sobrenome_usuario"] = $linha["sobrenome_aluno"];
    }
    
    header("Location: homeAlunoTeste.php");
    exit();
}
// ...




//verifica se o aluno está logado e faz as ações de pegar imagem 
if ($_SESSION['tipo_usuario'] === 'alunos') {
    $id_usuario = $_SESSION['num_matricula_aluno'];

    // Verifica se uma imagem foi enviada
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $nome_temporario = $_FILES['imagem']['tmp_name'];
        $caminho_destino = 'uploadPerfil' . $id_usuario . '.jpeg'; // Personalize o caminho e o nome do arquivo conforme necessário

        // Move a imagem para o destino
        if (move_uploaded_file($nome_temporario, $caminho_destino)) {
            // Atualiza o banco de dados com o caminho da imagem
            $query = "UPDATE alunos SET fotoDoAluno = '$caminho_destino' WHERE num_matricula_aluno = $id_usuario";
            mysqli_query($conn, $query);
        }
    }


    header("Location: homeAlunoTeste.php");
}


// Verifica na tabela "administrador"
$query = "SELECT id_adm FROM administrador WHERE email_administrativo = '$email' AND senha_administrativa = '$senha'";
$resultAdm = mysqli_query($conn, $query);


if ($resultAdm && mysqli_num_rows($resultAdm) > 0) {
    // O usuário é um administrador
    $_SESSION['tipo_usuario'] = 'administrador';
    $_SESSION["email"] = $email;
    $_SESSION["senha"] = $senha;
    $usuario = mysqli_query($conn, "SELECT * FROM administrador WHERE email_administrativo = '$email' AND senha_administrativa = '$senha'");

    while($linha = mysqli_fetch_assoc($usuario)){
        $_SESSION["id_usuario"] = $linha["id_adm"];
        $_SESSION["nome_usuario"] = $linha["nome_adm"];
    }
    header("Location: areaAdministrador.php");
    exit();
}



// Verifica na tabela "professores"
$query = "SELECT nif_professor FROM professores WHERE email_educacional_professor = '$email' AND senha_educacional_professor = '$senha'";
$resultProf = mysqli_query($conn, $query);

if ($resultProf && mysqli_num_rows($resultProf) > 0) {
    // O usuário é um professor
    $_SESSION['tipo_usuario'] = 'professores';
    $_SESSION["email"] = $email;
    $_SESSION["senha"] = $senha;
    $usuario = mysqli_query($conn, "SELECT * FROM professores WHERE email_educacional_professor = '$email' AND senha_educacional_professor = '$senha'");

        while($linha = mysqli_fetch_assoc($usuario)){
            $_SESSION["id_usuario"] = $linha["nif_professor"];
            $_SESSION["nome_usuario"] = $linha["nome_professor"];
        }

    header("Location: homeProfessor.php");
    exit();
}

// Se não encontrou nas tabelas, o login falhou
header("Location: login.php?erro=1");
exit();
?>
