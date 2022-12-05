<?php
include_once 'seguridad/class_conection.php';	
$token = $_GET['rc_t'];
$validar = '';

$consulta = 'SELECT * from sys_log_pass where sys_log_pass.slp_token = "'.$token.'";';
$Data =DataRow($consulta);
$fecha	= date("Y-m-d H:i:s");

if(is_null($Data['slp_utilizado']) && $fecha < $Data['slp_fechaVencimiento'] ){
	
	$consulta_2 = 'SELECT  * FROM sys_log_pass WHERE slp_correo = "'.$Data['slp_correo'].'" ORDER BY slp_fechaSistema DESC, slp_idreg DESC  LIMIT 1 ;';
	
	$Data_2 = DataRow($consulta_2);
	$token_2 = $Data_2['slp_token'];
	
	if($token == $token_2){
		$validar = 1;
	}
	
}else {
	
	$validar = 2;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Reestablecer contraseña</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/favicon.ico" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

  <main>
 

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4" id="loginpage">
        <div class="container">
          <div class="row ">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center" id="logincard">

              <div class="d-flex justify-content-center py-4">
                <a href="http://plandelealtadenerser.mx/" class="logo d-flex align-items-center w-auto">
                  
                  
                </a>
              </div><!-- End Logo -->

              <div class="card mb-4">
				  
				  <?php if($validar == 1){ ?>
				<!-- Condicion 1-->
                <div class="card-body">

                  <div class="pt-4 pb-2" align="center">
                    <img src="assets/img/ENERSER-PlanLealtad-Logo_Horizontal-1.png" alt="" width="60%">
                  </div>

                  <form class="row g-4 needs-validation" align="center" id="formid">
					<h2>Ingresa la nueva contraseña para el correo: <strong> <?php echo($Data['slp_correo']); ?></strong></h2>
					<br>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Por favor ingresa la nueva contraseña</label>
					  <input type="password" name="password"  class="form-control" id="yourPassword" required><br>
					  <label for="yourUsername" class="form-label">Confirmar contraseña</label>
						
					  <input type="password" name="renewpassword"  class="form-control" id="renewpassword" required><br>
					  <input type="hidden" name="correo"  class="form-control" id="idcorreo" value="<?php echo($Data['slp_correo']); ?>">
					  <input type="hidden" name="token"  class="form-control" id="token" value="<?php echo($token); ?>">
                      <div class="invalid-feedback">!</div><br>
                   

                    <div class="col-12">
                      <input type="checkbox" onclick="verpassword()" > Mostrar contraseña
                    </div><br>
                     
                    </div>

                   
                    
                  </form>
					<br>
					
					<div class="col-12">
                      <button class="btn btn-primary w-100" onclick="restablecerPass();">Restablecer contraseña <i class="fa fa-arrow-right"></i></button>
                    </div>
					

                </div><!-- End Condicion 1 -->
				  <?php } else { ?>
				<!-- Condicion 2-->
                <div class="card-body" style="background-color: rgba(250, 117, 117,0.2);">

                  <div class="pt-4 pb-2" align="center">
                    <img src="assets/img/ENERSER-PlanLealtad-Logo_Horizontal-1.png" alt="" width="60%">
                  </div>

                  <form class="row g-4 needs-validation" align="center" id="formid">
					<h2>Lo sentimos este URL ha caducado <strong></strong></h2>
					
                    <div class="col-12">
                      
                    </div>

                   
                    
                  </form>
					<br>
					
					<div class="col-12">
                      <button class="btn btn-primary w-100" onclick="window.location.href='login'">Regresar <i class="fa fa-undo"></i></button>
                    </div>
					

                </div><!-- End Condicion 2 -->
				   <?php } ?>
              </div>

              <div class="credits">
            
                
              </div>

            </div>
          </div>
        </div>

      </section>


  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
	
  <script src="assets/js/jquery/jquery-3.6.0.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/js/sweetalert2/sweetalert2.bundle.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
<script>
	  function verpassword(){
		  var tipo = document.getElementById("yourPassword");
		  var tipo2 = document.getElementById("renewpassword");
		  if(tipo.type == "password")
		  {
			  tipo.type = "text";
			  tipo2.type = "text";
		  }
		  else
		  {
			  tipo.type = "password";
			  tipo2.type = "password";
		  }
	  }

		function restablecerPass() {
            
				
				//-------------------------------------------------------------
				var data = new FormData(document.getElementById("formid"));
				
                   $.ajax({
                    url: 'forms/changePasswordUsuario.php',
                    type: 'POST',
					processData: false,
					contentType: false,
					data: data,
                    success: function(response) {
							
						validateJS = JSON.parse(response);
						content1 = "";
						content2 = "";
                        
						switch(validateJS.caso) {
							
							case 1://Validacion  correcta.
								$('#sa-params')

								Swal.fire(
									{
										title: '¡Cambio de contraseña exitoso!',
										text: 'Da click en aceptar para redirigirte a la página de acceso',
										icon: 'success',
										allowOutsideClick: false,
										showCancelButton: false,
										confirmButtonText: 'Aceptar',
										confirmButtonColor: '#67a8e4',
										cancelButtonColor: "#f46a6a",
										 confirmButtonClass: 'btn btn-success mt-2',
										cancelButtonClass: 'btn btn-danger ms-2 mt-2',
									}).then(function (result) {
										if (result.value) {

											window.location.assign("login");

										  } 

								});	
										
								break;
							case 2://Validacion erronea.
								content1 = "";
								
								  $('#sa-warning')
											Swal.fire(
												{
												title: "Ocurrió un error",
												icon: "error",
												text: 'Por favor ingresa una contraseña.',
												cancelButtonColor: "#f46a6a"
												
											 	} 
											)
										
								break;
							case 3://Validacion erronea.
								content1 = "";
								
								  $('#sa-warning')
											Swal.fire(
												{
												title: "Verifica los datos ingresados",
												icon: "warning",
												text: 'Por favor verifica que la nueva contraseña y la confirmación de contraseña coincidan.',
												cancelButtonColor: "#f46a6a"
												
											 	} 
											)
										
								break;
						
								
						}
            
					}
						
            
					});
			}

</script>
</body>

</html>
