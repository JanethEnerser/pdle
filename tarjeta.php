
<?php
error_reporting(0);
require_once('seguridad/sesion.php');
require_once('seguridad/data.php');

$activePage = basename($_SERVER['PHP_SELF'], ".php");
$title = "Mi tarjeta";

include_once('inc/header.php');
include( 'assets/phpqrcode/qrlib.php' );


include_once('inc/sidebar.php');

$Data = infoUsuario(4,$nocliente);
$DataConsulta = SQL_InfoCliente($nocliente);
$datarow = sqlsrv_query($conSQL,$DataConsulta);
$DataSQL=sqlsrv_fetch_array($datarow);


$qr1 = str_pad($DataSQL['NumeroCliente'], 8, "0", STR_PAD_LEFT);
$qr2 = str_pad($DataSQL['Vehiculo'], 4, "0", STR_PAD_LEFT);

$text = "MPQR".$qr1.$qr2;


//QRcode::png($text,$location);
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Perfil</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
          <li class="breadcrumb-item active">Mi tarjeta digital</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
		  
	  <?php if($DataSQL['EstatusCliente'] == NULL){
				 echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<H5>No encontramos información asociada a este número de cliente: <strong>'.$nocliente.'</strong> </h5><h6>Favor de comunicarse con soporte. </h6> 
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					  </div>';} ?>
		  
        <div class="col-xl-12">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <!--<img src="<?php //echo $location; ?>" alt="Profile" class="rounded-circle" > -->
				<input type="hidden" id="qrinput" value="<?php echo $text; ?>">
				<div id="qrcode"></div>
             
              <h2><?php echo $Data['nombre']; ?></h2>
              
            </div>
          </div>


          <div class="card overflow-auto">
            <div class="card-body pt-3 ">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Últimos registros</button>
                </li>

              

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  
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


						?>
						
                      
                    </tbody>
                  </table>

                </div>
 




                

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
<?php
include_once('inc/footer.php');

?>
<script type="text/javascript">
	
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
var qrcode = new QRCode("qrcode");

	function makeCode () {    
	  var elText = document.getElementById("qrinput");



	  qrcode.makeCode(elText.value);
	}

	makeCode();

	$("#qrinput").
	  on("blur", function () {
		makeCode();
	  }).
	  on("keydown", function (e) {
		if (e.keyCode == 13) {
		  makeCode();
		}
	  });
	
</script>