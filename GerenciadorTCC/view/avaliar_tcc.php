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
        $result = mysqli_query($con, "SELECT * FROM professor WHERE idProfessor = "
                . $professorLogin['idProfessor']);
        $professorTabela = mysqli_fetch_assoc($result);

                date_default_timezone_set('America/Sao_Paulo');
        $dataAtual = date('d-m-Y');
        //Coordenador
        require_once '../controller/lerObjeto.php';
        $ler = new lerObjeto();
        $prof = $ler->lerLinha($professorTabela['idProfessor'], 'coordenador', 'idProfessor');
        $c = 0;
        if ($prof['dataInicio'] < $dataAtual && $dataAtual < $prof['dataFim']) {
            $c = 1;
        }
        //Orientador
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
        //Avaliador
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

        <title>Avaliar TCC</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    </head>
    <body>

        <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
                <li><a href="../view/home_professor.php">Home</a></li>
                <?php
                echo '<li><a ';
                if ($c === 1) {
                    echo 'href="../view/gerenciar_tcc.php"';
                } else {
                    echo ' ';
                }
                echo'>Gerenciar TCC</a></li>';
                echo '<li class="active"><a ';

                if ($a === 1) {
                    echo 'href = "../view/avaliar_tcc.php"';
                } else {
                    echo '';
                }
                echo '>Avaliar TCC</a></li>';
                echo '<li><a href = "../view/visualizar_tcc.php">Visualizar TCC</a></li>';
                echo '<li><a>'.$professorTabela['nomeProfessor'].'</a></li>';
                echo '<li><a href="../view/index.php">Sair</a></li>';
                ?>
                

            </ul>
        </nav>


        <?php
        echo 'cor' . $c;
        echo 'ori' . $o;
        echo 'ava' . $a;
        ?>


        <div style="border: 1px solid black;" id="mostrarTcc">
            <h2>TCCs Cadastrados</h2>

            <?php
            require_once '../controller/lerObjeto.php';
            $ler = new lerObjeto();
            $result = $ler->lerTabela('tcc');

            if ($result) {
                
                while ($obj = mysqli_fetch_object($result)) {
echo '<form method="POST" action="../controller/avaliarTcc.php">';
                    $orientando = $ler->lerLinha($obj->idOrientando, 'aluno', 'idAluno');
                    $orientador = $ler->lerLinha($obj->idOrientador, 'professor', 'idProfessor');
                    $avaliador1 = $ler->lerLinha($obj->idAvaliadorUm, 'professor', 'idProfessor');
                    $avaliador2 = $ler->lerLinha($obj->idAvaliadorDois, 'professor', 'idProfessor');

                    echo '<input readonly name="idTcc" value="' . $obj->idTcc . '"><br>';
                    echo '<input readonly value="' . $obj->tituloTcc . '"><br>';
                    echo '<input readonly value="' . $orientando['nomeAluno'] . '"><br>';
                    echo '<input readonly value="' . $orientador['nomeProfessor'] . '"><br>';
                    echo '<input readonly value="' . $avaliador1['nomeProfessor'] . '"><br>';
                    echo '<input readonly value="' . $avaliador2['nomeProfessor'] . '"><br>';

                    if (is_null($obj->notaTcc)) {
                        echo '<input type="number" name="notaTcc" placeholder="Avalie aqui..."><br>';
                    } else {
                        echo '<input type="number" name="notaTcc" value="' . $obj->notaTcc . '"><br>';
                    }

                    echo '<input type="submit" value="Avaliar"><br><br>';
                    echo '</form>';
                }
                

                mysqli_free_result($result);
            }
            ?>
        </div>
        <br>
    </body>
</html>