<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Acceso | Plan De Lealtad Enerser test github</title>
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

  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

  <main>
 

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4" id="loginpage">
        <div class="container">
          <div class="row ">
            <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center justify-content-center" id="logincard">

              <div class="d-flex justify-content-center py-4">
                <a href="http://plandelealtadenerser.mx/" class="logo d-flex align-items-center w-auto">
                  
                  
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2" align="center">
                    <img src="assets/img/PDLE-Horizontal.gif" alt="" width="50%">
                  </div>

                  <form class="row g-3 needs-validation" id="loginForm">
					<div class="upload-msg"></div>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Correo electrónico</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="email" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback"></div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Contraseña</label>
                      <input type="password" name="password"  class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">!</div>
                    </div>

                    <div class="col-12">
                      <input type="checkbox" onclick="verpassword()" > Mostrar contraseña
                    </div><br>
					
					<div class="col-12" align="center">
                      <p class="small mb-0"><a href="recuperar"> ¿Olvidaste tu contraseña? </a></p>
                    </div>
                    
                   
                    
                    
                  </form>
					<br>
					
					<div class="col-12">
                      <button class="btn btn-primary w-100" onclick="autenticar();">Iniciar sesión</button>
                    </div><hr>
					<div class="col-12" align="center">
                      <p class="small mb-0">¿No tienes cuenta? <a href="registro"><strong>¡Solicita tu registro!</strong></a></p>
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

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
<script>
  function verpassword(){
      var tipo = document.getElementById("yourPassword");
      if(tipo.type == "password")
	  {
          tipo.type = "text";
      }
	  else
	  {
          tipo.type = "password";
      }
  }
	function autenticar(){
		
		var data = new FormData(document.getElementById("loginForm"));
		
		$.ajax({
					url: "seguridad/autenticar.php",        // Url to which the request is send
					type: "POST",             // Type of request to be send, called as method
					data: data, 			  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
					contentType: false,       // The content type used when sending data to the server.
					cache: false,             // To unable request pages to be cached
					processData:false,        // To send DOMDocument or non processed data file it is set to false
					success: function(data)   // A function to be called if request succeeds
					{	
						
						validateJS = JSON.parse(data);
					
                        
						switch(validateJS.caso) {
							case 1:
								
								window.location.replace("inicio");
								break;
							case 2:
								$(".upload-msg").html(validateJS.mensaje);
								window.setTimeout(function() {
								$(".alert-dismissible").fadeTo(500, 0).slideUp(500, function(){
								$(this).remove();
								});	}, 5000);
										
								break;
							case 3:
								
								window.location.replace("panel");
								break;
						
								
						}
            
					}
				});
		
	}
</script>
</body>

</html>