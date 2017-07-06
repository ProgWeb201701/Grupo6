<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
ini_set('display_errors', 1);

$id = $_POST['idTcc'];
$nota = $_POST['notaTcc'];


$query = "UPDATE tcc SET notaTcc = $nota WHERE idTcc = $id;";

        $con = mysqli_connect("localhost", "root", "96091262375", "progweb");
        $result = mysqli_query($con, $query);
header("Location: ../view/home_professor.php");