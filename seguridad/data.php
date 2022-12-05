<?php

function infocliente($valor, $valor1){
	
	$consulta = "CALL getInfoCliente('$valor','$valor1'); ";
	
	return DataRow($consulta);
	
	
}


function infoUsuario($valor, $valor1){
	
	$consulta = "CALL getInfoUsuario('$valor','$valor1'); ";
	
	return DataRow($consulta);
	
	
}

function TotalUsuarios($valor){
	
	$consulta = "CALL getUsuarios('$valor'); ";
	
	return DataRow($consulta);
	
	
}
function TotalSoporte($valor){
	
	$consulta = "CALL getSoportes('$valor'); ";
	
	return DataRow($consulta);
	
	
}

function infoSoporte($valor, $valor1){
	
	$consulta = "CALL getInfoSoporte('$valor','$valor1'); ";
	
	return DataRow($consulta);
	
	
}

function Lista_usuarios($valor, $valor1){
	
	$consulta = "CALL getInfoUsuario('$valor','$valor1'); ";
	
	return DataRows($consulta);
	
	
}

function InsertarHistorialUsuario($desc,$idusuario,$fecha){
	
	$consulta="INSERT INTO sys_usuario_historial (
	
			suh_descripcion,
			suh_keyUser,
			suh_fechaSistema
			
	)
	VALUES('$desc','$idusuario','$fecha');";

	return ejecutarQuery($consulta);
	
}
function InsertarHistorialSoporte($folio,$asunto,$mensaje,$nocli_soporte,$nouser_soporte,$fecha,$file_1, $file_2, $file_3, $est){
	
	$consulta="INSERT INTO soporte_historial(
	
			soh_folio, 
			soh_asunto, 
			soh_mensaje,
			soh_keyCliente,
			soh_keyUsuario,
			soh_fechaSistema,
			soh_file_1,
			soh_file_2,
			soh_file_3,
			soh_keyEstatusSoporte
			
			
	)
	VALUES('$folio','$asunto','$mensaje','$nocli_soporte','$nouser_soporte','$fecha','$file_1', '$file_2', '$file_3', '$est');";

	return ejecutarQuery($consulta);
	
}
function InsertarFotoUsuario($name,$usuario,$fecha,$iduser){
	
	$consulta="UPDATE sys_usuario set sys_usuario.sus_foto = '$name', sys_usuario.sus_userUpdate= '$usuario', sys_usuario.sus_fechaUpdate= '$fecha' where sys_usuario.sus_keyCliente='$iduser'";

	return ejecutarQuery($consulta);
	
}
function InsertarPassword($pass,$usuario,$fecha,$iduser){
	
	$consulta="UPDATE sys_usuario set sys_usuario.sus_password = '$pass', sys_usuario.sus_userUpdate= '$usuario', sys_usuario.sus_fechaUpdate= '$fecha' where sys_usuario.sus_keyCliente='$iduser'";

	return ejecutarQuery($consulta);
	
}


function SQL_InfoCliente($var){
	
	$consulta="SELECT 
				Id_cliente,
				NumeroCliente,
				NombreCliente,
				FechaUltimoConsumo,
				
				convert(varchar,DATEADD(year, 1, FechaUltimoConsumo), 106) as FechaVencimientoPuntos,
				CalleCliente,
				Vehiculo,
				ColoniaCliente,
				CP_Cliente,
				CiudadCliente,
				EstadoCliente,
				EstatusCliente,
				TelefonoCliente,
				CorreoElectronico,
				FechaUltimaCarga,
				PuntosAcumulados,
				PuntosCanjeados,
				PuntosDisponibles,
				ROUND(PuntosDisponibles, 0) AS puntosredondeados


				FROM vwLealtad

				WHERE dbo.vwLealtad.NumeroCliente= '$var' AND Fecha BETWEEN DATEADD(MM, -12, Fecha) AND GETDATE()

				GROUP BY Id_cliente, NumeroCliente, NombreCliente, FechaUltimoConsumo, CalleCliente, ColoniaCliente, CP_Cliente, CiudadCliente, EstadoCliente, EstatusCliente, TelefonoCliente, CorreoElectronico, FechaUltimaCarga, PuntosAcumulados, PuntosCanjeados, PuntosDisponibles,Vehiculo;";
	
	return $consulta;
}
function SQL_Clientes(){
	
	$consulta="SELECT 
				Id_cliente,
				NumeroCliente,
				NombreCliente,
				convert(varchar,FechaUltimoConsumo, 23) as FechaUltimoConsumo,
				
				convert(varchar,DATEADD(year, 1, FechaUltimoConsumo), 106) as FechaVencimientoPuntos,
				CalleCliente,
				Vehiculo,
				ColoniaCliente,
				CP_Cliente,
				CiudadCliente,
				EstadoCliente,
				EstatusCliente,
				TelefonoCliente,
				CorreoElectronico,
				FechaUltimaCarga,
				PuntosAcumulados,
				PuntosCanjeados,
				PuntosDisponibles,
				ROUND(PuntosDisponibles, 0) AS puntosredondeados


				FROM vwLealtad

				

				GROUP BY Id_cliente, NumeroCliente, NombreCliente, FechaUltimoConsumo, CalleCliente, ColoniaCliente, CP_Cliente, CiudadCliente, EstadoCliente, EstatusCliente, TelefonoCliente, CorreoElectronico, FechaUltimaCarga, PuntosAcumulados, PuntosCanjeados, PuntosDisponibles,Vehiculo
				ORDER BY NumeroCliente DESC;";
	
	return $consulta;
}


