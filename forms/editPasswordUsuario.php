<?php
require_once('../seguridad/sesion.php');
require_once('../seguridad/data.php');


$id = $_POST['idF'];
$passnew = $_POST['newpassword'];
$passcon = $_POST['renewpassword'];
$passcurrent = $_POST['password'];


$validarPass = autenticarPassword($nocliente);

$nr = mysqli_num_rows($validarPass); 
$registro = mysqli_fetch_assoc($validarPass);




if (($nr == 1) && (password_verify($passcurrent,$registro['password'])) ){
	
	if($passnew == $passcon){
		
		$passHash = password_hash($passnew, PASSWORD_DEFAULT);

		$fecha	= date("Y-m-d H:i:s");

		InsertarPassword($passHash,$nombre,$fecha,$nocliente);

		$validate = 1;
		
		
	}else {

		$validate = 3;
		
	}
}else{
	
	$validate = 2;
}

$json_obj = array("caso"=> $validate);
echo json_encode($json_obj, JSON_PRETTY_PRINT);

$fecha	= date("Y-m-d H:i:s");

$desc = 'El usuario '.$nombre.' modificó la contraseña del no. de cliente: '.$id;
	
	
InsertarHistorialUsuario($desc,$iduser,$fecha);
	

?>