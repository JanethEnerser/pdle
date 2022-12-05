<?php
error_reporting(0);
require_once('seguridad/sesion.php');
require_once('seguridad/data.php');
$activePage = basename($_SERVER['PHP_SELF'], ".php");
$title = "Soporte";



include_once('inc/header.php');


include_once('inc/sidebar.php');


$DataConsulta = SQL_InfoCliente($nocliente);
$datarow = sqlsrv_query($conSQL,$DataConsulta);
$DataSQL=sqlsrv_fetch_array($datarow);
?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Soporte</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
          <li class="breadcrumb-item active">Soporte</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section contact">

		  
	  <?php if($DataSQL['EstatusCliente'] == NULL){
				 echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<H5>No encontramos información asociada a este número de cliente: <strong>'.$nocliente.'</strong> </h5><h6>Favor de comunicarse con soporte. </h6> 
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					  </div>';} ?>
      <div class="row gy-4">

        <div class="col-xl-6">
          <div class="card p-4">
            <form class="php-email-form" id="formSoporte" enctype="multipart/form-data">
              <div class="row gy-4">
				  

                <div class="col-md-12">
                  <input type="text" name="form_sub" id="form_sub" class="form-control" placeholder="Escribe una breve descripción del problema" required>
                </div>

             

                <div class="col-md-12">
                  <textarea class="form-control" name="form_msg" id = "form_msg" rows="6" placeholder="Mensaje" required></textarea>
					<input name="form_nocli" type="hidden" class="form-control" id="form_nocli" value="<?php echo $DataSQL['NumeroCliente']; ?>">
					<input name="form_nouser" type="hidden" class="form-control" id="form_nouser" value="<?php echo $iduser ?>">
                </div>

                <div class="col-md-12">
                
                </div>


              </div>
            </form> 
			 <form enctype="multipart/form-data">
				<div class="fallback">
					<input name="file[]" type="file" id="fileDropzone" multiple />
				</div>
				<div id="actions" class="row">
					<div class="col-lg-7">
						<!-- The fileinput-button span is used to style the file input field as button -->
						<span class="btn btn-primary fileinput-button">
							<i class="bi bi-plus"></i>
							<span>Agregar imagen</span>
						</span>
						<button type="submit" class="btn btn-primary start" style="display: none;">
							<i class="glyphicon glyphicon-upload"></i>
							<span>Start upload</span>
						</button>
						
					</div>

					<div class="col-lg-5" style="display: none;">
						<!-- The global file processing state -->
						<span class="fileupload-process">
							<div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
								<div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
							</div>
						</span>
					</div>
				</div>

				<div class="table table-striped files" id="previews">
					<div id="template" class="file-row row">
						<!-- This is used as the file preview template -->
						<div class="col-xs-12 col-lg-3">
							<span class="preview" style="width:160px;height:160px;">
								<img data-dz-thumbnail />
							</span>
							<br/>
							<button class="btn btn-primary start" style="display:none;">
								<i class="bi bi-upload"></i>
								<span>Empezar</span>
							</button>
							
							<button data-dz-remove class="btn btn-danger ">
								<i class="bi bi-trash"></i> 
								<span>Eliminar</span>
							</button>
						</div>
						<div class="col-xs-12 col-lg-9">
							<p class="name" data-dz-name></p>
							<p class="size" data-dz-size></p>
							<div>
								<strong class="error text-danger" data-dz-errormessage></strong>
							</div>
							<div>
								<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
								  <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="dropzone-here">Puedes arrastrar y soltar aquí las imágenes que desees enviar. Sólo puedes adjuntar hasta 3 imágenes</div>
			</form><br>
			  <div class="col-12">
                  <button class="btn btn-success w-100" id="btn-start" onClick="this.disabled='disabled'" >Enviar</button>
              </div><hr>
          </div>

        </div>
		  

        <div class="col-xl-6">

          <div class="row">
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-geo-alt"></i>
                
                <p>Misión de San Javier, Zona Río L1001902 1063</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-telephone"></i>
               
                <p>664 633 3100</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-envelope"></i>
               
                <p>contacto@enerser.com.mx</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="info-box card">
                <i class="bi bi-clock"></i>
                <p> Horario: de 8 am a 9 pm</p>
              </div>
            </div>
          </div>

        </div>

      </div>

    </section>

  </main><!-- End #main -->

<?php
include_once('inc/footer.php');

?>
<script src="assets/js/main.js"></script>

<script>
	
var previewNode = document.querySelector("#template");
previewNode.id = "";
var previewTemplate = previewNode.parentNode.innerHTML;
previewNode.parentNode.removeChild(previewNode);
 

var myDropzone = new Dropzone(document.body, {
   	url:"forms/uploadImagenSoporte.php",
    paramName: "file",
    acceptedFiles: 'image/*',
    maxFilesize: 2,
    maxFiles: 3,
	parallelUploads:3,
    thumbnailWidth: 160,
    thumbnailHeight: 160,
    thumbnailMethod: 'contain',
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    previewsContainer: "#previews",
    clickable: ".fileinput-button",
	autoProcessQueue: false,
	init: function(){
	   	var submitButton = document.querySelector('#btn-start');
		
	   	myDropzone = this;
	   	submitButton.addEventListener("click", function(){
		myDropzone.processQueue();	
			
			if ( typeof myDropzone.files[0]  != "undefined" ) {
				  var f1 = myDropzone.files[0].name;

				} else {

				  var f1 = "";
				} 
			if ( typeof myDropzone.files[1]  != "undefined" ) {
				  var f2 = myDropzone.files[1].name;

				} else {

				  var f2 = "";
				} 
			if ( typeof myDropzone.files[2]  != "undefined" ) {
				  var f3 = myDropzone.files[2].name;

				} else {

				  var f3 = "";
				} 
				
			send_nameFiles(f1,f2,f3);
		
	   });
		
	   
	   
	  }
});

 myDropzone.on("addedfile", function(file) {
			
	$('.dropzone-here').hide();
	 
	// Hookup the start button
	file.previewElement.querySelector(".start").onclick = function() {
		myDropzone.enqueueFile(file);
	
	}

 });
// Update the total progress bar
myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
});
 
myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1";
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
});
 
// Hide the total progress bar when nothing's uploading anymore
myDropzone.on("queuecomplete", function(progress) {
    //document.querySelector("#total-progress").style.opacity = "0";
});
 
// Setup the buttons for all transfers
// The "add files" button doesn't need to be setup because the config
// `clickable` has already been specified.
document.querySelector("#actions .start").onclick = function() {
   myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
	
	
};
	
function send_nameFiles(f1,f2,f3){
	
	
	var formData= $('#formSoporte').serialize();
	var vars = {f1:f1, f2:f2,f3:f3};
	var varsData = $.param(vars);
	var data = varsData + '&' + formData;
	$.ajax({
		url: 'forms/sendSolicitaSoporte.php',
		type: 'GET',
		data:data,
		success: function(response) {
			
			 Swal.fire(
					{
						title: 'Tu mensaje ha sido enviado',
						text: 'Nuestros administradores revisarán tu caso y se pondrán en contacto contigo.',
						icon: 'success',
						showCancelButton: false,
						confirmButtonText:'Aceptar',
						cancelButtonText:'Cancelar',
						confirmButtonColor: '#67a8e4',
						cancelButtonColor: "#f46a6a",
						confirmButtonClass: 'btn btn-success mt-2',
						cancelButtonClass: 'btn btn-danger ms-2 mt-2',
						confirmButtonClass: 'btn btn-success mt-2'

					}).then(function (result) {
						if (result.value) {
							
							location.reload();


						  } else if (result.dismiss === swal.DismissReason.cancel){
							// Read more about handling dismissals



						 }

				});	
			
			}

		});

	}


 




</script>
