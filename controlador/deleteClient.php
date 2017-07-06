<?php
session_start();

include '../librerias.php';

$rut=$_REQUEST['rut'];
$dClient=new Cliente();
if($dClient->DeleleCliente($rut));