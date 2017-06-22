<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class criarConexao {

    function requisicaoBanco($query) {
        $con = new Conexao();
        $con->Abrir();
        $re = $con->mysqli->query($query);
        $con->Fechar();
        return $re;
    }

}