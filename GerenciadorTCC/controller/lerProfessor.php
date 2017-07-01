<?php

class lerProfessor {

    function lerTabela($tabela) {
        $con = mysqli_connect("localhost", "root", "96091262375", "progweb");
        $sql = "SELECT * FROM $tabela;";
        
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        
        return $result;
    }
    
}