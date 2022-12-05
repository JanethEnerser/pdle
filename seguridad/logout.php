<?php
//verificar si el usuario inicio sesion
require_once('sesion.php');
//destruir session
$_SESSION=array();
session_destroy();
header('Location:../login');
?>
