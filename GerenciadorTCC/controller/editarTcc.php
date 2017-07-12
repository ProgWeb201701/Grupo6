<?php

ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['tituloTcc'];
    $orientador = $_POST['orientadorTcc'];
    $orientando = $_POST['orientandoTcc'];
    $avaliador1 = $_POST['Avaliador1Tcc'];
    $avaliador2 = $_POST['Avaliador2Tcc'];
    $id = $_POST['idTcc'];

    if (isset($_POST['btEditar'])) {
        $query = "UPDATE tcc SET tituloTcc = '$titulo', idOrientando = $orientando, "
                . "idOrientador = $orientador, idAvaliadorUm = $avaliador1,"
                . " idAvaliadorDois = $avaliador2 WHERE idTcc = $id;";

        $con = mysqli_connect("localhost", "root", "", "progweb");
        mysqli_query($con, $query);
    } else if (isset ($_POST['btExcluir'])) {
        $query = "DELETE from tcc WHERE idTcc=$id";

        $con = mysqli_connect("localhost", "root", "", "progweb");
        mysqli_query($con, $query);
    }
}







header("Location: ../view/gerenciar_tcc.php");
