<?php

ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nomeAluno'];
    $senha = $_POST['senhaAluno'];
    $matricula = $_POST['matriculaAluno'];
    $email = $_POST['emailAluno'];
    $id = $_POST['idAluno'];

    if (isset($_POST['btEditarAluno'])) {
        $query = "UPDATE aluno SET nomeAluno = '$nome', matriculaAluno = '$matricula', "
                . "emailAluno = '$email', senhaAluno = '$senha' WHERE idAluno = $id;";

        $con = mysqli_connect("localhost", "root", "", "progweb");
        mysqli_query($con, $query);

        header("Location: ../view/home_aluno.php");
    } else if (isset ($_POST['btExcluirAluno'])) {
        $query = "DELETE FROM aluno WHERE idAluno=$id";

        $con = mysqli_connect("localhost", "root", "", "progweb");
        mysqli_query($con, $query);
        
        header('Location:../view/index.php');
    }
}