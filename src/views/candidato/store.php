<?php
    use App\Controllers\PersonaController;
    require __DIR__ . '../../../../vendor/autoload.php';
    //require_once __DIR__ . ("/../../controller/TaskController.php");
    $obj = new PersonaController;
    $obj->store($_POST['nombre'], $_POST['apellidos'],$_POST['correo'],$_POST['telefono'], $_POST['direccion'],
     $_POST['codigo_postal'], $_POST['fecha_nacimiento'], $_POST['genero'], $_POST['dni']);
    //echo ($_POST['title'], $_POST['description'], $_POST['date_create']);


?>