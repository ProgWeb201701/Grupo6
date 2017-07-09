<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
ini_set('display_errors', 1);

$id = $_POST['idTcc'];
$nota = $_POST['notaTcc'];
$comentario = $_POST['comentarioTcc'];


$query = "UPDATE tcc SET notaTcc = $nota, comentarioTcc = '$comentario' WHERE idTcc = $id;";

$con = mysqli_connect("localhost", "root", "96091262375", "progweb");
$result = mysqli_query($con, $query);
header("Location: ../view/avaliar_tcc.php");
