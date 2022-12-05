<?php
include_once '../seguridad/class_conection.php';


require('../assets/PHPMailer/src/Exception.php');
require('../assets/PHPMailer/src/PHPMailer.php');
require('../assets/PHPMailer/src/SMTP.php');


$correo = $_POST['email'];



	if($correo!="")
	{
	  
		$consulta = "SELECT CONCAT(IF(sus_nombre is null,'',sus_nombre),' ',IF(sus_apellido is null,'',sus_apellido)) as nombre, sys_usuario.sus_correo as correo from sys_usuario WHERE sys_usuario.sus_correo= '$correo' AND sys_usuario.sus_estatus = 1;";	
		$Data = DataRow($consulta);
		
		
		if($Data != NULL){
			$dcorreo = $Data['correo'];
			$dnombre = $Data['nombre'];
			$token = generar_token_seguro(50);
			$fecha	= date("Y-m-d H:i:s");
			$fechaVencimiento = date('Y-m-d H:i:s', strtotime("+1 day", strtotime($fecha)));

			$insert_historial = "INSERT INTO sys_log_pass (slp_fechaSistema,slp_correo,slp_token,slp_fechaVencimiento) VALUES('$fecha','$correo','$token','$fechaVencimiento');";
			ejecutarQuery($insert_historial);


			$mail = new PHPMailer\PHPMailer\PHPMailer();


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


			$mail->Subject = "Recuperar contraseña | PDLE";
			$mail->IsHTML(true); 
			$mail->CharSet="utf-8";

			$mail->addAddress($dcorreo, $dnombre);


			// Creamos en una variable el cuerpo, contenido HMTL, del correo


			$body  = 'Hemos recibido tu solicitud de cambio de contraseña, da click en el siguiente botón para continuar <hr> <a class ="buttton" type="button" href="http://localhost/pdle/restablecer?rc_t='.$token.'" style ="border-radius: 5px; color: white;padding: 16px 32px; text-align: center;text-decoration: none; display: inline-block;font-size: 16px;margin: 4px 2px;transition-duration: 0.4s;cursor: pointer; background-color: #2a7de1; color: white;border: 2px solid #1f5eab;">Da click aquí </a>';



			$mail->Body = $body;
			$mail->send();

			$var_validate = 1;	
			
		}else {
				
				$var_validate = 2;
			}
		
		
		


		
						
	}else {
		
		$var_validate = 3;
		
	}
$json_obj = array("caso"=> $var_validate);
echo json_encode($json_obj, JSON_PRETTY_PRINT);    

function generar_token_seguro($longitud)
{
    return bin2hex(random_bytes(($longitud - ($longitud % 2)) / 2));
}



?>