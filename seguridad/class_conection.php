<?php

function conectar(){
	//Conectar al servidor
	$con = mysqli_connect("localhost", "root", "Enerser123#", 'pdle') or die('Error al conectar al servidor.');
	return($con);
	
}

function desconectar($con){
	//cerrar conexion al servidor de datos
	mysqli_close($con);
}

function ejecutarQuery($consulta){
	//Ejecucion del query en el servidor de datos
	//Se puede utilizar directamente para Inserts & Updates
	$con = conectar();
	$datarow = mysqli_query($con,$consulta);

	desconectar($con);
	
	return($datarow);
}

function DataRow($consulta){
	//Retorna solo un registro
	$data = ejecutarQuery($consulta);
	if(mysqli_num_rows($data)>0){
		return(mysqli_fetch_assoc($data));
	}else{
		return(null);
	}
}

function DataRows($consulta){
	//Retorna una coleccion de datos al solicitante
	$data = ejecutarQuery($consulta);
	if(mysqli_num_rows($data)>0){
		return($data);
	}else{
		return(null);//Se retorna null si el query no trae valores.
	}
}

function conectarSQL(){
	//Conectar al servidor
	 	$serverName = '10.255.248.28'; 
        $connectionOptions = array("Database"=>"DWH_Empresarial", "UID"=>"usuariomkt", "PWD"=>"EnerserMKT1", "CharacterSet"=>"UTF-8"); 
        $conSQL = sqlsrv_connect($serverName, $connectionOptions);    
       
        return ($conSQL);
	
	
     
	
}



?>