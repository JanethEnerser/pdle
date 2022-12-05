<style>

label[for="fileToUpload"] {
 font-size: 14px;
 font-weight: 600;
 color: #fff!important;
 background-color: #106BA0;
 display: inline-block;
 transition: all .5s;
 cursor: hand;
 padding: 15px 40px !important;
 text-transform: uppercase;
 width: fit-content;
 }
label[for="fileToUpload"]:hover {
 
 background-color: #9fc0d4;

 }
#fileToUpload {
   opacity: 0;
   position: absolute;
   z-index: -1;

}
.hidden{ display: none; }
</style>
<?php
error_reporting(0);
require_once('seguridad/sesion.php');
require_once('seguridad/data.php');
$activePage = basename($_SERVER['PHP_SELF'], ".php");
$title = "Perfil";
include_once('inc/header.php');
include_once('inc/sidebar.php');

$Data = infoUsuario(4,$nocliente);
$DataConsulta = SQL_InfoCliente($nocliente);
$datarow = sqlsrv_query($conSQL,$DataConsulta);
$DataSQL=sqlsrv_fetch_array($datarow);

?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Perfil</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
          <li class="breadcrumb-item active">Perfil</li>
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
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="uploads/usuarios/fotos/<?php echo $foto; ?>" alt="Profile" class="rounded-circle">
              <h2><?php echo $Data['nombre']; ?></h2>
              
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Resumen</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Solicitar corrección de datos</button>
                </li>

                

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Cambiar contraseña</button>
                </li>
                


               

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  
                  <h5 class="card-title">Información</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nombre completo</div>
                    <div class="col-lg-9 col-md-8"><?php echo $DataSQL['NombreCliente'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Estado</div>
                    <div class="col-lg-9 col-md-8"><?php echo $DataSQL['EstadoCliente'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Ciudad</div>
                    <div class="col-lg-9 col-md-8"><?php echo $DataSQL['CiudadCliente'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Calle</div>
                    <div class="col-lg-9 col-md-8"><?php echo $DataSQL['CalleCliente'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Colonia</div>
                    <div class="col-lg-9 col-md-8"><?php echo $DataSQL['ColoniaCliente'];?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">CP</div>
                    <div class="col-lg-9 col-md-8"><?php echo $DataSQL['CP_Cliente'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Teléfono</div>
                    <div class="col-lg-9 col-md-8"><?php echo $DataSQL['TelefonoCliente'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Correo</div>
                    <div class="col-lg-9 col-md-8"><?php echo $DataSQL['CorreoElectronico'];?></div>
                  </div>

                </div>
 
                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form id="formEditarDatosClientes">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="uploads/usuarios/fotos/<?php echo $foto;?>" alt="Profile">
                        <div class="pt-2">
                         	<form>
							   <div class="form-group ">
									

									<label for="fileToUpload" ><i class="bi bi-upload" aria-hidden="true" style="cursor: hand"> Subir Archivo</i></label>
									<input  type="file" name="photo" id="fileToUpload" onchange="upload_image(<?php echo($DataSQL['NumeroCliente']); ?>);" />	

									<p class="help-block"></p>


							  </div>

							</form><br><br>
                      </div>
                    </div><hr>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nombre completo</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id="fullName" value="<?php echo $DataSQL['NombreCliente'] ?>">
                      </div>
                    </div>


                  
                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Estado</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="state" type="text" class="form-control" id="State" value="<?php echo  $DataSQL['EstadoCliente'];?>">
                      </div>
                    </div>


                  
                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Ciudad</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="city" type="text" class="form-control" id="City" value="<?php echo  $DataSQL['CiudadCliente'];?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Calle</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="calle" type="text" class="form-control" id="calle" value="<?php echo $DataSQL['CalleCliente']; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Colonia</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="colonia" type="text" class="form-control" id="colonia" value="<?php echo $DataSQL['ColoniaCliente']; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">CP</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="cp" type="text" class="form-control" id="cp" value="<?php echo $DataSQL['CP_Cliente']; ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Teléfono</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" value="<?php echo $DataSQL['TelefonoCliente'];?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Correo</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="<?php echo $DataSQL['CorreoElectronico'];?>">
                        <input name="nocli" type="hidden" class="form-control" id="nocli" value="<?php echo $DataSQL['NumeroCliente']; ?>">
                      </div>
                    </div>

                   <div class="text-center">
                      <button  class="btn btn-primary" type="button" onClick="makeAjaxModal();">Solicitar cambios</button>
                    </div>
                    
                  </form><!-- End Profile Edit Form -->
					
                </div>
                </div>


                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form id="formEditarPassClientes">

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Contraseña actual</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="password">
                        <input name="idF" type="hidden" class="form-control" id="idF" value="<?php echo($DataSQL['NumeroCliente']); ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nueva contraseña</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newpassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Confirmar nueva contraseña</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewpassword">
                      </div>
                    </div>
					  <br>

                    <div class="row mb-3" align="center">
                    
                      <div class="col-md-8 col-lg-9">
                        <input type="checkbox" onclick="verpassword()" > Mostrar contraseñas
                      </div>
                    </div>
					<br>
					</form>

                    <div class="text-center">
                      <button type="button" onclick="makeAjaxModalPassword();" class="btn btn-primary">Cambiar contraseña</button>
                    </div>
                  <!-- End Change Password Form -->

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
	
	function makeAjaxModal() {
			  $.ajax({
				success: function() {
				  Swal.fire(
							{
								title: '¿Seguro que deseas editar la información?',
								text: 'Los cambios en la información proporcionados se estarían enviando a través de un correo electrónico a uno de nuestros administradores del sistema. El tiempo aproximado de respuesta es de un 1 día hábil.',
								icon: 'question',
								showCancelButton: true,
								confirmButtonText:'Aceptar',
								cancelButtonText:'Cancelar',
								confirmButtonColor: '#67a8e4',
								cancelButtonColor: "#f46a6a",
								confirmButtonClass: 'btn btn-success mt-2',
								cancelButtonClass: 'btn btn-danger ms-2 mt-2',
								confirmButtonClass: 'btn btn-success mt-2'
								
							}).then(function (result) {
								if (result.value) {
											
									
									makeAjaxSendInfo()


								  } else if (result.dismiss === swal.DismissReason.cancel){
									// Read more about handling dismissals



								 }

						});	
				}
			  });		
			}
	function makeAjaxModalPassword() {
			  $.ajax({
				success: function() {
				  Swal.fire(
							{
								title: '¿Seguro que deseas editar cambiar la contraseña?',
								text: 'La sesión se cerrará al confirmar el cambio de contraseña para que ingrese nuevamente a la plataforma con los cambios realizados.',
								icon: 'question',
								showCancelButton: true,
								confirmButtonText:'Aceptar',
								cancelButtonText:'Cancelar',
								confirmButtonColor: '#67a8e4',
								cancelButtonColor: "#f46a6a",
								confirmButtonClass: 'btn btn-success mt-2',
								cancelButtonClass: 'btn btn-danger ms-2 mt-2',
								confirmButtonClass: 'btn btn-success mt-2'
								
							}).then(function (result) {
								if (result.value) {
											
									
									makeAjaxChangePassword()


								  } else if (result.dismiss === swal.DismissReason.cancel){
									// Read more about handling dismissals



								 }

						});	
				}
			  });		
			}
	
	
	function makeAjaxSendInfo() {
            
				
				//-------------------------------------------------------------
				var data = new FormData(document.getElementById("formEditarDatosClientes"));
				
                   $.ajax({
                    url: 'forms/sendCambiosUsuario.php',
                    type: 'POST',
					processData: false,
					contentType: false,
					data: data,
                    success: function(response) {
						//Variable para validar
						validateJS = JSON.parse(response);
						content1 = "";
						content2 = "";
                        
						switch(validateJS.caso) {
							
							case 1://Validacion de insercion correcta.
								$( "#btnSave" ).attr("disabled", true);
							
								$('#sa-params')
									
									
										Swal.fire(
											{
												title: '¡Información enviada con éxito!',
												text: 'Recibirás un correo electrónico con la confirmación del cambio de datos proporcionados en el sistema una vez que hayan sido realizados.',
												icon: 'success',
												showCancelButton: false,
												confirmButtonColor: '#67a8e4',
												cancelButtonColor: "#f46a6a",
												 confirmButtonClass: 'btn btn-success mt-2',
                								cancelButtonClass: 'btn btn-danger ms-2 mt-2',
											}).then(function (result) {
												if (result.value) {
													
													
													
												  } 
											
										});	
										
								break;
							case 2://Validacion de fallo de insercion.
								content1 = "Información incompleta";
								
								  $('#sa-warning')
											Swal.fire(
												{
												title: content1,
													text:'Es necesario incluir un número de teléfono y correo para solicitar cambios en la información.',
												icon: "error",
												
												cancelButtonColor: "#f46a6a"
												
											 	} 
											)
										
								break;
						
								
						}
            
					}
				   });
			}
	
	function upload_image(id){//Funcion encargada de enviar el archivo via AJAX
				
				var inputFileImage = document.getElementById("fileToUpload");
			
				
				var file = inputFileImage.files[0];
				var data = new FormData();
				data.append('fileToUpload',file);
				
				$.ajax({
					url: "forms/editFotoUsuario.php",       // Url to which the request is send
					type: "POST",             				// Type of request to be send, called as method
					data: data, 			  				// Data sent to server, a set of key/value pairs (i.e. form fields and values)
					contentType: false,       				// The content type used when sending data to the server.
					cache: false,             				// To unable request pages to be cached
					processData:false,       				// To send DOMDocument or non processed data file it is set to false
					success: function(data)   				// A function to be called if request succeeds
					{	
						
						
						var filename = document.getElementById('fileToUpload').files[0].name;
						
						
						upload_db(id,filename);
						
						
						//Variable para validar
						validateJS = JSON.parse(data);
                        
						$('#sa-params')

						mg= (validateJS.mensaje);
						ic = (validateJS.icono);
							Swal.fire(
								{
									title: 'Mensaje:',
									text: mg,
									icon: ic,
									showCancelButton: false,
									confirmButtonColor: '#67a8e4',
									cancelButtonColor: "#f46a6a",
									 confirmButtonClass: 'btn btn-success mt-2',
									cancelButtonClass: 'btn btn-danger ms-2 mt-2',
									}).then(function (result) {
									if (result.value) {
										
										location.reload();

									  } else if (result.dismiss === swal.DismissReason.cancel){


									 }

							});	
							
								
						
						
						
					}
				});
				
			}
		function upload_db(id,filename){//Funcion encargada de enviar el archivo via AJAX
				
				
				 $.ajax({
                    url: 'forms/editFotoUsuarioDB.php',
                    type: 'get',
                    data: {idF:id,file:filename},
                    success: function(response) {
                       
						
                        //$('#datatable_fixed_column').dataTable();  
                    }
                })
							
				
				
			}
	
	
	function makeAjaxChangePassword() {
            
				
				//-------------------------------------------------------------
				var data = new FormData(document.getElementById("formEditarPassClientes"));
				
                   $.ajax({
                    url: 'forms/editPasswordUsuario.php',
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
										text: 'Se va a cerrar la sesión de forma automática para que ingrese con la nueva contraseña.',
										icon: 'success',
										allowOutsideClick: false,
										showCancelButton: false,
										confirmButtonColor: '#67a8e4',
										cancelButtonColor: "#f46a6a",
										 confirmButtonClass: 'btn btn-success mt-2',
										cancelButtonClass: 'btn btn-danger ms-2 mt-2',
									}).then(function (result) {
										if (result.value) {

											window.location.assign("seguridad/logout");

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
												text: 'La contraseña actual no coincide.',
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

function verpassword(){
      var tipo1 = document.getElementById("password");
      var tipo2 = document.getElementById("newpassword");
      var tipo3 = document.getElementById("renewpassword");
      if(tipo1.type == "password")
	  {
          tipo1.type = "text";
          tipo2.type = "text";
          tipo3.type = "text";
      }
	  else
	  {
          tipo1.type = "password";
          tipo2.type = "password";
          tipo3.type = "password";
      }
  }
</script>