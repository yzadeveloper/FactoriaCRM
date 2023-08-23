<?php
    use App\Controllers\BootcampController;
    require __DIR__ . '../../../../../vendor/autoload.php';
    $obj = new BootcampController;
    $obj->store($_POST['nombre_bootcamp'], $_POST['promocion'],$_POST['genero'],$_POST['patrocinador'],$_POST['id_escuela']);

?>