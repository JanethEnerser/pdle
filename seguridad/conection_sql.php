<?php
function conectar(){
	//Conectar al servidor
	 	$serverName = '10.255.248.28'; 
        $connectionOptions = array("Database"=>"DWH_Empresarial", "UID"=>"usuariomkt", "PWD"=>"EnerserMKT1", "CharacterSet"=>"UTF-8"); 
        $con = sqlsrv_connect($serverName, $connectionOptions);    
       
        return ($con);
     
	
}


?>