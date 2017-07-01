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

        $logado = $_SESSION['login'];
        $senha = $_SESSION['senha'];
        $alunoLogin = $_SESSION['alunoTabela'];
        $con = mysqli_connect("localhost", "root", "96091262375", "progweb");
        $result = mysqli_query($con, "SELECT * FROM aluno WHERE idAluno = ".$alunoLogin['idAluno']);
        $alunoTabela = mysqli_fetch_assoc($result);
        
        ?>
        <title>Aluno</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

        <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="GerenciarTCC.html">Gerenciar TCC</a></li>
                <li><a><?php echo $alunoTabela['nomeAluno'] ?></a></li>
                <li><a href="../view/index.php">Sair<?php session_abort() ?></a></li>
            </ul>

        </nav>


        <div id="divLogar">
            <h2>Submeta o arquivo da monografia!</h2>

            <input type="file" name=""><br>

        </div>

        <div id="divCadastrar">

            <h2>Edite seu perfil!</h2>

            <div id="divLogin">
                <h4>Aluno</h4>
                <form method="POST" action="../controller/editarAluno.php">
                ID:<br>
                <input  readonly class="inputLogin" type="text" name="idAluno" value="<?php echo $alunoTabela['idAluno']?>"><br>
                <br>
                Nome:<br>
                <input class="inputLogin" type="text" name="nomeAluno" value="<?php echo $alunoTabela['nomeAluno']?>"><br>
                <br>
                Email:<br>
                <input class="inputLogin" type="text" name="emailAluno" value=<?php echo $alunoTabela['emailAluno'] ?>><br>
                <br>
                Matricula:<br>
                <input  readonly class="inputLogin" type="text" name="matriculaAluno" value=<?php echo $alunoTabela['matriculaAluno'] ?>><br>
                <br>
                Senha:<br>
                <input class="inputLogin" type="password" name="senhaAluno" value=<?php echo $senha?>><br>
                <br>
                <button class="btEditar" id="editarNome" type="input">Salvar</button>          
                </form>
            </div>


        </div>
    </body>
</html>