<?php
include_once '../seguridad/data.php';
require('../assets/PHPMailer/src/Exception.php');
require('../assets/PHPMailer/src/PHPMailer.php');
require('../assets/PHPMailer/src/SMTP.php');

$fullname = $_POST['fullname'];
$state = $_POST['state'];
$city = $_POST['city'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];



    
    
	
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
				    
   
	$mail->Subject = "Solicitud de cambios de información";
    $mail->IsHTML(true); 
    $mail->CharSet="utf-8";
	
    $mail->addAddress($correo, $nombre);
	
	
	$datarow = Lista_usuarios(3,'');
		  if($datarow == NULL){$datarow = 0;}
				if(mysqli_num_rows($datarow)>0)
				{
					while($regData=mysqli_fetch_assoc($datarow))
					{
						
						
							$mail->AddAddress($regData['sus_correo'],$regData['nombre']);
							
							
					}
						
				
				
				}else{
					$var_validate = 2;
				}

	// Creamos en una variable el cuerpo, contenido HMTL, del correo
	
	
	$body  = "El usuario:".$nombre." con número de cliente:".$nocliente." ha solicitado cambios de información en su perfil: <br>";
	$body .= "Nombre: ".$fullname;
	$body .= "<br>Estado: ".$state;
	$body .= "<br>Ciudad: ".$city;
	$body .= "<br>Dirección: ".$address;
	$body .= "<br>Correo: ".$email;
	$body .= "<br>Favor de enviarle un correo al cliente cuando los cambios hayan sido realizados <br> Saludos.";
	
	


	$mail->Body = $body;
    $mail->send();
            
  
    
    
    



 
    
   





?>