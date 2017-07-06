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
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>

    <body>

        <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
                <li><a href="../view/home_professor.php">Home</a></li>
                <li><a href="../view/gerenciar_tcc.php">Gerenciar TCC</a></li>
                <li class="active"><a href="../view/visualizar_tcc.php">Visualizar TCC</a></li>
                <li><a href="../view/avaliar_tcc.php">Avaliar TCC</a></li>
                <li><a><?php echo $professorTabela['nomeProfessor'] ?></a></li>
                <li><a href="../view/index.php">Sair<?php session_abort() ?></a></li>
            </ul>
        </nav>


        <div id="mostrarTcc">
            <h2>TCCs Cadastrados</h2>

            <?php
            require_once '../controller/lerObjeto.php';
            $ler = new lerObjeto();
            $result = $ler->lerTabela('tcc');

            if ($result) {
                while ($obj = mysqli_fetch_object($result)) {
                    $orientando = $ler->lerLinha($obj->idOrientando, 'aluno', 'idAluno');
                    $orientador = $ler->lerLinha($obj->idOrientador, 'professor', 'idProfessor');
                    $avaliador1 = $ler->lerLinha($obj->idAvaliadorUm, 'professor', 'idProfessor');
                    $avaliador2 = $ler->lerLinha($obj->idAvaliadorDois, 'professor', 'idProfessor');

                    echo '<div id="divEditarPerfil">';
                    
                    echo '<label>Título: '.$obj->tituloTcc.'</label><br>';                    
                    echo '<label>Orientando: '.$orientando['nomeAluno'].'</label><br>';
                    echo '<label>Orientador: '.$orientador['nomeProfessor'].'</label><br>';
                    echo '<label>Avaliador 1: '.$avaliador1['nomeProfessor'].'</label><br>';
                    echo '<label>Avaliador 2: '.$avaliador2['nomeProfessor'].'</label><br>';
                    echo '<label>Monografia: </label><br>'; 
                    echo '<label>Nota: '.$obj->notaTcc.'</label><br>'; 
                    
                    echo '</div>';
                    
                    echo '<br>';
                }
                mysqli_free_result($result);
            }
            ?>
        </div>

    </body>
</html>