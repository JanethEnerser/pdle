<?php
require_once('class_conection.php');
	
	function autenticar($usuario)
	{
	  
		$consulta="SELECT
					CONCAT(IF(sus_nombre is null,'',sus_nombre),' ',IF(sus_apellido is null,'',sus_apellido)) as nombre, 
					sys_usuario.sus_correo as correo, 
					sys_usuario.sus_password as password, 
					sys_usuario.sus_keyCliente as NoCliente,
					sys_usuario.sus_foto as foto,
					sys_usuario.sus_keyPermiso as permiso,
					sys_usuario.sus_idreg as iduser
					
					
					
					from sys_usuario
			
					
					WHERE
						sys_usuario.sus_correo= '$usuario'
					AND sys_usuario.sus_estatus = 1
					LIMIT 1;";	
		
	
			
			return DataRows($consulta);
		
			
		
		
		
	}
	
	
?>

