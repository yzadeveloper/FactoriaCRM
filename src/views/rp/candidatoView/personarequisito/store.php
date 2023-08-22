<?php
    use App\Controllers\PersonaRequisitosIngresoController;
    require __DIR__ . '../../../../../../vendor/autoload.php';
    /*$obj = new PersonaController;
    $obj->store($_POST['nombre'], $_POST['apellidos'],$_POST['correo'],$_POST['telefono'], $_POST['direccion'],
     $_POST['codigo_postal'], $_POST['fecha_nacimiento'], $_POST['genero'], $_POST['dni'], $_POST['id_rol'], $_POST['tratamiento_datos'] );

     header("Location: index.php")
    */
    $obj= new PersonaRequisitosIngresoController;
    $obj->store($_POST['id_persona'], $_POST['id_requisitos_ingreso']);
    

?>