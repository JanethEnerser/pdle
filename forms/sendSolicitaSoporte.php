<?php
include_once '../seguridad/sesion.php';
include_once '../seguridad/data.php';


require('../assets/PHPMailer/src/Exception.php');
require('../assets/PHPMailer/src/PHPMailer.php');
require('../assets/PHPMailer/src/SMTP.php');
$f1 = "";
$f2 = "";
$f3 = "";

$file_1 = $_GET['f1'];
$file_2 = $_GET['f2'];
$file_3 = $_GET['f3'];



$asunto = $_GET['form_sub'];
$mensaje = $_GET['form_msg'];
$nocli_soporte = $_GET['form_nocli'];
$nouser_soporte = $_GET['form_nouser'];

$fecha	= date("Y-m-d H:i:s");
$folio = strtotime($fecha);

InsertarHistorialSoporte($folio,$asunto,$mensaje,$nocli_soporte,$nouser_soporte,$fecha,$file_1, $file_2, $file_3, '1');


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


$mail->Subject = "Solicitud de soporte | Folio: ".$folio;
$mail->IsHTML(true); 
$mail->CharSet="utf-8";

//$mail->addAddress($correo, $nombre);


$datarow = Lista_usuarios(3,'');
	  if($datarow == NULL){$datarow = 0;}
			if(mysqli_num_rows($datarow)>0)
			{
				while($regData=mysqli_fetch_assoc($datarow))
				{


						$mail->AddAddress($regData['sus_correo'],$regData['nombre']);


				}



			}else{

			}

// Creamos en una variable el cuerpo, contenido HTML, del correo


$body  = "Usuario: ".$nombre;
$body .= "<br>Número de cliente: ".$nocli_soporte;
$body .= "<br>Correo: ".$correo;
$body .= "<br>Asunto: ".$asunto;
$body .= "<br>Mensaje: ".$mensaje;




$mail->Body = $body;
$mail->send();

?>