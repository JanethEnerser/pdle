<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Registro | Plan De Lealtad Enerser</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/favicon.ico" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link href="assets/css/registro.css" rel="stylesheet">


</head>

<body>
<div id="logobar" class="sticky" align="left">
 <img src="assets/img/ENERSER-PlanLealtad-Logo_Horizontal.png" alt="" >
</div>
  <main>
 

      <section class="section min-vh-100 d-flex flex-column align-items-center  py-4" >
        <div class="container">
          <div class="row ">
          
			 <div  align="center" vertical-align="middle">
				 
				

				<form class="row-registro" id="formRegistro" >
				  <fieldset class="name enable">
					<h3> Cuál es tu nombre(s)?</h3><br>
					<div class="center"><i class="fa fa-user fa-2x" style="color: #2a7de1;"></i></div>
					<input type="text" name="name" id="txtname" placeholder="Nombre"/>
					<div class="iconbottom right button down"><i class="fa fa-arrow-down"></i></div>
					
				  </fieldset>
				  <fieldset class="lastname ">
					
					<h3>Ok, ahora tu apellido?</h3><br>
					<div class="center"><i class="fa fa-user fa-2x" style="color: #2a7de1;"></i></div>
					<input type="text" name="lastname" id="txtlastname" placeholder="Apellido"/>
					<div class="iconbottom right button down"><i class="fa fa-arrow-down" ></i></div>
					  
					<div class="iconbottom rightup button up"><i class="fa fa-arrow-up"></i></div>
				  </fieldset>
				  <fieldset class="nocliente ">
					<h3>bien, en esta sección ingresa los 8 digitos de tu tarjeta:</h3><br>
					 <img src="assets/img/tarjeta.PNG" width="80%" id="imgcard">
					<input type="text" name="nocliente" id="txtnocliente"  maxlength="8"  minlength="8" oninput="numberOnly(this.id);" /><br>
					<div class="iconbottom right button down"><i class="fa fa-arrow-down"></i></div>
					  
					<div class="iconbottom rightup button up"><i class="fa fa-arrow-up"></i></div>
				  </fieldset>
				  <fieldset class="phone ">
					  
					<h3>Genial! ahora tu número de contacto</h3><br>
					<div class="center "><i class="fa fa-phone fa-2x" style="color: #2a7de1;"></i></div><br>
					<input type="text" name="phonenumber" id="txtphone" data-mask="(999) 999-9999" />
					<div class="iconbottom right button down"><i class="fa fa-arrow-down"></i></div>
					  
					<div class="iconbottom rightup button up"><i class="fa fa-arrow-up"></i></div>
				  </fieldset>
				  <fieldset class="email ">
					
					<h3>Escribe tu dirección de correo</h3><br>
					<div class="center"><i class="fa fa-envelope fa-2x" style="color: #2a7de1;"></i></div><br>
					<input type="text" name="email" id="txtemail" placeholder="Correo"/>
					<div class="iconbottom right button down" id="showResume"><i class="fa fa-arrow-down"></i></div>
					  
					<div class="iconbottom rightup button up"><i class="fa fa-arrow-up"></i></div>
				  </fieldset>
				  <fieldset class="email ">
					
					<h3>Ya por último, registra una contraseña</h3><br>
					<div class="center"><i class="fa fa-lock fa-2x" style="color: #2a7de1;"></i></div><br>
					<input type="text" name="password" id="txtpassword" placeholder="Contraseña"/>
					<div class="iconbottom right button down" id="showResume"><i class="fa fa-arrow-down"></i></div>
					  
					<div class="iconbottom rightup button up"><i class="fa fa-arrow-up"></i></div>
				  </fieldset>

				  <fieldset class="thanks " id="gracias">
					  <br><h3><i class="fa fa-check-double" style="color: darkolivegreen;"></i> ¡Listo! <i class="fa fa-check-double" style="color: darkolivegreen;"></i></h3>
					  <h5>Haz concluido el registro, por favor verifica que tus datos sean correctos. En caso de necesitar corregir la información por favor utiliza el botón <i class="fa fa-arrow-up" style="background-color: #1855E7; color: #FFFFFF; border-radius: 5px; padding: 5px;"></i> para regresar.</h5>
					  <h6>Nombre: <strong><div id="txtnameshow"></div></strong></h6>
					  <h6>Número de tarjeta: <strong><div id="txtnoclienteshow"></div></strong></h6>
					  <h6>Teléfono: <strong><div id="txtphoneshow"></div></strong></h6>
					  <h6>Correo: <strong><div id="txtemailshow"></div></strong></h6>
					  <h6>Contraseña: <strong><div id="txtpassshow"></div></strong></h6><hr>
					  <div class="button send" style="vertical-align: middle;" id="sendInfo"> ¡Todo está bien! </div>
					
					<div class="iconbottom right button up"><i class="fa fa-arrow-up"></i></div>
					 
				  </fieldset>
				</form><br>
				 
					  
			</div>

            
          </div>
			
        </div>

      </section>


  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->

  <script src="assets/js/jquery/jquery-3.6.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
	
	<script src="assets/js/sweetalert2/sweetalert2.bundle.js"></script>
	<script src="assets/js/registro.js"></script>
 
	<script>
		$('#showResume').click(function(){
        	
			var nombre = $('#txtname').val()+" "+$('#txtlastname').val();
		
			var nocliente = $('#txtnocliente').val();
			var tel = $('#txtphone').val();
			var correo = $('#txtemail').val();
			var pass = $('#txtpassword').val();
			
			$('div#txtnameshow').html(nombre);
			$('div#txtnoclienteshow').html(nocliente);
			$('div#txtphoneshow').html(tel);
			$('div#txtemailshow').html(correo);
			$('div#txtpassshow').html(pass);
		});
	
		$('#sendInfo').click(function(){
        	
			document.getElementById('formRegistro').style.display = 'none';
		  	var data = new FormData(document.getElementById("formRegistro"));
		 	$.ajax({
					url: "forms/sendRegistro.php",        // Url to which the request is send
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
								$('#sa-params')
								
								var nombre = validateJS.nombre;
								 

								Swal.fire(
									{
										title: '¡Gracias '+nombre+' por tu registro!',
										text: 'Llegará un correo de confirmación de registro al correo electrónico proporcionado.',
										icon: 'success',
										backdrop:'rgb(56, 56, 56,0.4)',
										allowOutsideClick: false,
										showCancelButton: false,
										confirmButtonColor: '#67a8e4',
										cancelButtonColor: "#f46a6a",
										 confirmButtonClass: 'btn btn-success mt-2',
										cancelButtonClass: 'btn btn-danger ms-2 mt-2',
									}).then(function (result) {
										if (result.value) {

											window.location.href="login";

										  }
										});	
								break;
							
							case 2:
								$('#sa-params')
								
								var nombre = validateJS.nombre;
								 

								Swal.fire(
									{
										title: 'Ya tenemos una cuenta asociada a este correo.',
										text: 'Favor de proporcionar otro o si lo desea puede ponerse en contacto con atención a clientes.',
										icon: 'error',
										backdrop:'rgb(56, 56, 56,0.4)',
										allowOutsideClick: false,
										showCancelButton: false,
										confirmButtonText: 'Aceptar',
										confirmButtonColor: '#67a8e4',
										cancelButtonColor: "#67a8e4",
										 confirmButtonClass: 'btn btn-success mt-2',
										cancelButtonClass: 'btn btn-danger ms-2 mt-2',
									}).then(function (result) {
										if (result.value) {

											window.location.href="registro";

										  }
										});	
								break;
							
							
						
								
						}
            
					}
				});
		 });
	
   
     
	
	
	
	</script>

</body>

</html>