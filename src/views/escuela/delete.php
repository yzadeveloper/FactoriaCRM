<?php

use App\Controllers\EscuelaController;

require __DIR__ . '../../../../vendor/autoload.php';

    $obj = new EscuelaController;
    $obj->delete($_GET['id']);
    header("Location: show.php")
?>