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
                if ($professorTabela['idProfessor'] === $obj->idAvaliadorUm ||
                        $professorTabela['idProfessor'] === $obj->idAvaliadorDois) {
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

        <div style="border: 1px solid black;" id="gerenciarTcc">

            <h2>Criar de TCC</h2>
            <?php
            echo 'cor' . $c;
            echo 'ori' . $o;
            echo 'ava' . $a;
            ?>

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

            </form>

        </div>
        <br>

        <div style="border: 1px solid black;" id="mostrarTcc">
            <h2>TCCs Cadastrados</h2>

            <?php
            require_once '../controller/lerObjeto.php';
            $ler = new lerObjeto();
            $result = $ler->lerTabela('tcc');

            if ($result) {

                while ($obj = mysqli_fetch_object($result)) {
                    echo '<form method="POST" action="../controller/editarTcc.php">';
                    $orientando = $ler->lerLinha($obj->idOrientando, 'aluno', 'idAluno');
                    $orientador = $ler->lerLinha($obj->idOrientador, 'professor', 'idProfessor');
                    $avaliador1 = $ler->lerLinha($obj->idAvaliadorUm, 'professor', 'idProfessor');
                    $avaliador2 = $ler->lerLinha($obj->idAvaliadorDois, 'professor', 'idProfessor');

                    echo '<input readonly name="idTcc" value="' . $obj->idTcc . '"><br>';
                    echo '<input name="tituloTcc" value="' . $obj->tituloTcc . '"><br>';

                    echo '<select name="orientandoTcc">';
                    $con = mysqli_connect("localhost", "root", "96091262375", "progweb");
                    $sql = "SELECT * FROM aluno ORDER BY nomeAluno;";


                    if ($result2 = mysqli_query($con, $sql)) {
                        while ($obj = mysqli_fetch_object($result2)) {
                            echo '<option ';
                            if ($obj->nomeAluno === $orientando['nomeAluno']) {
                                echo 'selected';
                            }
                            echo ' value="' . $obj->idAluno . '">' . $obj->nomeAluno . '</option>';
                        }
                        // Free result set
                        mysqli_free_result($result2);
                    }
                    mysqli_close($con);
                    echo '</select><br><br>';

                    echo '<select name="orientadorTcc">';
                    $con2 = mysqli_connect("localhost", "root", "96091262375", "progweb");
                    $sql2 = "SELECT * FROM professor ORDER BY nomeProfessor;";



                    if ($result3 = mysqli_query($con2, $sql2)) {
                        while ($objOri = mysqli_fetch_object($result3)) {

                            echo '<option ';
                            if ($objOri->nomeProfessor === $orientador['nomeProfessor']) {
                                echo 'selected';
                            }
                            echo ' value="' . $objOri->idProfessor . '">' . $objOri->nomeProfessor . '</option>';
                        }
                        // Free result set
                        mysqli_free_result($result3);
                    }
                    mysqli_close($con);
                    echo '</select><br><br>';

                    echo '<select name="Avaliador1Tcc">';
                    $con3 = mysqli_connect("localhost", "root", "96091262375", "progweb");
                    $sql3 = "SELECT * FROM professor ORDER BY nomeProfessor;";

                    if ($result4 = mysqli_query($con3, $sql3)) {
                        while ($objAva1 = mysqli_fetch_object($result4)) {

                            echo '<option ';
                            if ($objAva1->nomeProfessor === $avaliador1['nomeProfessor']) {
                                echo 'selected';
                            }
                            echo ' value="' . $objAva1->idProfessor . '">' . $objAva1->nomeProfessor . '</option>';
                        }
                        // Free result set
                        mysqli_free_result($result4);
                    }
                    mysqli_close($con);
                    echo '</select><br><br>';

                    echo '<select name="Avaliador2Tcc">';
                    $con4 = mysqli_connect("localhost", "root", "96091262375", "progweb");
                    $sql4 = "SELECT * FROM professor ORDER BY nomeProfessor;";


                    if ($result5 = mysqli_query($con4, $sql4)) {
                        while ($objAva2 = mysqli_fetch_object($result5)) {
                            echo '<option ';
                            if ($objAva2->nomeProfessor === $avaliador2['nomeProfessor']) {
                                echo 'selected';
                            }
                            echo ' value="' . $objAva2->idProfessor . '">' . $objAva2->nomeProfessor . '</option>';
                        }
                        // Free result set
                        mysqli_free_result($result5);
                    }
                    mysqli_close($con);
                    echo '</select><br><br>';

                    echo '<input type="submit" value="Editar"><br><br>';
                    echo '</form>';
                }


                mysqli_free_result($result);
            }
            ?>
        </div>


    </body>
</html>