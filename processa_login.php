<?php
session_start();
require_once("conexao.php"); // Arquivo de conexão com o banco de dados

$email = $_POST['email'];
$senha = $_POST['senha'];

// Verifica na tabela "aluno"
$query = "SELECT cpf_aluno FROM alunos WHERE email_educacional_aluno = '$email' AND senha_educacional_aluno = '$senha'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // O usuário é um aluno
    $_SESSION['tipo_usuario'] = 'aluno';
    header("Location: homeAluno.php");
    exit();
}

// Verifica na tabela "administrador"
$query = "SELECT id FROM administrador WHERE email = '$email' AND senha = '$senha'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // O usuário é um administrador
    $_SESSION['tipo_usuario'] = 'administrador';
    header("Location: areaAdministrador.php");
    exit();
}

// Se não encontrou nas tabelas, o login falhou
header("Location: login.php?erro=1");
exit();
?>
