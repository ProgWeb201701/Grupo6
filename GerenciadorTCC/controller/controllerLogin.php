<?php

include '../model/dados/conexaoBanco.php';
ini_set('display_errors', 1);
session_start();

/**
 * Description of controllerLogin
 *
 * @author Bruno
 */
$usuario = $_POST['usuarioLogin'];
$senha = $_POST['senhaLogin'];
$opcao = $_POST['usuario'];

$con = mysqli_connect("localhost", "root", "96091262375", "progweb");


if ($opcao === 'aluno') {
    $result = mysqli_query($con, "SELECT * FROM aluno WHERE nomeAluno = '$usuario' AND senhaAluno = '$senha';");
    
    
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['login'] = $usuario;
        $_SESSION['senha'] = $senha;
        $_SESSION['alunoTabela'] = mysqli_fetch_assoc($result);
        
        
        header('Location:../view/home_aluno.php');
    } else {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('Location:../view/index.php');
    }
} else if ($opcao === 'professor'){
        $result = mysqli_query($con, "SELECT * FROM professor WHERE nomeProfessor = '$usuario' AND senhaProfessor = '$senha';");

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['login'] = $usuario;
        $_SESSION['senha'] = $senha;
        header('Location:../view/home_professor.php');
    } else {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('Location:../view/index.php');
    }
}
?>