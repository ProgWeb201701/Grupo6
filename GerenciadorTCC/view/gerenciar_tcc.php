<!DOCTYPE html>
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
        $result = mysqli_query($con, "SELECT * FROM professor WHERE idProfessor = " . $professorLogin['idProfessor']);
        $professorTabela = mysqli_fetch_assoc($result);

        date_default_timezone_set('America/Sao_Paulo');
        $dataAtual = date('d-m-Y');

        require_once '../controller/lerObjeto.php';
        $ler = new lerObjeto();
        $prof = $ler->lerLinha($professorTabela['idProfessor'], 'coordenador', 'idProfessor');
        $c = 0;
        if ($prof['dataInicio'] < $dataAtual && $dataAtual < $prof['dataFim']) {
            $c = 1;
        }

        $o = 0;
        $tccs = $ler->lerTabela('tcc');
        if ($tccs) {
            while ($obj = mysqli_fetch_object($tccs)) {
                if ($professorTabela['idProfessor'] === $obj->idOrientador) {
                    $o = 1;
                }
            }
            mysqli_free_result($tccs);
        }
        
        $a = 0;
        $tccs = $ler->lerTabela('tcc');
        if ($tccs) {
            while ($obj = mysqli_fetch_object($tccs)) {
                if ($professorTabela['idProfessor'] === $obj->idAvaliadorUm || $professorTabela['idProfessor'] === $obj->idAvaliadorDois) {
                    $a = 1;
                }
            }
            mysqli_free_result($tccs);
        }
        ?>

        <title>Gerenciador de TCC</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

    </head>
    <body>

        <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
                <li><a href="../view/home_professor.php">Home</a></li>
                <li class="active"><a href="../view/gerenciar_tcc.php">Gerenciar TCC</a></li>
                <li><a href="../view/visualizar_tcc.php">Visualizar TCC</a></li>
                <li><a href="../view/avaliar_tcc.php">Avaliar TCC</a></li>
                <li><a><?php echo $professorTabela['nomeProfessor'] ?></a></li>
                <li><a href="../view/index.php">Sair<?php session_abort() ?></a></li>
            </ul>
        </nav>

        <div id="gerenciarTcc">
            <fieldset>
                <h2>Criar de TCC</h2>
                <?php echo 'cor'.$c; echo 'ori'.$o; echo 'ava'.$a;   ?>

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
                        require_once '../controller/lerObjeto.php';
                        $ler = new lerObjeto();
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
        <br>
        
    </body>
</html>