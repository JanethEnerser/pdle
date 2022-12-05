<?php
//error_reporting(0);
require_once('seguridad/sesion.php');
require_once('seguridad/data.php');
$activePage = basename($_SERVER['PHP_SELF'], ".php");
$title = "Inicio";

include_once('inc/header.php');
include_once('inc/sidebar.php');



$DataConsulta = SQL_InfoCliente($nocliente);
$datarow = sqlsrv_query($conSQL,$DataConsulta);
$Data=sqlsrv_fetch_array($datarow);
/*
$DataConsulta_TCA = SQL_TotalClientesActivos();
$datarow_TCA = sqlsrv_query($conSQL,$DataConsulta_TCA);
$Data_TCA=sqlsrv_fetch_array($datarow_TCA);

$DataConsulta_TCI = SQL_TotalClientesInactivos();
$datarow_TCI = sqlsrv_query($conSQL,$DataConsulta_TCI);
$Data_TCI=sqlsrv_fetch_array($datarow_TCI);
*/
$DataConsulta_TU = TotalUsuarios(1);
$Data_TU = $DataConsulta_TU['total_usuarios'];

$DataConsulta_SP = TotalSoporte(1);
$Data_SP = $DataConsulta_SP['spendiente'];

$DataConsulta_SPR = TotalSoporte(2);
$Data_SPR = $DataConsulta_SPR['sproceso'];

$DataConsulta_SC = TotalSoporte(3);
$Data_SC = $DataConsulta_SC['scerradas'];

?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Inicio</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item "><a href="panel">Dashboard</a></li>
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

        <!--  columns -->
        <div class="col-lg-12">
          <div class="row">
		 	<!-- Download button -->
				<div class="row">
					<div class="col-12 btn-download" >

						<button type="button" class="btn btn-success"  id="Dlbtn"><i class="bi bi-download"></i>  Descargar reporte</button>

					</div>
				</div>
			  <!-- End Download button-->
            <div class="col-12">
			 

              <div class="card recent-sales overflow-auto">

                

                <div class="card-body">
                  <h5 class="card-title">¡Bienvenido <?php echo $Data['NombreCliente']; ?>!</h5>

                  

                </div>

              </div>
            </div><!-- End Reports -->
			  <?php if($Data['EstatusCliente'] == 'Inactivo'){
						 echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
								Tu estatus se encuentra <strong>Inactivo</strong> los puntos acumulados los podrás utilizar hasta el día: '.$Data['FechaVencimientoPuntos'].'. Para no perder tus puntos disponibles favor de ponerse en contacto con soporte.  
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							  </div>';} ?>
			  

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">


                <div class="card-body">
					<?php
					$date = date('Y-m-d');
					?>
                  <h5 class="card-title">Total de clientes activos<span>| <?php echo $date; ?></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-check"></i>
                    </div>
                    <div class="ps-3">
						
						
                      <h6><?php echo $Data_TCA['clientes_activos']; ?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card activos-card">


                <div class="card-body">
                  <h5 class="card-title">Usuarios registrados <span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" >
                      <i class="bi bi-person-check-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $Data_TU ?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

               

                <div class="card-body">
                  <h5 class="card-title">Clientes inactivos</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="color:#8f8f8f;background:#fcf6d46b;">
                      <i class="bi bi-person-dash-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $Data_TCI['clientes_inactivos'] ?></h6>
                     

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
            <!-- Support Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

               

                <div class="card-body">
                  <h5 class="card-title">Solicitudes de soporte pendientes</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="color:#e7d8a3;background:#fcf6d46b;">
                      <i class="bi bi-exclamation-circle"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $Data_SP ?></h6>
                    

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Support Card -->
            <!-- Support Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

               

                <div class="card-body">
                  <h5 class="card-title">Solicitudes de soporte En proceso</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-arrow-repeat"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $Data_SPR ?></h6>
                     

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Support Card -->
            <!-- Support Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

               

                <div class="card-body">
                  <h5 class="card-title">Solicitudes de soporte Cerradas</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"  style=" color: #2eca6a; background: #e0f8e9;">
                      <i class="bi bi-clipboard2-check"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $Data_SC ?></h6>
                     

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Support Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">


                <div class="card-body">
					<?php
					$date = date('Y-m-d');
					?>
                  <h5 class="card-title">Puntos disponibles<span>| <?php echo $date; ?></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-check"></i>
                    </div>
                    <div class="ps-3">
						
						
                      <h6><?php echo $Data['puntosredondeados']; ?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End pd Card -->
            <!-- Estatus Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">


                <div class="card-body">
                  <h5 class="card-title">Estatus <span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="color: <?php if($Data['EstatusCliente'] == 'Inactivo'){
						 echo '#8f8f8f';}else{echo '#4154f1'; }?>">
                      <i class="bi bi-person-<?php if($Data['EstatusCliente'] == 'Inactivo'){
						 echo 'dash';}else{echo 'check'; } ?>-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $Data['EstatusCliente'] ?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Estatus Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

               

                <div class="card-body">
                  <h5 class="card-title">No. de cliente</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-badge"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $Data['NumeroCliente'] ?></h6>
                     

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->


           
            
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
var sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';
	
$(document).on('click', '#Dlbtn', function() {
	$.ajax({
			url:  'forms/downloadExcelView.php',
		 	xhr: function() {
		 		var xhr = $.ajaxSettings.xhr();
		 		xhr.onprogress = function(e) {
					swal.fire({
						html: sweet_loader + '<h4>Loading...</h4>'

					});
		 	};
		 	return xhr;
		 },
		 success: function(response) {
		 
			swal.fire({
				icon: 'success',
				html: '<h4>Success!</h4>'
			});
		
		 },
		 error: function() {
				 setTimeout(function() {
				 	swal.fire({
				 		icon: 'error',
				 		html: '<h4>Ups!</h4><h5>Algo va mal.</h5>'
				 	});
				 }, 700);
		 }
	 
});

</script>