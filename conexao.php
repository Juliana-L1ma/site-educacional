<?php
// Conectar ao banco de dados
$usuario = 'root';
$senha = '';
$database = 'senai117_bd';
$host = 'localhost';

$conn= new mysqli($host, $usuario, $senha, $database);

$query = "SELECT categoria FROM cursos";
$result = mysqli_query($conn, $query);

if (!$conn) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

// Query para selecionar a coluna "nome_curso" da tabela "cursos"
$queryNomeCurso = "SELECT nome_curso FROM cursos";
$resultNomeCurso = mysqli_query($conn, $queryNomeCurso);

if (!$resultNomeCurso) {
    die("Erro na consulta: " . mysqli_error($conn));
}
?>
