<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ConnectionFactory {

    var $host = "servidor";
    var $usuario = "usuario";
    var $senha = "senha";
    var $banco = "banco";
    private $mysqli;

    public function Abrir() {
        $this->mysqli = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);
    }

    public function Fechar() {
        $this->mysqli->close();
    }

}
