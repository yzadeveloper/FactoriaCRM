<?php 
use App\Controllers\RequisitosIngresoController;
require __DIR__ . '../../../../../../vendor/autoload.php';
    $obj = new RequisitosIngresoController;
    $obj->update($_POST['id_requisitos_ingreso'],$_POST['nombre_requisitos']);
    
?>