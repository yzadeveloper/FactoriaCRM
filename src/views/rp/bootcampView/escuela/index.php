<?php

use App\Controllers\EscuelaController;

require __DIR__ . '../../../../../../vendor/autoload.php';
    
    $obj = new EscuelaController;
    $results = $obj->index();
    
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../../../src/styles/style.css">
    <title>Escuela</title>
</head>
<body>
<a href="http://localhost/FactoriaCRM/">
<img src="../../../../../src/assets/images/2 Logo FF5 VECTORIZADO naranja con negro.png" alt="logo naranja">
    </a>
    <div class="botones">
      <a class="btn custom-btn" href="create.php">Crear Escuela</a>
    </div>

<table class="table custom-table table-bordered table-striped-columns">
    <thead>
        <tr>
            <th colspan="9" class="text-center"><b>LISTA DE ESCUELAS</b></th>
        </tr>
        <tr>
            <th scope="col">NOMBRE</th>
            <th scope="col">CIUDAD</th>
            <th scope="col">ZONA</th>
            <th scope="col">RESPONSABLE</th>
        </tr>
    </thead>
    <tbody>
        <?php if($results): ?>
            <?php foreach($results as $result): ?>
                <tr>
                    <th><?=$result["nombre_escuela"] ?></th>
                    <th><?=$result["ciudad"] ?></th>
                    <th><?=$result["zona"] ?></th>
                    <th><?=$result["responsable"] ?></th>
                    <th>
                        <a href="show.php?id=<?= $result["id_escuela"]?>" class="btn custom-btn">Ver</a>
                        <a href="edit.php?id=<?= $result["id_escuela"]?>" class="btn custom-btn">Editar</a>
                        <a href="delete.php?id=<?= $result["id_escuela"]?>" class="btn custom-btn-danger">Eliminar</a> 
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