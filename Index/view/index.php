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
    </head>
    <body>

        <div id="divApresentacao">
            <h1>Mensagem aleatória</h1>
            <p>Lorem ipsum</p>

        </div>


        <div id="divLogar">
            <h2>Você já está cadastrado? Faça o login!</h2>

            <input class="inputLogin" type="text" placeholder="Usuario"><br>
            <input class="inputLogin" type="password" placeholder="Senha"><br>
            <form action="home_professor.html">
                <input class="btCadastro" id="btCadastrarAluno" type="submit" value="Entrar" />
            </form>

        </div>

        <div id="divCadastrar">

            <h2>Novo no site? Cadastre-se!</h2>

            <div id="divLogin">
                <h4>Aluno</h4>
                <form method="POST" action="../controller/cadastrarAluno.php">
                    <fieldset> 
                        <input class="inputLogin" type="text" name="nomeAluno" placeholder="Nome"><br>
                        <input class="inputLogin" type="text" name="emailAluno" placeholder="Email"><br>
                        <input class="inputLogin" type="text" name="matriculaAluno" placeholder="Matrícula"><br>
                        <input class="inputLogin" type="password" name="senhaAluno" placeholder="Senha"><br>

                        <input type="submit" class="btCadastro" id="btCadastrarAluno" value="Cadastrar">     
                    </fieldset>
                </form>

            </div>



            <div id="divLogin">
                <h4>Professor</h4>
                <form method="POST" action="../controller/cadastrarAluno.php"
                      <fieldset> 
                        <input class="inputLogin" name="nomeProfessor" type="text" placeholder="Nome"><br>
                        <input class="inputLogin" name="emailProfessor" type="text" placeholder="Email"><br>
                        <select class="inputLoginSelect" name="titulacaoProfessor">
                            <option value="Mestrado">Mestrado</option>
                            <option value="Doutorado">Doutorado</option>
                        </select><br>
                        <input class="inputLogin" name="senhaProfessor" type="password" placeholder="Senha"><br>
                        <button class="btCadastro" id="btCadastrarProfessor" type="button">Cadastrar</button>     
                    </fieldset>
                </form>
            </div>

        </div>
    </body>
</html>