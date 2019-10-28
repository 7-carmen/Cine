<?php

$target_dir = "IMG_PHP/";
$target_file = $target_dir . basename($_FILES["fichero_usuario"]["name"]);

//var_dump($_FILES);

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fichero_usuario"]["tmp_name"]);
    if($check !== false) {
        move_uploaded_file($_FILES["fichero_usuario"]["tmp_name"], $target_file);
        echo "Imagen subida con éxito.";
    }else{
        echo "Se ha producido un error en la subida.";
    }
}
?>