<?php
session_start();

include '../librerias.php';


$rut=$_REQUEST['rut'];
$dLaw=new Abogado();
if($dLaw->DeleleAbogado($rut));



