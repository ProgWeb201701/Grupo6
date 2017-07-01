<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controllerTcc
 *
 * @author Bruno
 */
class controllerTcc {

    function criarTcc() {
        $query = "INSERT INTO aluno (nomeAluno, senhaAluno, matriculaAluno, emailAluno) "
                . "VALUES ('$nome','$senha','$matricula','$email');";

        $con = mysqli_connect("localhost", "root", "96091262375", "progweb");
        $result = mysqli_query($con, $query);
    }

}
