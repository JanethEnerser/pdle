<?php
require_once('seguridad.php');

$usuario=$_POST['email'];
$password= $_POST['password'];

//autenticar
	session_start();
	if($usuario!="" && $password!="")
	{
		
		
		$objusuario	= autenticar($usuario); 
		$nr 		= mysqli_num_rows($objusuario); 
		$registro = mysqli_fetch_assoc($objusuario);
		if (($nr == 1) && (password_verify($password,$registro['password'])) ){
			//consultamos los datos del usuario
			
			
			$_SESSION['nombre']=$registro['nombre'];
			$_SESSION['nocliente']=$registro['NoCliente'];
			$_SESSION['permiso']=$registro['permiso'];
		
			$_SESSION['correo']=$registro['correo'];
			$_SESSION['foto']=$registro['foto'];
			$_SESSION['iduser']=$registro['iduser'];
		
			$_SESSION['autenticado']=true;
			
			//echo "<script type='text/javascript'> document.location = '../home'; </script>";
			//header('Location:../home');
			
			
			
			if($registro['permiso'] == 1){
				
				$validate = 3;
				$mensaje = '';
			}else{
				
				$validate = 1;
				$mensaje = '';
				
			}
			
		        
		}
		else
		{
			//echo "<script type='text/javascript'> document.location = '../login'; </script>";
			//header('Location:../'.$pagina);
			$mensaje = '<div class="alert alert-danger alert-dismissible" role="alert"><strong>Error!</strong> Usuario o contraseña incorrectos.</div> ';
			$validate = 2;
		}
	}
	else
	{
			$mensaje = '<div class="alert alert-warning alert-dismissible" role="alert"><strong>Error!</strong> Por favor ingresa un usuario y contraseña.</div> ';
			
			$validate = 2;
	}

$json_obj = array("caso"=> $validate,"mensaje" => $mensaje);
echo json_encode($json_obj, JSON_PRETTY_PRINT);
?>