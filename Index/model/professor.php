<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Professor {

    public $idProfessor;
    public $nomeProfessor;
    public $emailProfessor;
    public $senhaProfessor;

    function __construct($idProfessor, $nomeProfessor, $emailProfessor, $senhaProfessor) {
        $this->idProfessor = $idProfessor;
        $this->nomeProfessor = $nomeProfessor;
        $this->emailProfessor = $emailProfessor;
        $this->senhaProfessor = $senhaProfessor;
    }

    function setIdProfessor($idProfessor) {
        $this->idProfessor = $idProfessor;
    }

    function setNomeProfessor($nomeProfessor) {
        $this->nomeProfessor = $nomeProfessor;
    }

    function setEmailProfessor($emailProfessor) {
        $this->emailProfessor = $emailProfessor;
    }

    function setSenhaProfessor($senhaProfessor) {
        $this->senhaProfessor = $senhaProfessor;
    }

}
