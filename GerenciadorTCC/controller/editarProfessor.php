<?php

ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nomeProfessor'];
    $senha = $_POST['senhaProfessor'];
    $titulacao = $_POST['titulacaoProfessor'];
    $email = $_POST['emailProfessor'];
    $area = $_POST['areaProfessor'];
    $id = $_POST['idProfessor'];

    if (isset($_POST['btEditarProfessor'])) {
        $query = "UPDATE professor SET nomeProfessor = '$nome', emailProfessor = "
                . "'$email', senhaProfessor = '$senha', titulacaoProfessor = "
                . "'$titulacao', areaInteresseProfessor = '$area' WHERE "
                . "idProfessor = $id;";

        $con = mysqli_connect("localhost", "root", "96091262375", "progweb");
        mysqli_query($con, $query);
        
        header('Location:../view/home_professor.php');
    } else if (isset ($_POST['btExcluirProfessor'])) {
        $query = "DELETE FROM professor WHERE idProfessor=$id";

        $con = mysqli_connect("localhost", "root", "96091262375", "progweb");
        mysqli_query($con, $query);
        
        header('Location:../view/index.php');
    }
}