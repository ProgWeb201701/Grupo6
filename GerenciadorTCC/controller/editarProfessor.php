<?php

ini_set('display_errors', 1);


$nome = $_POST['nomeProfessor'];
$senha = $_POST['senhaProfessor'];
$titulacao = $_POST['titulacaoProfessor'];
$email = $_POST['emailProfessor'];
$area = $_POST['areaProfessor'];
$id = $_POST['idProfessor'];

$query = "UPDATE professor SET nomeProfessor = '$nome', emailProfessor = "
        . "'$email', senhaProfessor = '$senha', titulacaoProfessor = "
        . "'$titulacao', areaInteresseProfessor = '$area' WHERE "
        . "idProfessor = $id;";

$con = mysqli_connect("localhost", "root", "96091262375", "progweb");
mysqli_query($con, $query);


header("Location: ../view/home_professor.php");