function SQL_TotalClientesActivos(){
	
	$consulta="SELECT COUNT(a.clientes) as clientes_activos FROM (SELECT COUNT(dbo.vwLealtad.NumeroCliente) AS clientes FROM dbo.vwLealtad WHERE dbo.vwLealtad.EstatusCliente = 'Activo' GROUP BY dbo.vwLealtad.NumeroCliente) a;";
	
	return $consulta;
}

function SQL_TotalClientesInactivos(){
	
	$consulta="SELECT COUNT(a.clientes) as clientes_inactivos FROM (SELECT COUNT(dbo.vwLealtad.NumeroCliente) AS clientes FROM dbo.vwLealtad WHERE dbo.vwLealtad.EstatusCliente = 'Inactivo' GROUP BY dbo.vwLealtad.NumeroCliente) a;";
	
	return $consulta;
}


function SQL_DetalleMensual($var,$var2,$var3){
	
	$consulta="SELECT 
				NombreComercial,
				[Año] as regyear,
				Mes,
				DescripcionProducto,
				PuntosObtenidos
			
				FROM vwLealtad

				WHERE dbo.vwLealtad.NumeroCliente= '$var' AND dbo.vwLealtad.Mes= '$var2' AND dbo.vwLealtad.[Año]= '$var3'";
	
	return $consulta;
}

function SQL_GraficaMensual($var){
	
	$consulta="SELECT 
				Mes,
				CONCAT((SELECT
						 case when Mes = 1
							then 'Enero' 
							WHEN Mes = 2
							then 'Febrero'
							WHEN Mes = 3
							then 'Marzo'
							WHEN Mes = 4
							then 'Abril'
							WHEN Mes = 5
							then 'Mayo'
							WHEN Mes = 6
							then 'Junio'
							WHEN Mes = 7
							then 'Julio'
							WHEN Mes = 8
							then 'Agosto'
							WHEN Mes = 9
							then 'Septiembre'	
							WHEN Mes = 10
							then 'Octubre'	
							WHEN Mes = 11
							then 'Noviembre'	
							WHEN Mes = 12
							then 'Diciembre'	
							
							
							ELSE '' 
							
							end 
					
					), ' ',[Año]) as NombreMes,
				SUM(PuntosObtenidos) AS TotalMesPuntos
			

				FROM vwLealtad

				WHERE dbo.vwLealtad.NumeroCliente= '$var' AND Fecha BETWEEN DATEADD(MM, -12, GETDATE()) AND GETDATE()  
				GROUP BY mes, [Año] ";
	
	return $consulta;
}

function SQL_AñosDisponibles($var){
	
	$consulta="SELECT 
				[Año] as yeardisp
				
				FROM 	vwLealtad

				WHERE dbo.vwLealtad.NumeroCliente= '$var' AND Fecha BETWEEN DATEADD(MM, -12, GETDATE()) AND GETDATE()
				
				GROUP BY [Año];";
	
	return $consulta;
}

function SQL_MesesDisponibles($var){
	
	$consulta="SELECT 
				Mes,
				(SELECT
						 case when Mes = 1
							then 'Enero' 
							WHEN Mes = 2
							then 'Febrero'
							WHEN Mes = 3
							then 'Marzo'
							WHEN Mes = 4
							then 'Abril'
							WHEN Mes = 5
							then 'Mayo'
							WHEN Mes = 6
							then 'Junio'
							WHEN Mes = 7
							then 'Julio'
							WHEN Mes = 8
							then 'Agosto'
							WHEN Mes = 9
							then 'Septiembre'	
							WHEN Mes = 10
							then 'Octubre'	
							WHEN Mes = 11
							then 'Noviembre'	
							WHEN Mes = 12
							then 'Diciembre'	
							
							
							ELSE '' 
							
							end 
					
					) as NombreMes
				
				FROM 	vwLealtad

				WHERE dbo.vwLealtad.NumeroCliente= '$var' AND Fecha BETWEEN DATEADD(MM, -12, GETDATE()) AND GETDATE()
				
				GROUP BY Mes;";
	
	return $consulta;
}
function Select($nombre,$tabla,$campoValor,$campoDespliegue,$valor,$tabindex,$caption,$evento,$valorEvento,$conSQL)
{
  
     echo '<select class="form-control select2 " name="'.$nombre.'" id="'.$nombre.'"  style="width:100%" tabindex="'.$tabindex.'"'.' '.$evento.$valorEvento.'>';
	 
	 echo  '<option value="" selected="" disabled="">'.$caption.'</option>';
	 echo  '<optgroup label="">';
	$datarow = sqlsrv_query($conSQL,$tabla);
           
				while($registro=sqlsrv_fetch_array($datarow))
				{
				if($registro[$campoValor]==$valor)
				    echo '<option value="'.$registro[$campoValor].'"selected="selected">'.$registro[$campoDespliegue].'</option>';
				else
				    echo '<option value="'.$registro[$campoValor].'">'.$registro[$campoDespliegue].'</option>';
				}

	echo  '</optgroup>';
	echo '</select>';
}

function autenticarPassword($nocliente)
	{
	  
		$consulta="SELECT
					sys_usuario.sus_password as password
					FROM sys_usuario
					WHERE
						sys_usuario.sus_keyCliente= '$nocliente'
					AND sys_usuario.sus_estatus = 1;";	
		
			
			return DataRows($consulta);
		
			
		
	}
?>