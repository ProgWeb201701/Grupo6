<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Aluno {
    public $nomeAluno;
    public $senhaAluno;
    public $matriculaAluno;
    public $idAluno;
    
    function __construct($nomeAluno, $senhaAluno, $matriculaAluno, $idAluno) {
        $this->nomeAluno = $nomeAluno;
        $this->senhaAluno = $senhaAluno;
        $this->matriculaAluno = $matriculaAluno;
        $this->idAluno = $idAluno;
    }
    function setNomeAluno($nomeAluno) {
        $this->nomeAluno = $nomeAluno;
    }

    function setSenhaAluno($senhaAluno) {
        $this->senhaAluno = $senhaAluno;
    }

    function setMatriculaAluno($matriculaAluno) {
        $this->matriculaAluno = $matriculaAluno;
    }

    function setIdAluno($idAluno) {
        $this->idAluno = $idAluno;
    }
    
}