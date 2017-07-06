<?php

session_start();

include '../librerias.php';

$iCliente=new Cliente();
$direccion=$_POST['direccion'];
$direccionMd5= md5($direccion);

if ($iCliente->RegistrarCliente($_POST['rut'], $_POST['nombre'], $_POST['apellido'], $_POST['date'],$direccionMd5, $_POST['tel1'], $_POST['tel2'])) {
    echo 'todo bien';
}else{
    echo 'todo mal';
}