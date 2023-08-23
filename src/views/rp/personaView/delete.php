<?php

use App\Controllers\PersonaController;
require __DIR__ . '../../../../vendor/autoload.php';

    $obj = new PersonaController;
    $obj->delete($_GET['id']);
    header("Location: show.php")


?>