<?php

ini_set('display_errors', 1);

$nome = $_POST['nomeProfessor'];
$senha = $_POST['senhaProfessor'];
$titulacao = $_POST['titulacaoProfessor'];
$area = $_POST['areaProfessor'];
$email = $_POST['emailProfessor'];

$query = "INSERT INTO professor (nomeProfessor, senhaProfessor, "
        . "titulacaoProfessor, emailProfessor, areaInteresseProfessor) "
        . "VALUES ('$nome','$senha','$titulacao','$email', '$area');";

$con = mysqli_connect("localhost", "root", "", "progweb");
$result = mysqli_query($con, $query);

header("Location: ../view/index.php");