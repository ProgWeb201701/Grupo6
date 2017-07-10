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
        $result = mysqli_query($con, "SELECT * FROM aluno WHERE idAluno = "
                . $alunoLogin['idAluno']);
        $alunoTabela = mysqli_fetch_assoc($result);

        if (isset($_GET['erro'])) {
            $Message = "O arquivo não pode ser importado!";
            echo $Message;
        } else if (isset($_GET['sucesso'])) {
            $Message = "O arquivo foi importado com sucesso!";
            echo $Message;
        }
        ?>
        <title>Aluno</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
    <body>

        <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a><?php echo $alunoTabela['nomeAluno'] ?></a></li>
                <li><a href="../controller/loginSair.php">Sair</a></li>
            </ul>

        </nav>


        <div>

            <?php
            include '../controller/lerObjeto.php';
            $ler = new lerObjeto();
            if ($meuTcc = $ler->lerLinha($alunoTabela['idAluno'], 'tcc', 'idOrientando')) {

                echo '<h2>Seu TCC</h2>';
                $orientando = $ler->lerLinha($meuTcc['idOrientando'], 'aluno', 'idAluno');
                $orientador = $ler->lerLinha($meuTcc['idOrientador'], 'professor', 'idProfessor');
                $avaliador1 = $ler->lerLinha($meuTcc['idAvaliadorUm'], 'professor', 'idProfessor');
                $avaliador2 = $ler->lerLinha($meuTcc['idAvaliadorDois'], 'professor', 'idProfessor');


                echo '<form target="_blank" method="post" action="../controller/mostrarMonografia.php">';
                echo '<input name="idTcc" type="hidden" value="' . $meuTcc['idTcc'] . '"><br>';

                echo '
                    <table class="tg">
                    <tr>
                    <th class="tg-ddj9">Título</th>
                    <th class="tg-i81m">' . $meuTcc['tituloTcc'] . '</th>
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
                if ($meuTcc['monografiaTcc'] == NULL) {
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
                        <td class="tg-i81m">' . $meuTcc['notaTcc'] . '</td>
                        </tr>
  
                        <tr>
                        <td class="tg-ddj9">Comentário</td>
                        <td class="tg-i81m">' . $meuTcc['comentarioTcc'] . '</td>
                        </tr>';
                }


                echo '</table>';
                echo '</form>';

                echo '<br>';
                echo '<div id="divSubmeterMonografia">';
                echo '<h2>Submeta o arquivo da monografia!</h2>';

                echo '<form method = "post" enctype = "multipart/form-data" action = "../controller/enviarMonografia.php">';

                echo '<div id="envio">';
                echo '<input value="aaa" name="monografiaTcc" type="file">';
                echo '</div>';

                echo '<input name = "idTcc" type = "hidden" readonly value = "' . $meuTcc['idTcc'] . '">';
                echo '<br>';                
                echo '<input name = "upload" type = "submit" value = "Enviar">';

                echo '</form>';


                echo '</div>';
            } else {
                echo '<h2>Você não tem nenhum TCC cadastrado.';
            }
            ?>



        </div>

        <br>



        <div>



            <div id="divEditarPerfil">
                <h2>Edite seu perfil!</h2>                

                <form method="POST" action="../controller/editarAluno.php">
                    <input type="hidden" name="idAluno" value=
                           "<?php echo $alunoTabela['idAluno'] ?>"><br><br>

                    Nome:<br>
                    <input class="inputIndex" type="text" name="nomeAluno" value="<?php echo $alunoTabela['nomeAluno'] ?>"><br><br>

                    Email:<br>
                    <input class="inputIndex" type="text" name="emailAluno" value=
                           "<?php echo $alunoTabela['emailAluno'] ?>"><br><br>

                    Matricula:<br>
                    <input class="inputIndex" type="text" name="matriculaAluno" value=
                           "<?php echo $alunoTabela['matriculaAluno'] ?>"><br><br>

                    Senha:<br>
                    <input class="inputIndex" type="password" name="senhaAluno" value=
                           <?php echo $senha ?>><br><br>

                    <button style="background-color: green" class="btFormulario" 
                            name="btEditarAluno" type="input">Editar</button>
                    <button style="background-color: red" class="btFormulario" 
                            name="btExcluirAluno" type="input">Excluir</button>
                </form>
            </div>


        </div>
    </body>
</html>