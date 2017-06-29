<?php

include '../model/dados/conexaoBanco.php';
ini_set('display_errors', 1);


$conexao = new conexaoBanco();
$nome = $_POST['nomeAluno'];
$senha = $_POST['senhaAluno'];
$matricula = $_POST['matriculaAluno'];
$email = $_POST['emailAluno'];

$query = "INSERT INTO aluno (nomeAluno, senhaAluno, matriculaAluno, emailAluno) "
        . "VALUES ('$nome','$senha','$matricula','$email');";

$conexao->$requisoesBanco($query);

header("Location: ../view/home_aluno.php");
