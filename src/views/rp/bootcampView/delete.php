<?php

use App\Controllers\BootcampController;
require __DIR__ . '../../../../vendor/autoload.php';

    $obj = new BootcampController;
    $obj->delete($_GET['id']);
    header("Location: show.php")

?>