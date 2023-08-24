<?php 
use App\Controllers\EscuelaController;

require __DIR__ . '../../../../../../vendor/autoload.php';
    
    $obj = new EscuelaController;
    $obj->update($_POST['id_escuela'],$_POST['nombre_escuela'], $_POST['ciudad'],$_POST['zona'],$_POST['responsable']);
?>