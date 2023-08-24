<?php

use App\Controllers\PersonaController;
use App\Controllers\PersonaRequisitosIngresoController;

require __DIR__ . '../../../../../vendor/autoload.php';

    $obj = new PersonaController;
    $obj->delete($_GET['id']);
    header("Location: index.php");
    $obj = new PersonaRequisitosIngresoController;
    $obj->delete($_GET['id']);
    header("Location: show.php?id=$id")


?>