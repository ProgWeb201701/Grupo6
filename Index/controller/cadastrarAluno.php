<?php
include '../Model/BD/ConexaoBanco.php';
ini_set('display_errors', 1);


    $conexao = new ConexaoBanco();
    $conexao->connect();
    $nome = $_POST['nomeAluno'];
    $senha = $_POST['senhaAluno'];
    $email = $_POST['matriculaAluno'];
    echo '<script>alert($nome, $senha, $matricula); </script>';
//echo "$sku > $name  > $price";
    $query = "INSERT INTO aluno (nomeAluno, senhaAluno, matriculaAluno) VALUES ($nome,$email,$senha);";
    $conexao->executeQuery($query);
    $conexao->disconnect();


?>