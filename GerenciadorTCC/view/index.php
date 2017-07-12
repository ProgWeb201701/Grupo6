<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <script type="text/javascript" src="js/jquery.js"></script>

        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.validate.js" language="JavaScript"></script>

        <script>
            
            $(document).ready(function () {
                $("#form-trabalhos").validate({
                    // Define as regras
                    rules: {
                        nomeProfessor: {
                            required: true
                        },
                        emailProfessor: {
                            required: true
                        },
                        senhaProfessor: {
                            required: true
                        }
                    },
                    // Define as mensagens de erro para cada regra
                    messages: {
                        nomeProfessor: {
                            required: "Digite o nome!"
                        },
                        senhaProfessor: {
                            required: "Digite a senha!"
                        },
                        emailProfessor: {
                            required: "Digite o email!"
                        }
                    }
                });
            });
            
            $(document).ready(function () {
                $("#form-inscricoes").validate({
                    // Define as regras
                    rules: {
                        nomeAluno: {
                            required: true
                        },
                        senhaAluno: {
                            required: true
                        },
                        matriculaAluno: {
                            required: true,
                            min:5
                        },
                        emailAluno: {
                            required: true,
                            email: true
                        }
                    },
                    // Define as mensagens de erro para cada regra
                    messages: {
                        nomeAluno: {
                            required: "Digite o nome!"
                        },
                        senhaAluno: {
                            required: "Digite a senha!"
                        },
                        matriculaAluno: {
                            required: "Digite a matrícula!",
                            min: "A matrícula tem, no minimo, 5 digitos!"
                        },
                        emailAluno: {
                            required: "Digite o email!",
                            email: "Digite um email válido!"
                        }
                    }
                });
            });
        </script>

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
                <form id="form-inscricoes" method="post" action="../controller/cadastrarAluno.php">
                    <input class="inputIndex" type="text" placeholder="Nome" name="nomeAluno"><br>
                        
                         <input class="inputIndex" type="email" placeholder="Email" name="emailAluno"><br>
                        
                        <input class="inputIndex" type="number" placeholder="Matrícula" name="matriculaAluno"><br>

                        <input class="inputIndex" type="password" placeholder="Senha" name="senhaAluno"><br>

                        <input class="inputIndex" type="submit" value="Cadastrar"/>
                        <br><br>
                    
                </form>

            </div>



            <div id="divCadastrarB">
                <h4>Professor</h4>
                
                <form id="form-trabalhos" method="POST" action="../controller/cadastrarProfessor.php" >
                    
                        
                        <input class="inputIndex" type="text" placeholder="Nome" name="nomeProfessor"><br>
                        <input class="inputIndex" type="text" placeholder="Email" name="emailProfessor"><br>
                        
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

                        <input class="inputIndex" type="password" placeholder="Senha" name="senhaProfessor"><br>

                        <input class="inputIndex" type="submit" value="Cadastrar"/>
                    
                </form>

            </div>

        </div>
    </body>
</html>