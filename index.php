<?php 
    include 'librerias.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <form action="<?=URL?>controlador/validarUsuario.php" method="post">
            <div><label>Nombre</label><input id="user" type="text" name="user"></div>
            <div><label>Password</label><input id="pass" type="password" name="pass"></div>
            <input id="button" type="submit" value="Entrar">
            <div id="msjweb"></div>
        </form>
    </body>
</html>
