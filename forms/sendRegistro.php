<?php

require_once('../seguridad/class_conection.php');
require('../assets/PHPMailer/src/Exception.php');
require('../assets/PHPMailer/src/PHPMailer.php');
require('../assets/PHPMailer/src/SMTP.php');


$nombre = $_POST['name'];
$apellido = $_POST['lastname'];
$nocliente = $_POST['nocliente'];
$tel = $_POST['phonenumber'];
$email = $_POST['email'];
$pass = $_POST['password'];



	$verificar="SELECT count(sus_correo) as validar from sys_usuario WHERE sys_usuario.sus_correo= '$email' LIMIT 1;";	
	$var = DataRow($verificar);

	if($var['validar']==0){
		
		$mail = new PHPMailer\PHPMailer\PHPMailer();

		//Server settings
		$mail->SMTPDebug = 0;                     
		$mail->isSMTP();                                            
		$mail->Host       = 'smtp.gmail.com';                     
		$mail->SMTPAuth   = true;                                  
		$mail->Username   = 'web@enerser.digital';                     
		$mail->Password   = 'Enerser123#';                              
		$mail->SMTPSecure =  PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;        
		$mail->Port       = 587;                                 

		//Recipients
		$mail->setFrom('web@enerser.digital', 'PDLE Sistema Web');


		$mail->Subject = "Confirmación de registro";
		$mail->IsHTML(true); 
		$mail->CharSet="utf-8";



		$mail->addAddress($email, $nombre.' '.$apellido);

		// Creamos en una variable el cuerpo, contenido HMTL, del correo


		$body  = "!Gracias por unirte a nuestra comunidad! Ya puedes acceder al portal Plan De Lealtad Enerser con los siguientes datos:  <br>";
		$body .= "<br>Correo: ".$email;
		$body .= "<br>Contraseña: ".$pass;
		$body .= '<br><a class ="buttton" type="button" href="http://localhost/pdle/login" style ="border-radius: 5px; color: white;padding: 16px 32px; text-align: center;text-decoration: none; display: inline-block;font-size: 16px;margin: 4px 2px;transition-duration: 0.4s;cursor: pointer; background-color: #2a7de1; color: white;border: 2px solid #1f5eab;">Iniciar sesión</a>';




		$mail->Body = $body;
		$mail->send();
		
		$fecha	= date("Y-m-d H:i:s");
		$passHash = password_hash($pass, PASSWORD_DEFAULT);
		$consulta ="INSERT INTO sys_usuario (sus_nombre, sus_apellido, sus_correo, sus_estatus, sus_keyPermiso, sus_foto, sus_enviocorreo, sus_keyCliente, sus_fechaSistema, sus_password) VALUES('$nombre', '$apellido', '$email', '1','2','male.png','2','$nocliente','$fecha','$passHash');";
		ejecutarQuery($consulta);
		
		$caso = 1;
		
	}else{
		
		$caso = 2;
	}


	

$json_obj = array("caso"=> $caso,"nombre" => $nombre);
echo json_encode($json_obj, JSON_PRETTY_PRINT);


?>