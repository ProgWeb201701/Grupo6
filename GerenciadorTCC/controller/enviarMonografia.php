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

    $con = mysqli_connect("localhost", "root", "", "progweb");
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location: ../view/home_aluno.php?sucesso");
    } else {
        header("Location: ../view/home_aluno.php?erro");
    }
}

if (isset($_POST['mostrar'])) {
    $query = "SELECT * from arquivo;";

    $con = mysqli_connect("localhost", "root", "", "progweb");
    $result = mysqli_query($con, $query);

    if ($result) {

        while ($row = mysqli_fetch_array($result)) {
            echo 'foi';
        }
    } else {
        echo 'n vai dar nao';
    }
}