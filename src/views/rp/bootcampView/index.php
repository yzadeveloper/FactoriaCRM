<?php
use App\Controllers\BootcampController;

require __DIR__ . '../../../../../vendor/autoload.php';
    
    $obj = new BootcampController;
    $results = $obj->index();
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Bootcamps</title>
</head>
<body>
<img src="../../../../src/assets/images/2 Logo FF5 VECTORIZADO naranja con negro.png" alt="logo naranja">


<a class="btn custom-btn" href="create.php">Crear Bootcamp</a>
<a class="btn custom-btn" href="./escuela/index.php">Escuelas</a>

<table class="table table-light table-striped-columns">
    <thead>
        <tr>
            <th colspan="9" class="text-center"><b>LISTA DE BOOTCAMPS</b></th>
        </tr>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">PROMOCIÓN</th>
            <th scope="col">GÉNERO</th>
            <th scope="col">PATROCINADOR</th>
            <th scope="col">ID ESCUELA</th>
        </tr>
    </thead>
    <tbody>
        <?php if($results): ?>
            <?php foreach($results as $result): ?>
                <tr>
                <th><?=$result["id"] ?></th>
                    <th><?=$result["nombre_bootcamp"] ?></th>
                    <th><?=$result["promocion"] ?></th>
                    <th><?=$result["genero"] ?></th>
                    <th><?=$result["patrocinador"] ?></th>
                    <th><?=$result["nombre_escuela"] ?></th>
                    <th>
                        <a href="show.php?id=<?= $result["id"]?>" class="btn btn-primary">Ver</a>
                        <a href="edit.php?id=<?= $result["id"]?>" class="btn btn-success">Editar</a>
                        <a href="delete.php?id=<?= $result["id"]?>" class="btn btn-danger">Eliminar</a> 
                    </th>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="9" class="text-center">No hay registros</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
    
</body>
</html>