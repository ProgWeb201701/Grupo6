<?php

include '../model/dados/conexaoBanco.php';
ini_set('display_errors', 1);

$nome = $_POST['nomeAluno'];
$senha = $_POST['senhaAluno'];
$matricula = $_POST['matriculaAluno'];
$email = $_POST['emailAluno'];

$query = "INSERT INTO aluno (nomeAluno, senhaAluno, matriculaAluno, emailAluno) "
        . "VALUES ('$nome','$senha','$matricula','$email');";

$con = mysqli_connect("localhost", "root", "", "progweb");
$result = mysqli_query($con, $query);


header('Location:../view/index.php');