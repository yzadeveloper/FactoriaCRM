<?php

use App\Controllers\PersonaController;
use App\Controllers\PersonaRequisitosIngresoController;
require __DIR__ . '../../../../../../vendor/autoload.php';

    $obj = new PersonaRequisitosIngresoController;
    $obj->delete($_GET['id_persona_requisito'],$_GET['id_persona']);
    $obj2 = new PersonaController;
    $result = $obj2->show($_GET['id_persona']);
    


?>