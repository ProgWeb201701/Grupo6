<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

/**
 * Description of controllerLogin
 *
 * @author Bruno
 */
//class controllerLogin {

//    function loginAluno($usuario, $senha) {

        $usuario = $_POST['usuarioLogin'];
        $senha = $_POST['senhaLogin'];

        $result = mysql_query("SELECT * FROM aluno WHERE nomeAluno = '$usuario' AND senhaAluno = '$senha'");

        if (mysql_num_rows($result) > 0) {
//            $nome = $_POST['nomeAluno'];
//            $senha = $_POST['senhaAluno'];
            header("Location: ../view/home_aluno.php");
        } else {
            $lc = new controllerLogin();
            $lc->loginProfessor();
        }
//    }

//    function loginProfessor() {
//
//        $result = mysql_query("SELECT * FROM professor WHERE nomeProfessor = '$usuario' AND senhaProfessor = '$senha'");
//
//        if (mysql_num_rows($result) > 0) {
//            $_SESSION['login'] = $usuario;
//            $_SESSION['senha'] = $senha;
//            header("Location: ../view/home_professor.php");
//        } else {
//            
//        }
//    }

//}
