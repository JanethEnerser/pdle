<?php

$fecha	= date("YmdHis");
header('Content-type:application/vnd.openxmlformats-officedocument.spreadsheetml.shee');

header('Content-Disposition: attachment; filename=PDLE_Reporte_'.$fecha.'.xlsx');

require_once('../seguridad/sesion.php');
require_once('../seguridad/data.php');


$image = 'C:\xampp\htdocs\pdle\assets\img\ENERSER-PlanLealtad-Logo_Horizontal-2.png';

// Read image path, convert to base64 encoding
$imageData = base64_encode(file_get_contents($image));

// Format the image SRC:  data:{mime};base64,{data};
$src = 'data:'.mime_content_type($image).';base64,'.$imageData;


$fecha_actual = date("Y-m-d");
?>

<table border="1">
	<tr>
		<th colspan="3" width="20%" rowspan="6"><?php echo '<img src="',$image,'" width="388" height="167" >'?></th>
		<th colspan="11" rowspan="6">Detalle de movimientos de  <?php echo date("Y-m-d",strtotime($fecha_actual."- 1 year")); ?>  a <?php echo $fecha_actual; ?>  </th>
		
	</tr>
	
	<tr >
		<th style="background-color:#83b5ee;">No. cliente</th>
		<th style="background-color:#83b5ee;">Nombre</th>
		<th style="background-color:#83b5ee;">Estatus</th>
		<th style="background-color:#83b5ee;">Teléfono</th>
		<th style="background-color:#83b5ee;">Correo</th>
		<th style="background-color:#83b5ee;">Puntos acumulados</th>
		<th style="background-color:#83b5ee;">Puntos canjeados</th>
		<th style="background-color:#83b5ee;">Puntos disponibles</th>
		<th style="background-color:#83b5ee;">Fecha Última Carga</th>
		<th style="background-color:#83b5ee;">Estado</th>
		<th style="background-color:#83b5ee;">Ciudad</th>
		<th style="background-color:#83b5ee;">C.P.</th>
		<th style="background-color:#83b5ee;">Colonia</th>
		<th style="background-color:#83b5ee;">Calle</th>
	</tr>
	<tbody>
	<?php
		$DataConsulta = SQL_Clientes();
		$datarows = sqlsrv_query($conSQL,$DataConsulta);
		if($datarows == NULL){$datarows = 0;}

			while($regDatap=sqlsrv_fetch_array($datarows))

			{
				echo '<tr>
							<td>'.$regDatap['NumeroCliente'].'</td>
							<td>'.$regDatap['NombreCliente'].'</td>
							<td>'.$regDatap['EstatusCliente'].'</td>
							<td>'.$regDatap['TelefonoCliente'].'</td>
							<td>'.$regDatap['CorreoElectronico'].'</td>
							<td>'.$regDatap['PuntosAcumulados'].'</td>
							<td>'.$regDatap['PuntosCanjeados'].'</td>
							<td>'.$regDatap['puntosredondeados'].'</td>
							<td>'.$regDatap['FechaUltimoConsumo'].'</td>
							<td>'.$regDatap['EstadoCliente'].'</td>
							<td>'.$regDatap['CiudadCliente'].'</td>
							<td>'.$regDatap['CP_Cliente'].'</td>
							<td>'.$regDatap['ColoniaCliente'].'</td>
							<td>'.$regDatap['CalleCliente'].'</td>

					  </tr>';
			}


	?>
	</tbody>
	
</table>