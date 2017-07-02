<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$titulo = $_POST['tituloTcc'];
$orientando = $_POST['orientandoTcc'];
$orientador = $_POST['orientadorTcc'];
$avaliador1 = $_POST['avaliadorUm'];
$avaliador2 = $_POST['avaliadorDois'];

$query = "INSERT INTO tcc (tituloTcc, idOrientando, idOrientador, idAvaliadorUm,"
        . " idAvaliadorDois) VALUES ('$titulo',$orientando,$orientador, "
        . "$avaliador1, $avaliador2);";

$con = mysqli_connect("localhost", "root", "96091262375", "progweb");
$result = mysqli_query($con, $query);

header("Location: ../view/home_professor.php");