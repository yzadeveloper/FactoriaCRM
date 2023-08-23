<?php
    use App\Controllers\PersonaController;
    require __DIR__ . '../../../../vendor/autoload.php';
    $obj = new PersonaController;
    $obj->store($_POST['nombre'], $_POST['apellidos'],$_POST['correo'],$_POST['telefono'], $_POST['direccion'],
     $_POST['codigo_postal'], $_POST['fecha_nacimiento'], $_POST['genero'], $_POST['dni'], $_POST['id_rol'], $_POST['tratamiento_datos'], $_POST['fecha_registro'] );
   
    header("Location: success.php")
?>