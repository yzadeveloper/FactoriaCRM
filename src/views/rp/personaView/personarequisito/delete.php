<?php

use App\Controllers\PersonaRequisitosIngresoController;


require __DIR__ . '../../../../../../vendor/autoload.php';

    $obj = new PersonaRequisitosIngresoController;
    $obj->delete($_GET['id']);
    header("Location: ./../show.php?id=$id")

?>