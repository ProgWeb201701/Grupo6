<?php

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

$resultProfessor = mysqli_query($con, "SELECT * FROM professor WHERE "
        . "emailProfessor = '$usuario' AND senhaProfessor = '$senha';");

$resultAluno = mysqli_query($con, "SELECT * FROM aluno WHERE "
        . "emailAluno = '$usuario' AND senhaAluno = '$senha';");

if (mysqli_num_rows($resultProfessor) > 0) {
    $_SESSION['login'] = $usuario;
    $_SESSION['senha'] = $senha;
    $_SESSION['professorTabela'] = mysqli_fetch_assoc($resultProfessor);

    header('Location:../view/home_professor.php');
} else if (mysqli_num_rows($resultAluno) > 0) {
    $_SESSION['login'] = $usuario;
    $_SESSION['senha'] = $senha;
    $_SESSION['alunoTabela'] = mysqli_fetch_assoc($resultAluno);


    header('Location:../view/home_aluno.php');
} else {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    echo 'não deu';
    header('Location:../view/index.php');
}

