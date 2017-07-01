<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <title>Professor</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>

    <nav class="navbar navbar-inverse">
      <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="GerenciarTCC.html">Gerenciar TCC</a></li>
          <li><a href="../view/index.php">Sair<?php session_abort() ?></a></li>
      </ul>
  
</nav>


<div id="divLogar">
    <h2>Você já está cadastrado? Faça o login!</h2>

    <input class="inputLogin" type="text" placeholder="Usuario"><br>
    <input class="inputLogin" type="password" placeholder="Senha"><br>
    <button class="btCadastro" id="btCadastrarAluno" type="button">Logar</button>  

</div>

<div id="divCadastrar">

    <h2>Edite seu perfil!</h2>

    <div id="divLogin">
        <h4>Professor</h4>             
        <input class="inputLogin" type="text" placeholder="Nome">
        <button class="btEditar" id="editarNome" type="button">Editar</button>
        <button class="btEditar" id="editarNome" type="button">Salvar</button><br>

        <input class="inputLogin" type="text" placeholder="Email">
        <button class="btEditar" id="editarNome" type="button">Editar</button>
        <button class="btEditar" id="editarNome" type="button">Salvar</button><br>

        <select class="inputLoginSelect" name="titulacao">
            <option value="mestrado">Mestrado</option>
            <option value="Doutorado">Doutorado</option>
        </select>
        <button class="btEditar" id="editarNome" type="button">Editar</button>
        <button class="btEditar" id="editarNome" type="button">Salvar</button><br>

        <select class="inputLoginSelect" name="area de interesse">
            <option value="null">Áreas de Atuação</option>
            <option value="prog-web">Programação Web</option>
            <option value="poo">Programação Orientada a Objetos</option>
        </select>
        <button class="btEditar" id="editarNome" type="button">Editar</button>
        <button class="btEditar" id="editarNome" type="button">Salvar</button><br>

        <input class="inputLogin" type="password" placeholder="Senha">
        <button class="btEditar" id="editarNome" type="button">Editar</button>
        <button class="btEditar" id="editarNome" type="button">Salvar</button><br>          
    </div>


</div>
</body>
</html>