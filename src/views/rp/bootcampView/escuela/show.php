<?php

use App\Controllers\EscuelaController;

require __DIR__ . '../../../../../vendor/autoload.php';
    $obj1 = new EscuelaController;
    $result = $obj1->show($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <div class="pb-3">
        <a href="index.php" class="btn btn-primary">Volver a Escuela</a>
    </div>
    <h2 class="text-center">DETALLES DE ESCUELA <?= $result["nombre_escuela"].' '.$result["zona"]?></h2>
    <table class="table container-fluid">
        <thead>
        <div class="pb-3">
                
                <a href="edit.php?id=<?= $result["id"]?>" class="btn btn-success">Editar</a>
                <a href="delete.php?id=<?= $result["id"]?>" class="btn btn-danger">Eliminar</a>
                </div>
        </thead>
        <tbody>
  
            <tr>
                <th scope="col">Id</th>
                <td scope="col"><?= $result["id"] ?></td>
            </tr>
            <tr>
                <th scope="col">Nombre</th>
                <td scope="col"><?= $result["nombre_escuela"] ?></td>
            </tr>
            <tr>
                <th scope="col">Ciudad</th>
                <td scope="col"><?= $result["ciudad"] ?></td>
            </tr>
            <tr>
                <th scope="col">Zona</th>
                <td scope="col"><?= $result["zona"] ?></td>
            </tr>
            <tr>
                <th scope="col">Responsable</th>
            <td scope="col"><?= $result["responsable"] ?></td>
                </tr>
           <td scope="col">
         
        </tbody>
    </table>

    <h3 class="text-center">REQUISITOS DE ACCESO</h3>
    <table class="table container-fluid">
        <thead>        
        <div class="pb-3">
                
                <a href="edit.php?id=<?= $result["id"]?>" class="btn btn-success">Editar</a>
                <a href="delete.php?id=<?= $result["id"]?>" class="btn btn-danger">Eliminar</a>
                </div>
            <tr>
                <th>REQUISITO</th>
                <th>ESTADO</th>
                <th>FECHA</th>  
            </tr>
        </thead>
    </table>
</body>
</html>