<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class conexaoBanco {
     protected $host = "localhost";
     protected $usuario = "root";
     protected $senha = "96091262375";
     protected $banco = "progweb";
    private $mysqli;
    function requisicoesBanco($query) {
        $this->Abrir();
        $re = $this->mysqli->query($query);
        $this->Fechar();
        return $re;
    }
    public function Abrir() {
        $this->mysqli = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);
    }
    public function Fechar() {
        $this->mysqli->close();
    }
}