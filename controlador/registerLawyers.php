<?php

session_start();

include '../librerias.php';

$iAbogado=new Abogado();

if ($iAbogado->RegistrarAbogado($_POST['rut'], $_POST['nombre'], $_POST['apellido'], $_POST['contrato'], $_POST['especialidad'], $_POST['valorHora'])) {
    echo 'todo bien';
}else
    echo 'todo mal';