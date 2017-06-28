<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../model/dados/conexaoBanco.php';
ini_set('display_errors', 1);


    $conexao = new conexaoBanco();
    $nome = $_POST['nomeProfessor'];
    $senha = $_POST['senhaAluno'];
    $titulacao = $_POST['titulacaoProfessor'];
    $email = $_POST['emailAluno'];
    
    $query = "INSERT INTO professor (nomeProfessor, senhaProfessor, titulacaoProfessor, emailProfessor) VALUES ('$nome','$senha','$titulacao','$email');";
    
    echo $conexao->requisicoesBanco($query);
    
    header("Location: ../view/home_professor.html");