<?php

use App\Controllers\PersonaController;
use App\Controllers\PersonaRequisitosIngresoController;
require __DIR__ . '../../../../../vendor/autoload.php';
    $obj1 = new PersonaController;
    $result = $obj1->show($_GET['id']);
    $obj2 = new PersonaRequisitosIngresoController;
    $requisitos = $obj2->show($_GET['id']);
    //var_dump($requisitos);
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
        <a href="index.php" class="btn btn-primary">Volver a candidatos</a>
    </div>
    <h2 class="text-center">DETALLES DE CANDIDATO <?= $result["nombre"].' '.$result["apellidos"]?></h2>
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
                <td scope="col"><?= $result["nombre"] ?></td>
            </tr>
            <tr>
                <th scope="col">Apellidos</th>
                <td scope="col"><?= $result["apellidos"] ?></td>
            </tr>
            <tr>
                <th scope="col">Correo</th>
                <td scope="col"><?= $result["correo"] ?></td>
            </tr>
            <tr>
                <th scope="col">Teléfono</th>
            <td scope="col"><?= $result["telefono"] ?></td>
                </tr>
            <tr>
                <th scope="col">Dirección</th>
                <td scope="col"><?= $result["direccion"] ?></td>
            </tr>
            <tr>
                <th scope="col">Código Postal</th>
                <td scope="col"><?= $result["codigo_postal"] ?></td>
            </tr>
            <tr>
                <th scope="col">Fecha de nacimiento</th>
                <td scope="col"><?= $result["fecha_nacimiento"] ?></td>
            </tr>
            <tr>
                <th scope="col">Género</th>
                <td scope="col"><?= $result["genero"] ?></td>
            </tr>
            <tr>
                <th scope="col">DNI/NIE/Pasaporte</th>
                <td scope="col"><?= $result["dni"] ?></td>
            </tr>
            <tr>
                <th scope="col">Estado</th>
                <td scope="col">
                <?php /*if($result["id_rol"] === 1){
                    echo "Candidato";
                }else{echo "Coder";
                }*/?>
                    
        </tbody>
    </table>

    <h3 class="text-center">REQUISITOS DE ACCESO</h3>
    <div class="pb-3">
        <a href="edit.php?id=<?= $result["id"]?>" class="btn btn-success">Añadir</a>
    </div>
    <table class="table container-fluid">
        <thead>        
            <tr>
                <th>REQUISITO</th>
                <th>FECHA REGISTRO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php if($requisitos): ?>
            <?php foreach($requisitos as $requisito): ?>
            <tr>
                <th><?=$requisito["nombre_requisitos"] ?></th>
                <th><?=$requisito["fecha_registro"] ?></th>
                <th>
                <div class="pb-3">
                    <a href="delete.php?id=<?= $result["id"]?>" class="btn btn-danger">Eliminar</a>
                </div>
                </th>
            </tr>
        <?php endforeach; ?>
        <?php else: ?>
            <tr>
            <td colspan="3" class="text-center">No hay requisitos registrados</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</body>
</html>