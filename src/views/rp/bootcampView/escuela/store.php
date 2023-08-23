<?php
    use App\Controllers\EscuelaController;
    require __DIR__ . '../../../../../../vendor/autoload.php';
    $obj = new EscuelaController;
    $obj->store($_POST['nombre'], $_POST['ciudad'],$_POST['zona'],$_POST['responsable']);

?>