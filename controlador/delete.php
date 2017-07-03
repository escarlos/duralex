<?php
session_start();

include '../librerias.php';

$id=$_REQUEST['id'];

$dUser=new User();

if($dUser->DeleleUser($id)){
    echo 'todo bien';
}else{
    echo 'todo mal';
}



