<?php
require_once('../seguridad/class_conection.php');


if($_POST['password'] != ""){
	
	$passnew = $_POST['password'];
	$passcon = $_POST['renewpassword'];
	$correo = $_POST['correo'];
	$token = $_POST['token'];
	
	if($passnew == $passcon){
		
		$passHash = password_hash($passnew, PASSWORD_DEFAULT);

		$fecha	= date("Y-m-d H:i:s");

		$consulta1="UPDATE sys_usuario set sys_usuario.sus_password = '$passHash', sys_usuario.sus_fechaUpdate= '$fecha' where sys_usuario.sus_correo='$correo'";
		$consulta2="UPDATE sys_log_pass set sys_log_pass.slp_utilizado = '1' where sys_log_pass.slp_token ='$token'";
		ejecutarQuery($consulta1);
		ejecutarQuery($consulta2);
		
		$validate = 1;

	}else{
		$validate = 3;
	}
		
	
}else{
	
	$validate = 2;
}

$json_obj = array("caso"=> $validate);
echo json_encode($json_obj, JSON_PRETTY_PRINT);



?>