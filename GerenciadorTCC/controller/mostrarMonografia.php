<?php

$id = $_POST['idTcc'];

if (isset($_POST['verTcc'])) {
    $query = "SELECT * from tcc WHERE idTcc=$id;";

    $con = mysqli_connect("localhost", "root", "96091262375", "progweb");
    $result = mysqli_query($con, $query);

    if ($result) {

        $row = mysqli_fetch_assoc($result);
        header('Content-type: application/pdf');
        header('Content-Disposition: inline;');
        header('Accept-Rangers: bytes');
        echo $row['monografiaTcc'];
    } else {
        echo 'n vai dar nao';
    }
}

