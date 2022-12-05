<?php
require_once('../seguridad/sesion.php');
require_once('../seguridad/data.php');
error_reporting(0);
//$i = 0;
$string = '';

if (isset($_GET['yr']))
 {
	$yr = $_GET['yr'];
	$mes = $_GET['mes'];
	$cli = $_GET['cli'];
	
 	
	 
														
															
			$consultames = SQL_DetalleMensual($cli,$mes,$yr);
			$datarows = sqlsrv_query($conSQL,$consultames,array(), array( "Scrollable" => 'static' ));
	
	
	
			if($datarows == NULL){$datarows = 0;}
	
			if(sqlsrv_num_rows($datarows)>0){

					while($regDatap=sqlsrv_fetch_array($datarows))

					{

						echo '<tr>
									<td>'.$regDatap['regyear'].'</td>
									<td>'.$regDatap['Mes'].'</td>
									<td>'.$regDatap['NombreComercial'].'</td>

									<td>'.$regDatap['DescripcionProducto'].'</td>
									<td>'.$regDatap['PuntosObtenidos'].'</td>



							  </tr>';
					}
			}else {
				
				
				echo '<tr align="center"><td colspan="5">No hay información para mostrar.</td> </tr>';
				
				
				
			}
													
																					  	
	 
 	
 }
 else
 {
 	{echo 'Invalid Input';}
 }

?>