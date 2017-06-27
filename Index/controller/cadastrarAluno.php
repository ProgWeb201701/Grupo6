<?php
include '../Model/BD/ConexaoBanco.php';
ini_set('display_errors', 1);




    $conexao = new ConexaoBanco();
    $nome = $_POST['nomeAluno'];
    $senha = $_POST['senhaAluno'];
    $matricula = $_POST['matriculaAluno'];
    $email = $_POST['emailAluno'];
    
    

?>