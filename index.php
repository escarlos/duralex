<?php 
    include 'librerias.php';
    session_start(); 
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
        <link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
         <link href="https://getbootstrap.com/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
          <link href="https://getbootstrap.com/examples/signin/signin.css" rel="stylesheet">
    </head>
    <body>
        <?php
            if(!isset($_SESSION["USR"])){
        ?>       
       <div class="container">

           <form class="form-signin" method="post" action="<?=URL?>controlador/validarUsuario.php">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Nombre de usuario</label>
        <input type="text" id="user" name="user" class="form-control" placeholder="nombre de usuario" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->

        <?php 
            }else{
                header('location:'.URL.'home.php');
            }
           ?>
    </body>
</html>
