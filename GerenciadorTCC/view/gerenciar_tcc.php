<!DOCTYPE html>
<html>
    <head>
        <title>Gerenciador de TCC</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>
    <body>

        <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
                <li><a href="../view/home_professor.php">Home</a></li>
                <li><a href="../view/gerenciar_tcc.php">Gerenciar TCC</a></li>
                <li><a href="../view/index.php">Sair<?php session_abort() ?></a></li>
            </ul>
        </nav>

        <div id="gerenciarTcc">
            <fieldset>
                <h2>Criar de TCC</h2>

                <form method="POST" action='../controller/cadastrarTcc.php'>


                    Título:<br>
                    <input class="inputLogin" name="tituloTcc" type="text"><br><br>

                    Orientando:<br>
                    <select name="orientandoTcc">
                        <?php
                        $con = mysqli_connect("localhost", "root", "96091262375", "progweb");
                        $sql = "SELECT * FROM aluno;";

                        if ($result = mysqli_query($con, $sql)) {
                            while ($obj = mysqli_fetch_object($result)) {
                                echo '<option value="' . $obj->idAluno . '">' . $obj->nomeAluno . '</option>';
                            }
                            // Free result set
                            mysqli_free_result($result);
                        }
                        mysqli_close($con);
                        ?>
                    </select><br><br>             

                    Orientador:<br>
                    <select name="orientadorTcc">
                        <?php
                        $con = mysqli_connect("localhost", "root", "96091262375", "progweb");
                        $sql = "SELECT * FROM professor;";

                        if ($result = mysqli_query($con, $sql)) {
                            while ($obj = mysqli_fetch_object($result)) {
                                echo '<option value="' . $obj->idProfessor . '">' . $obj->nomeProfessor . '</option>';
                            }
                            // Free result set
                            mysqli_free_result($result);
                        }
                        mysqli_close($con);
                        ?>
                    </select><br><br>  

                    Avaliador 1:<br>
                    <select name="avaliadorUm">
                        <?php
                        $con = mysqli_connect("localhost", "root", "96091262375", "progweb");
                        $sql = "SELECT * FROM professor;";

                        if ($result = mysqli_query($con, $sql)) {
                            while ($obj = mysqli_fetch_object($result)) {
                                echo '<option value="' . $obj->idProfessor . '">' . $obj->nomeProfessor . '</option>';
                            }
                            // Free result set
                            mysqli_free_result($result);
                        }
                        mysqli_close($con);
                        ?>
                    </select><br><br>

                    Avaliador 2:<br>
                    <select name="avaliadorDois">
                        <?php
                        include '../controller/lerProfessor.php';
                        $ler = new lerProfessor();
                        $result = $ler->lerTabela('professor');
                        

                        if ($result) {
                            while ($obj = mysqli_fetch_object($result)) {
                                echo '<option value="' . $obj->idProfessor . '">' . $obj->nomeProfessor . '</option>';
                            }
                            mysqli_free_result($result);
                        }
                        ?>
                    </select><br><br>

                    <input type="submit" value="Salvar">
                    </fieldset>
                </form>

        </div>
    </body>
</html>
