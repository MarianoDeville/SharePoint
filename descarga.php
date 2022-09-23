<?php

    $txtNombre = $_GET['archivo'];
    $filePath = './repositorio/'.$txtNombre;

    if(!empty($txtNombre) && file_exists($filePath)) {
    
        header("Content-Type: application/force-download");
        header("Content-Transfer-Encoding: binary");
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$txtNombre");
        readfile($filePath);
		exit;

    }else{
            
      echo "No se encuentra el archivo.";
    }
?>