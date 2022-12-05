<?php
include_once '../seguridad/sesion.php';
include_once '../seguridad/data.php';


require('../assets/PHPMailer/src/Exception.php');
require('../assets/PHPMailer/src/PHPMailer.php');
require('../assets/PHPMailer/src/SMTP.php');



$asunto = $_GET['sub'];
$mensaje = $_GET['msg'];
$nocli_soporte = $_GET['nocli'];
$nouser_soporte = $_GET['nouser'];

$fecha	= date("Y-m-d H:i:s");
$folio = strtotime($fecha);




//InsertarHistorialSoporte($folio,$asunto,$mensaje,$nocli_soporte,$nouser_soporte,$fecha,$file_1, $file_2, $file_3, $fecha );


$consulta="INSERT INTO soporte_historial(
	
			soh_folio, 
			soh_asunto, 
			soh_mensaje,
			soh_keyCliente,
			soh_keyUsuario,
			soh_fechaSistema,
			soh_file_1,
			soh_file_2,
			soh_file_3
			
			
	)
	VALUES('$folio','$asunto','$mensaje','$nocli_soporte','$nouser_soporte','$fecha','$f1', '$f2', '$f3');";

echo $consulta;

/**

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


$mail->Subject = "Soporte no.";
$mail->IsHTML(true); 
$mail->CharSet="utf-8";

$mail->addAddress($correo, $nombre);



// Creamos en una variable el cuerpo, contenido HTML, del correo


$body  = "El usuario: ".$nombre." ha solicitado soporte a través de la plataforma para el número de empleado:  ".$nocli." .<br> ";
$body .= "Nombre: ".$fullname;
$body .= "<br>Estado: ".$state;
$body .= "<br>Ciudad: ".$city;
$body .= "<br>Calle: ".$calle;
$body .= "<br>Colonia: ".$colonia;
$body .= "<br>CP: ".$cp;
$body .= "<br>Correo: ".$email;
$body .= "<br>Favor de enviarle un correo al cliente cuando los cambios hayan sido realizados <br> Saludos.";



$mail->Body = $body;
$mail->send();
            
$var_validate = 1;
$fecha	= date("Y-m-d H:i:s");
$desc = 'El usuario '.$nombre.' solicitó cambios en la información del no. de cliente: '.$nocli;
	
**/


?>