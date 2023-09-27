<?php
// Conectar ao banco de dados
$usuario = 'root';
$senha = '';
$database = 'senai117_bd';
$host = 'localhost';

$conn= new mysqli($host, $usuario, $senha, $database);

if (!$conn) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}
?>