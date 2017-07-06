<?php

ini_set('display_errors', 1);


$titulo = $_POST['tituloTcc'];
$orientador = $_POST['orientadorTcc'];
$orientando = $_POST['orientandoTcc'];
$avaliador1 = $_POST['Avaliador1Tcc'];
$avaliador2 = $_POST['Avaliador2Tcc'];
$id = $_POST['idTcc'];

$query = "UPDATE tcc SET tituloTcc = '$titulo', idOrientando = $orientando, "
        . "idOrientador = $orientador, idAvaliadorUm = $avaliador1,"
        . " idAvaliadorDois = $avaliador2 WHERE idTcc = $id;";

$con = mysqli_connect("localhost", "root", "96091262375", "progweb");
mysqli_query($con, $query);


header("Location: ../view/gerenciar_tcc.php");