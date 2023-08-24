<?php
    use App\Controllers\PersonaRequisitosIngresoController;
    require __DIR__ . '../../../../../../vendor/autoload.php';

    $obj= new PersonaRequisitosIngresoController;
    $obj->store($_POST['id_persona'], $_POST['id_requisitos_ingreso']);
    

?>