<?php
//error_reporting(0);
require_once('seguridad/sesion.php');
require_once('seguridad/data.php');
$activePage = basename($_SERVER['PHP_SELF'], ".php");
$title = "Panel de soporte";

include_once('inc/header.php');
include_once('inc/sidebar.php');



$DataConsulta = SQL_InfoCliente($nocliente);
$datarow = sqlsrv_query($conSQL,$DataConsulta);
$Data=sqlsrv_fetch_array($datarow);


?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Panel de soporte</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item "><a href="inicio">Panel de soporte</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
			  <?php if($Data['EstatusCliente'] == NULL){
						 echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<H5>No encontramos información asociada a este número de cliente: <strong>'.$nocliente.'</strong> </h5><h6>Favor de comunicarte con soporte. </h6> 
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							  </div>';} ?>

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
		

            <!-- Reports -->
            <div class="col-12">
			 

              <div class="card recent-sales overflow-auto">

                

                <div class="card-body">
                  <h5 class="card-title">Reporte <span>Últimos 12 meses</span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div><hr>
					 <table hidden>
                    <thead>
                      <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Puntos</th>
                       
                      </tr>
                    </thead>
                    <tbody>
					<?php
													

						$consultagm = SQL_GraficaMensual($nocliente);
							$datarows = sqlsrv_query($conSQL,$consultagm,array(), array( "Scrollable" => 'static' ));
							if($datarows == NULL){$datarows = 0;}
						  
						  		if(sqlsrv_num_rows($datarows)>0){

									while($regDatap=sqlsrv_fetch_array($datarows))

									{

										

										echo '<tr>
													<td>'.$regDatap['NombreMes'].'</td>
													<td>'.$regDatap['TotalMesPuntos'].'</td>
											  </tr>';
										
											$json_obj_nm [] = $regDatap['NombreMes'];
											$json_obj_mp [] = $regDatap['TotalMesPuntos'];
									}
									
								}else {
				
				
									echo '<tr align="center"><td colspan="5">No hay información para mostrar.</td> </tr>';



								}


						?>
						
                      
                    </tbody>
                  </table>
				<h5 class="card-title">Registros recientes</span></h5><hr>
				  <div class="row">
				  	<section class="col col-4">
					 <label class="label">Año:</label>
						<input id="nocliente" type="hidden" value="<?php echo $nocliente;?>">
						<?php Select('sel_yr',SQL_AñosDisponibles($nocliente),'yeardisp','yeardisp',$datos_DB['yeardisp']=date('Y'),'1','Año','onChange=','',$conSQL); ?>
					</section>
				  	<section class="col col-5">
					 <label class="label">Mes:</label>
						<?php Select('sel_mes',SQL_MesesDisponibles($nocliente),'Mes','NombreMes',$datos_DB['Mes']= date('m'),'2','Mes','onChange=','',$conSQL); ?>
					</section>
				  	<section class="col col-3">
					 <br>
						<button type="button" onclick="UpdateTable();" class="btn btn-primary">Buscar</button>
					</section>
				  
				  </div><br>
				  <?php 
				  
				  ?>
				  
                  <table class="table table-borderless datatable" id="table_detalle">
                    <thead>
                      <tr>
                        <th scope="col">Año</th>
                        <th scope="col">Mes</th>
                        <th scope="col">Estación</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Puntos Obtenidos</th>
                      </tr>
                    </thead>
                    <tbody id="body_detalle">
					<?php
						
						$mes= date('m');
						$yr = date('Y');
													

						$consultames = SQL_DetalleMensual($nocliente,$mes,$yr);
							$datarows = sqlsrv_query($conSQL,$consultames);
							if($datarows == NULL){$datarows = 0;}

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


						?>
						
                      
                    </tbody>
                  </table>

                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->

           
            
          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        

      </div>
    </section>

  </main><!-- End #main -->
<?php
include_once('inc/footer.php');

?>
<script>
	
$(document).ready(function() {
   

});

function UpdateTable() {
		
		$.ajax({
					url: 'forms/updateTableDetallePuntos.php',
					type: 'get',
					data: {yr:$('#sel_yr').val(),mes:$('#sel_mes').val(),cli:$('#nocliente').val()},
					success: function(response) {
						$('#body_detalle').html(response);
						

					}
				});	

			}
var arrayMes= <?php echo json_encode($json_obj_nm); ?>;
var dataPuntos= <?php echo json_encode($json_obj_mp, JSON_NUMERIC_CHECK); ?>;
	
	document.addEventListener("DOMContentLoaded", () => {
	  new ApexCharts(document.querySelector("#reportsChart"), {
		series: [{
		  name: 'Puntos Acumulados',
		  data: dataPuntos,
		}],
		chart: {
		  height: 350,
		  type: 'area',
		  toolbar: {
			show: false
		  },
		},
		markers: {
		  size: 4
		},
		colors: ['#4154f1', '#2eca6a', '#ff771d'],
		fill: {
		  type: "gradient",
		  gradient: {
			shadeIntensity: 1,
			opacityFrom: 0.3,
			opacityTo: 0.4,
			stops: [0, 90, 100]
		  }
		},
		dataLabels: {
		  enabled: false
		},
		stroke: {
		  curve: 'smooth',
		  width: 2
		},
		xaxis: {
		 
		  categories: arrayMes
		},
		tooltip: {
		  x: {
			format: 'dd/MM/yy HH:mm'
		  },
		}
	  }).render();
	});
</script>