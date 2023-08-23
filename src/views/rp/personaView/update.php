<?php 
use App\Controllers\PersonaController;
use App\Controllers\PersonaRequisitosIngresoController;
require __DIR__ . '../../../../../vendor/autoload.php';
    
    $obj = new PersonaController;
    $obj->update($_POST['id'],$_POST['nombre'], $_POST['apellidos'],$_POST['correo'],$_POST['telefono'], $_POST['direccion'],
    $_POST['codigo_postal'], $_POST['fecha_nacimiento'],$_POST['genero'], $_POST['dni'], $_POST['id_rol'] );
    $obj2 = new PersonaRequisitosIngresoController;
    $obj2->update($_POST['id'], $_POST['id_requisitos_ingreso'],$_POST['fecha']);
?>