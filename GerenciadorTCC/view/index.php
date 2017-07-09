<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Inicio</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    </head>
    <body>
        <div id="divLogin">
            <div id="divLoginA">
                <h1>Bem-vindo ao Gerenciador de TCC</h1>

            </div>


            <div id="divLoginB">
                <h2>Você já está cadastrado? Faça o login!</h2>

                <form method="POST" action="../controller/controllerLogin.php" >                
                    <input class="inputLogin" name="usuarioLogin" type="text" placeholder="Email">
                    <input class="inputLogin" name="senhaLogin" type="password" placeholder="Senha">
                    <input style="color:black;" type="submit" value="Entrar" />
                </form>

            </div>

        </div>


        <div id="divCadastrar">

            <h2>Novo no site? Cadastre-se!</h2>
            <br>

            <div id="divCadastrarA">
                <h4>Aluno</h4>
                <form method="POST" action="../controller/cadastrarAluno.php">
                    <fieldset> 
                        <input class="inputIndex" type="text" name="nomeAluno" placeholder="Nome"><br>
                        <input class="inputIndex" type="email" name="emailAluno" placeholder="Email"><br>
                        <input class="inputIndex" type="number" name="matriculaAluno" placeholder="Matrícula"><br>
                        <input class="inputIndex" type="password" name="senhaAluno" placeholder="Senha"><br>

                        <input class="inputIndex" type="submit" value="Cadastrar">     
                    </fieldset>
                </form>
                
            </div>



            <div id="divCadastrarB">
                <h4>Professor</h4>
                <form method="POST" action="../controller/cadastrarProfessor.php">
                    <fieldset>
                        <input class="inputIndex" name="nomeProfessor" type="text" placeholder="Nome"><br>
                        <input class="inputIndex" name="emailProfessor" type="email" placeholder="Email"><br>
                        <select class="inputIndex" name="titulacaoProfessor">
                            <option value="Mestrado">Mestrado</option>
                            <option value="Doutorado">Doutorado</option>
                        </select><br>
                        <select class="inputIndex" name="areaProfessor">
                            <?php
                            $areas = array("Teste de Software", "Programacao Web", "Qualidade de Software");
                            $areaslength = count($areas);

                            for ($x = 0; $x < $areaslength; $x++) {
                                echo '<option value="' . $areas[$x] . '">' . $areas[$x] . '</option>';
                            }
                            ?>
                        </select><br>
                        <input class="inputIndex" name="senhaProfessor" type="password" placeholder="Senha"><br>
                        <input class="inputIndex" type="submit" value="Cadastrar">    
                    </fieldset>
                </form>
                
            </div>

        </div>
    </body>
</html>