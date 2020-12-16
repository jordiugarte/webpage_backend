<?php 
header('Content-Type: text/html; charset=UTF-8');
if (isset($_POST['submit'])){
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name']
    $fileTmpName = $_FILES['file']['tmp_name']
    $fileSize = $_FILES['file']['size']
    $fileError = $_FILES['file']['error']
    $fileType = $_FILES['file']['type']

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0){
          $fileNameNew = uniqid('', true).".".$fileActualExt; 
          $fileDestination = 'webpage_backend/storage/images/posts/'.$fileNameNew
          move_uploaded_file($fileTmpName, $fileDestination);
          echo "Imagen subida con exito"
        }else{
            echo "ocurrio un error"
        }
    }else {
        echo "Formato no permitido"
    }
}
?>