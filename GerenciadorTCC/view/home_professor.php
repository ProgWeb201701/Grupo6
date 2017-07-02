<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php
        session_start();
        
        if ((!isset($_SESSION['login']) == true) and ( !isset($_SESSION['senha']) == true)) {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            header('Location:../view/index.php');
        }
        
        $professorLogin = $_SESSION['professorTabela'];
        $con = mysqli_connect("localhost", "root", "96091262375", "progweb");
        $result = mysqli_query($con, "SELECT * FROM professor WHERE idProfessor = ".$professorLogin['idProfessor']);
        $professorTabela = mysqli_fetch_assoc($result);
        
        ?>
        
        <title>Professor</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

        <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="../view/home_professor.php">Home</a></li>
                <li><a href="../view/gerenciar_tcc.php">Gerenciar TCC</a></li>
                <li><a><?php echo $professorTabela['nomeProfessor'] ?></a></li>
                <li><a href="../view/index.php">Sair<?php session_abort() ?></a></li>
            </ul>

        </nav>


        <div id="divCadastrar">

            <fieldset>
            <h2>Edite seu perfil!</h2>
            
            <div id="divLogin">
                <h4>Professor</h4>
                ID:<br>
                <input type="text" value="a">
                <br><br>

                Nome:<br>
                <input class="inputLogin" type="text" placeholder="Nome">
                <br><br>

                Email:<br>
                <input class="inputLogin" type="text" placeholder="Email">
                <br><br>

                Titulação:<br>
                <select class="inputLoginSelect" name="titulacao">
                    <option value="mestrado">Mestrado</option>
                    <option value="Doutorado">Doutorado</option>
                </select>
                <br>
                <br>

                Área de Interesse:<br>
                <select class="inputLoginSelect" name="area de interesse">
                    <option value="prog-web">Programação Web</option>
                    <option value="poo">Programação Orientada a Objetos</option>
                </select>
                <br><br>

                Senha:<br>
                <input class="inputLogin" type="password" placeholder="Senha">
                <br><br>

                <button class="btEditar" id="editarNome" type="button">Salvar</button>          
            </div>
            </fieldset>


        </div>
    </body>
</html>