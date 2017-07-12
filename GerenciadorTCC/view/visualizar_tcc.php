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
        $con = mysqli_connect("localhost", "root", "", "progweb");
        $result = mysqli_query($con, "SELECT * FROM professor WHERE idProfessor = " . $professorLogin['idProfessor']);
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

        <title>Visualizar TCC</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
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
                echo '<li><a ';

                if ($a === 1) {
                    echo 'href = "../view/avaliar_tcc.php"';
                } else {
                    echo '';
                }
                echo '>Avaliar TCC</a></li>';
                echo '<li class="active"><a href = "../view/visualizar_tcc.php">Visualizar TCC</a></li>';
                echo '<li><a>' . $professorTabela['nomeProfessor'] . '</a></li>';
                echo '<li><a href="../view/index.php">Sair</a></li>';
                ?>


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
                    echo '<form target="_blank" method="post" action="../controller/mostrarMonografia.php">';
                    echo '<input name="idTcc" type="hidden" value="' . $obj->idTcc . '"><br>';
                    echo '
                    <table class="tg">
                    <tr>
                    <th class="tg-ddj9">Título</th>
                    <th class="tg-i81m">' . $obj->tituloTcc . '</th>
                    </tr>
                    
                    <tr>
                    <td class="tg-ddj9">Orientando</td>
                    <td class="tg-i81m">' . $orientando['nomeAluno'] . '</td>
                    </tr>
                    
                    <tr>
                    <td class="tg-ddj9">Orientador</td>
                    <td class="tg-i81m">' . $orientador['nomeProfessor'] . '</td>
                    </tr>
                    
                    <tr>
                    <td class="tg-ddj9">Avaliador 1</td>
                    <td class="tg-i81m">' . $avaliador1['nomeProfessor'] . '</td>
                    </tr>
  
                    <tr>
                    <td class="tg-ddj9">Avaliador 2</td>
                    <td class="tg-i81m">' . $avaliador2['nomeProfessor'] . '</td>
                    </tr>
  
                    <tr>
                    <td class="tg-ddj9">Monografia</td>';
                    if ($obj->monografiaTcc == NULL) {
                        echo '<td class="tg-i81m">Nenhuma monografia enviada.</td></tr>';
                        echo '<tr><td class="tg-ddj9">Nota</td>
                              <td class="tg-i81m">Nenhuma nota enviada.</td>
                            </tr>
   
                            <tr>
                            <td class="tg-ddj9">Comentário</td>
                            <td class="tg-i81m">Nenhum comentário enviado.</td>
                            </tr>';
                    } else {
                        echo '<td class="tg-i81m"><input name="verTcc" type="submit" value="Acessar PDF"></td></tr><tr>';
                        echo '   <tr><td class="tg-ddj9">Nota</td>
                        <td class="tg-i81m">' . $obj->notaTcc . '</td>
                        </tr>
  
                        <tr>
                        <td class="tg-ddj9">Comentário</td>
                        <td class="tg-i81m">' . $obj->comentarioTcc . '</td>
                        </tr>';
                    }


                    echo '</table>';
                    echo '</form>';

                    echo '<br>';
                }
                mysqli_free_result($result);
            }
            ?>
        </div>

    </body>
</html>