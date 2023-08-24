<?php
use App\Controllers\RequisitosIngresoController;

require __DIR__ . '../../../../../../vendor/autoload.php';

    $obj = new RequisitosIngresoController;
    $obj->delete($_GET['id']);



?>