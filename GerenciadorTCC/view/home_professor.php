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
        $titulacao = $professorTabela['titulacaoProfessor'];
        $area = $professorTabela['areaInteresseProfessor'];
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
                <li><a href="../view/gerenciar_tcc.php">Gerenciar TCC</a></li>
                <li><a href="../view/visualizar_tcc.php">Visualizar TCC</a></li>
                <li><a href="../view/avaliar_tcc.php">Avaliar TCC</a></li>
                <li><a><?php echo $professorTabela['nomeProfessor'] ?></a></li>
                <li><a href="../view/index.php">Sair<?php session_abort() ?></a></li>
            </ul>
        </nav>



        <div id="divEditarPerfil">
            <h3>Edite seu perfil!</h3>
            <form method="post" action="../controller/editarProfessor.php">
                <label>ID:</label><br>
                <input readonly type="text" name="idProfessor" value="<?php echo $professorTabela['idProfessor'] ?>">
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
                    echo '<option value="' . $area . '">' . $area . '</option>';
                    if ($area === 'Programação Web') {
                        echo '<option value="Teste de Software">Teste de Software</option>';
                        echo '<option value="Qualidade de Software">Qualidade de Software</option>';
                    } else if ($area === 'Teste de Software') {
                        echo '<option value="Programação Web">Programação Web</option>';
                        echo '<option value="Qualidade de Software">Qualidade de Software</option>';
                    } else {
                        echo '<option value="Programação Web">Programação Web</option>';
                        echo '<option value="Teste de Software">Teste de Software</option>';
                    }
                    ?>
                </select>
                <br><br>

                Senha:<br>
                <input type="password" name="senhaProfessor" value="<?php echo $professorTabela['senhaProfessor'] ?>">
                <br><br>

                <button class="btEditar" id="editarNome" type="input">Salvar</button>          
            </form>
        </div>

    </body>
</html>