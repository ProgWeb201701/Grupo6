<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Monografia {
    
    public $idMonografia;
    public $tituloMonografia;
    public $temaMonografia;
    public $anoMonografia;
    
    function __construct($idMonografia, $tituloMonografia, $temaMonografia, $anoMonografia) {
        $this->idMonografia = $idMonografia;
        $this->tituloMonografia = $tituloMonografia;
        $this->temaMonografia = $temaMonografia;
        $this->anoMonografia = $anoMonografia;
    }
    
    function setIdMonografia($idMonografia) {
        $this->idMonografia = $idMonografia;
    }

    function setTituloMonografia($tituloMonografia) {
        $this->tituloMonografia = $tituloMonografia;
    }

    function setTemaMonografia($temaMonografia) {
        $this->temaMonografia = $temaMonografia;
    }

    function setAnoMonografia($anoMonografia) {
        $this->anoMonografia = $anoMonografia;
    }



}