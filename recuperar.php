<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Recuperar acceso</title>
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

                <div class="card-body">

                  <div class="pt-4 pb-2" align="center">
                    <img src="assets/img/ENERSER-PlanLealtad-Logo_Horizontal-1.png" alt="" width="60%">
                  </div>

                  <form class="row g-4 needs-validation" align="center" id="formid">
					<h2>¿Olvidaste tu contraseña?</h2>
					<p> Te enviaremos las instrucciones para restablecer tu contraseña por correo electrónico</p><br>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Correo electrónico</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="email" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback"></div>
                      </div>
                    </div>

                   
                    
                  </form>
					<br>
					
					<div class="col-12">
                      <button class="btn btn-primary w-100" id="botonEnviar" onclick="enviarCorreo();">Restablecer contraseña <i class="fa fa-arrow-right"></i></button>
                    </div>
					

                </div>
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
	$(document).ready(function(){
            $("#botonEnviar").click(function(event){
                event.preventDefault();
            $("#botonEnviar").prop('disabled',true)
            
            return false;
            })
        })
		
			function enviarCorreo(){


						//-------------------------------------------------------------
						var correo = new FormData(document.getElementById("formid"));
						

						  $.ajax({
							url: 'forms/sendCambioPass.php',
							type: 'POST',
							processData: false,
							contentType: false,
							data: correo,
							success: function(response) {
								
								validateJS = JSON.parse(response);
							

								switch(validateJS.caso) {

									case 1://Validacion  correcta.
										content1 = "Se envió el correo exitosamente, por favor verifica tu bandeja";
										  $('#sa-success')
													Swal.fire(
														{
														title: content1,
														icon: "success",

														confirmButtonColor: '#67a8e4',

														} 
													)


										break;
									case 2://Validacion erronea.
										content1 = "";

										  $('#sa-warning')
													Swal.fire(
														{
														title: "Ocurrió un error",
														icon: "error",
														text: 'No encontramos una cuenta con el correo asociado. Favor de verificar el correo ingresado o bien si lo desea puede ponerse en contacto con atención al cliente al (999) 999-9999 ',
														cancelButtonColor: "#f46a6a"

														} 
													)

										break;;
									case 3://Validacion erronea.
										content1 = "";

										  $('#sa-error')
													Swal.fire(
														{
														title: "Ocurrió un error",
														icon: "error",
														text: 'Favor de verificar el correo ingresado',
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
