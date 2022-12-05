<?php
require_once('../seguridad/sesion.php');
require_once('../seguridad/data.php');

error_reporting(0);

$idusuariofoto = $_POST['id'];

echo $idusuariofoto;

$fecha	= date("Y-m-d H:i:s");

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES["fileToUpload"]["type"])){
$target_dir = "../uploads/usuarios/fotos/";
$carpeta=$target_dir;
if (!file_exists($carpeta)) {
	
    mkdir($carpeta, 0777, true);
}
 
$target_file = $carpeta . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$name= $_FILES['fileToUpload']['name'];
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check file size
if ($_FILES["fileToUpload"]["size"] > 2097152) {
    $errors[]= "Lo sentimos, el archivo es demasiado grande.  Tamaño máximo admitido: 2 MB";
    $uploadOk = 0;
	$iconos[]="warning";
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $errors[]= "Lo sentimos, sólo archivos JPG, JPEG, PNG & GIF  son permitidos.";
    $uploadOk = 0;
	$iconos[]="error";
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $errors[]= "Lo sentimos, tu archivo no fue subido.";
	$iconos[]="error";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
       	$messages[]= "El Archivo se ha cargado correctamente. Los cambios se efecturán en el próximo inicio de sesión.";
		$iconos[]="success";
	   
	   
    } else {
       	$errors[]= "Lo sentimos, hubo un error subiendo el archivo.";
		$iconos[]="error";
    }
}
 
if (isset($errors)){
	?>
	
	  <?php
	  foreach ($errors as $error ){
		  
		  $msg = $error;
		  
	  }
	  foreach ($iconos as $icono ){
		  
		  $icon= $icono;
		  
	  }
	  ?>
	
	<?php
}
 
if (isset($messages)){
	?>
	
	  <?php
	  foreach ($messages as $message){
		  $msg = $message;
	  }
	  foreach ($iconos as $icono ){
		  $icon = $icono;
	  }
	  ?>
	
	<?php
}

$json_obj = array("mensaje" => $msg, "icono" => $icon);
echo json_encode($json_obj, JSON_PRETTY_PRINT);
	

}



?>