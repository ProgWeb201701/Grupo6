<?php

$id = $_POST['idTcc'];

if (isset($_POST['upload'])) {
//    if (getimagesize($_FILES['monografiaTcc']['tmp_name']) == FALSE) {
//        echo 'Selecione um arquivo.';
//    } else {
        $arquivo = addslashes(file_get_contents($_FILES['monografiaTcc']['tmp_name']));
        $nome = addslashes($_FILES['monografiaTcc']['name']);
        
        salvarArquivo($arquivo, $nome, $id);
//    }
}

function salvarArquivo($arquivo, $nome, $id) {
    $query = "update tcc set monografiaTcc = '$arquivo' where idTcc =$id;";

    $con = mysqli_connect("localhost", "root", "96091262375", "progweb");
    $result = mysqli_query($con, $query);

    if ($result) {
        echo 'File uploaded';
    } else {
        echo 'File not uploaded';
    }
}

if (isset($_POST['mostrar'])) {
    $query = "SELECT * from arquivo;";

    $con = mysqli_connect("localhost", "root", "96091262375", "progweb");
    $result = mysqli_query($con, $query);

    if ($result) {

        while ($row = mysqli_fetch_array($result)) {
            echo 'foi';
        }
    } else {
        echo 'n vai dar nao';
    }
}

//$arquivo = $_FILES['monografiaTcc']['tmp_name'];
//
//$monografia = file_get_contents($arquivo);
//
//
//$query = "UPDATE tcc SET monografiaTcc =$monografia WHERE idTcc = 3;";
////
//$con = mysqli_connect("localhost", "root", "96091262375", "progweb");
//$result = mysqli_query($con, $query);
//header("Location: ../view/home_aluno.php");