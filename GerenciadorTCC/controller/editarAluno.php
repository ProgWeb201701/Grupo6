<?php

include '../model/dados/conexaoBanco.php';
ini_set('display_errors', 1);


$conexao = new conexaoBanco();
$nome = $_POST['nomeAluno'];
$senha = $_POST['senhaAluno'];
$matricula = $_POST['matriculaAluno'];
$email = $_POST['emailAluno'];
$id = $_POST['idAluno'];

$query = "UPDATE aluno SET nomeAluno = '$nome', matriculaAluno = '$matricula', emailAluno = '$email', senhaAluno = '$senha' WHERE idAluno = $id;";

$con = mysqli_connect("localhost", "root", "96091262375", "progweb");
mysqli_query($con, $query);

header("Location: ../view/home_aluno.php");