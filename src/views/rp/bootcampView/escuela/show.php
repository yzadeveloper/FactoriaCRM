<?php

use App\Controllers\EscuelaController;

require __DIR__ . '../../../../../../vendor/autoload.php';
    $obj1 = new EscuelaController;
    $result = $obj1->show($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../../../src/styles/style.css">

    <title></title>
</head>
<body>
<a href="http://localhost/FactoriaCRM/">
<img src="../../../../../src/assets/images/2 Logo FF5 VECTORIZADO naranja con negro.png" alt="logo naranja">
    </a>

    <div class="pb-3">
        <div class="botones">
          <a href="index.php" class="btn custom-btn">Volver a Escuela</a>
        </div>
    </div>
    <h2 class="text-center">DETALLES DE ESCUELA <?= $result["nombre_escuela"]?></h2>
    <table class="table container-fluid">
        <thead>
        <div class="pb-3">
                
                <a href="edit.php?id=<?= $result["id_escuela"]?>" class="btn custom-btn">Editar</a>
                <a href="delete.php?id=<?= $result["id_escuela"]?>" class="btn custom-btn-danger">Eliminar</a>
        </div>
        </thead>
        <tbody>
  
            <tr>
                <th scope="col">Id</th>
                <td scope="col"><?= $result["id_escuela"] ?></td>
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
         
        </tbody>
    </table>

</body>
</html>