<?php

class lerObjeto {

    function lerTabela($tabela) {
        $con = mysqli_connect("localhost", "root", "96091262375", "progweb");
        $sql = "SELECT * FROM $tabela;";

        $result = mysqli_query($con, $sql);
        mysqli_close($con);

        return $result;
    }

    function lerLinha($id, $tabela, $idTabela) {
        $con = mysqli_connect("localhost", "root", "96091262375", "progweb");
        $result = mysqli_query($con, "SELECT * FROM $tabela WHERE $idTabela = " . $id);
        $linha = mysqli_fetch_assoc($result);
        
        return $linha;
    }

}

?>