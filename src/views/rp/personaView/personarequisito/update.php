<?php
use App\Controllers\PersonaRequisitosIngresoController;
require __DIR__ . '../../../../../../vendor/autoload.php';
    $obj2 = new PersonaRequisitosIngresoController;
    $obj2->update($_POST['id_persona'], $_POST['id_requisitos_ingreso'],$_POST['fecha']);
?>
