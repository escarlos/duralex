<?php
$oUsu=$_SESSION["USR"];

if ($oUsu->profileId=='1'){ ?>
<li><a href="cliente.php">Clientes</a></li>
<li><a href="abogado.php">Abogados</a></li>
<li><a href="usuario.php">Usuarios</a></li>
<?php 
}if  ($oUsu->profileId=='2'){?>
     <li><a href="#">Clientes</a></li>
     <li><a href="#">Abogados</a></li>
     <li><a href="">Atenciones</a></li>
     <li><a href="">Estadistica</a></li>
 <?php }?>
<?php if  ($oUsu->profileId=='3'){?>
     <li><a href="#">Clientes</a></li>
     <li><a href="#">Abogados</a></li>
     <li><a href="">Atenciones</a></li>
<?php } ?>
<?php if  ($oUsu->profileId=='4'){?>     
     <li><a href="">Atenciones</a></li>
<?php } ?>
