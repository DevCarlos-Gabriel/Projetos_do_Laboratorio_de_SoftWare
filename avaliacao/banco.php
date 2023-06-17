<?php

/*$hostname_conexao = "localhost";
$database_conexao = "dblabweb";
$username_conexao = "root";
$password_conexao = "";


$conexao = new mysqli($hostname_conexao, $username_conexao, $password_conexao, $database_conexao);


//mysqli_select_db($database_conexao, $conexao);
$conexao->query("SET NAMES 'utf8'");
$conexao->query('SET character_set_connection=utf8');//E
$conexao->query('SET character_set_client=utf8');
$conexao->query('SET character_set_results=utf8');

if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
echo mysqli_connect_error();*/

$hostname_conexao = "localhost";
$database_conexao = "dblabweb";
$username_conexao = "root";
$password_conexao = "";

$conexao = new mysqli($hostname_conexao, $username_conexao, $password_conexao, $database_conexao);

if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}

$conexao->set_charset("utf8");

// Resto do seu código aqui...




?>