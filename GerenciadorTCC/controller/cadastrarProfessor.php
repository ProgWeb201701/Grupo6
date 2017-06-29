<?php

include '../model/dados/conexaoBanco.php';
ini_set('display_errors', 1);


$conexao = new conexaoBanco();
$nome = $_POST['nomeProfessor'];
$senha = $_POST['senhaProfessor'];
$titulacao = $_POST['titulacaoProfessor'];
$email = $_POST['emailProfessor'];

$query = "INSERT INTO professor (nomeProfessor, senhaProfessor, titulacaoProfessor, emailProfessor) "
        . "VALUES ('$nome','$senha','$titulacao','$email');";

$conexao->requisicoesBanco($query);

header("Location: ../view/home_professor.php");