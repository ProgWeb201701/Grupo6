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

$con = mysqli_connect("localhost", "root", "96091262375", "progweb");
$result = mysqli_query($con, $query);

header("Location: ../view/index.php");