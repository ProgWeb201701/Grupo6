<!DOCTYPE html>
<html>
    <head>
        <?php
        session_start();

        $professorLogin = $_SESSION['professorTabela'];
        $con = mysqli_connect("localhost", "root", "96091262375", "progweb");
        $result = mysqli_query($con, "SELECT * FROM professor WHERE idProfessor = " . $professorLogin['idProfessor']);
        $professorTabela = mysqli_fetch_assoc($result);
        $titulacao = $professorTabela['titulacaoProfessor'];
        $area = $professorTabela['areaInteresseProfessor'];

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

        <title>Professor</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    </head>
    <body>

        <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="../view/home_professor.php">Home</a></li>
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
                echo '<li><a href = "../view/visualizar_tcc.php">Visualizar TCC</a></li>';
                echo '<li><a>' . $professorTabela['nomeProfessor'] . '</a></li>';
                echo '<li><a href="../view/index.php">Sair</a></li>';
                ?>


            </ul>
        </nav>


        <?php
        echo 'cor' . $c;
        echo 'ori' . $o;
        echo 'ava' . $a;
        ?>
        <div id="divEditarPerfil">
            <h3>Edite seu perfil!</h3>
            <form method="post" action="../controller/editarProfessor.php">
                <label>ID:</label><br>
                <input readonly type="text" name="idProfessor" value="<?php echo $professorTabela['idProfessor'] ?>">
                <br><br>

                Nome:<br>
                <input type="text" name="nomeProfessor" value="<?php echo $professorTabela['nomeProfessor'] ?>">
                <br><br>

                Email:<br>
                <input type="text" name="emailProfessor" value="<?php echo $professorTabela['emailProfessor'] ?>">
                <br><br>

                Titulação:<br>
                <select name="titulacaoProfessor">
                    <?php
                    echo '<option value="' . $titulacao . '">' . $titulacao . '</option>';
                    if ($titulacao === 'Mestrado') {
                        echo '<option value="Doutorado">Doutorado</option>';
                    } else {
                        echo '<option value="Mestrado">Mestrado</option>';
                    }
                    ?>
                </select>
                <br>
                <br>

                Área de Interesse:<br>
                <select name="areaProfessor">
                    <?php
                    $areas = array("Teste de Software", "Programacao Web", "Qualidade de Software");
                    $areaslength = count($areas);

                    for ($x = 0; $x < $areaslength; $x++) {
                        echo '<option ';
                        if ($areas[$x] === $area) {
                            echo 'selected';
                        }
                        echo ' value="' . $areas[$x] . '">' . $areas[$x] . '</option>';
                    }
                    ?>
                </select>
                <br><br>

                Senha:<br>
                <input type="password" name="senhaProfessor" value="<?php echo $professorTabela['senhaProfessor'] ?>">
                <br><br>

                <button class="btEditar" name="btEditarProfessor" type="input">Editar</button>
                <button class="btEditar" name="btExcluirProfessor" type="input">Excluir</button>
            </form>
        </div>

    </body>
</html>