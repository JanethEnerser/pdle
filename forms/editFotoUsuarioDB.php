<?php
require_once('../seguridad/sesion.php');
require_once('../seguridad/data.php');


$id = $_GET['idF'];
$name = $_GET['file'];



$fecha	= date("Y-m-d H:i:s");

InsertarFotoUsuario($name,$nombre,$fecha,$id);


$desc = 'El usuario '.$nombre.' modificó / adjuntó una fotografía en el no. de cliente: '.$id;
	
	
InsertarHistorialUsuario($desc,$iduser,$fecha);



?>