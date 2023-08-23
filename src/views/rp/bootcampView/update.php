<?php 
use App\Controllers\BootcampController;
require __DIR__ . '../../../../../vendor/autoload.php';
    
    $obj = new BootcampController;
    $obj->update($_POST['id'],$_POST['nombre'], $_POST['promocion'],$_POST['genero'],$_POST['patrocinador'], $_POST['id_escuela']);
?>