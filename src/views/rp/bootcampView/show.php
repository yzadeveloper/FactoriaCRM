<?php

use App\Controllers\BootcampController;


require __DIR__ . '../../../../../vendor/autoload.php';
    $obj1 = new BootcampController;
    $result = $obj1->show($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Bootcamp</title>
</head>
<body>
     

    <div class="pb-3">
        <a class="btn btn-primary" href="create.php">Crear Bootcamp</a>  
        <a href="index.php" class="btn btn-primary">Volver a Bootcamp</a>
        
    </div>
    <h2 class="text-center"> BOOTCAMP <?= $result["nombre_bootcamp"]?></h2>
    <table class="table container-fluid">
        <thead>
        <div class="pb-3">
                
                <a href="edit.php?id=<?= $result["id"]?>" class="btn btn-success">Editar</a>
                <a href="delete.php?id=<?= $result["id"]?>" class="btn btn-danger">Eliminar</a>
                </div>
        </thead>
        <tbody>
  
            <tr>
                <th scope="col">Id Escuela</th>
                <td scope="col"><?= $result["nombre_escuela"] ?></td>
            </tr>
            <tr>
                <th scope="col">Promoción</th>
                <td scope="col"><?= $result["promocion"] ?></td>
            </tr>
            <tr>
                <th scope="col">Género</th>
                <td scope="col"><?= $result["genero"] ?></td>
            </tr>
            <tr>
                <th scope="col">Patrocinador</th>
                <td scope="col"><?= $result["patrocinador"] ?></td>
            </tr>
            
        </tbody>
    </table>
</body>
</html>