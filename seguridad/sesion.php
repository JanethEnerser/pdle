
<?php
    session_start();
	
	

	if($_SESSION['autenticado'])
	{
	//verificar si el usuario inicio sesion
	require_once('seguridad.php');
		$conSQL = conectarSQL();
		$autenticado=true;
		
		$nombre=($_SESSION['nombre']);
		$nocliente=($_SESSION['nocliente']);
		
		$correo=($_SESSION['correo']);
		$permiso=($_SESSION['permiso']);
		$foto=($_SESSION['foto']);
		$iduser=($_SESSION['iduser']);
		
		
	}
	else
	{
		$autenticado=false;
		header('location:/pdle/login');
	}
	
?>
