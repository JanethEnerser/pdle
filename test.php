<?php
if (($_FILES["file"]["type"] == "image/pjpeg")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/png")
    || ($_FILES["file"]["type"] == "image/gif")) {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/soporte/".$_FILES['file']['name'])) {
      $file[] = $_FILES['file']['name']; 
		
		
		$f1 = $file[0];
		$f2 = $file[1];
		$f3 = $file[2];
		echo $f1;
echo '<br>';
echo $f2;
echo '<br>';
echo $f3;
echo '<br>';
    } else {
        echo 'no';
    }
}
?>
