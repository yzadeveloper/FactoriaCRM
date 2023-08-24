<?php
use App\Controllers\RequisitosIngresoController;
require __DIR__ . '../../../../../../vendor/autoload.php';
    $obj = new RequisitosIngresoController;
    $results = $obj->index();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../../../src/styles/style.css">
   
    <title>Candidatos Factoría F5</title>
</head>
<body>

<a href="http://localhost/FactoriaCRM/">  
      <img src="../../../../../src/assets/images/2 Logo FF5 VECTORIZADO naranja con negro.png" alt="logo naranja">
   </a>
<div class="botones">
  <a class="btn custom-btn" href="create.php">Añadir requisito</a>
  <a class="btn custom-btn" href="../index.php">Volver a Candidatos</a>
</div>
<table class="table custom-table table-striped-columns">
    <thead>
        <tr>
            <th colspan="9" class="text-center"><b>LISTA DE REQUISITOS</b></th>
        </tr>   
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
        </tr>
    </thead>
    <tbody>
        <?php if($results): ?>
            <?php foreach($results as $result): ?>
                <tr>
                    <th><?=$result["id_requisitos_ingreso"] ?></th>
                    <th><?=$result["nombre_requisitos"] ?></th>
                    <th>
                        <a href="edit.php?id=<?= $result["id_requisitos_ingreso"]?>" class="btn custom-btn">Editar</a>
                        <a href="delete.php?id=<?= $result["id_requisitos_ingreso"]?>" class="btn custom-btn-danger">Eliminar</a> 
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