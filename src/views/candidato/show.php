<?php
use App\Controllers\PersonaController;

require __DIR__ . '../../../../vendor/autoload.php';
    
    $obj = new PersonaController;
    $results = $obj->index();
    
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Candidatos Factoría F5</title>
</head>
<body>
<table class="table table-light table-striped-columns">
    <thead>
        <tr>
            <th colspan="9" class="text-center"><b>LISTA DE CANDIDATOS</b></th>
        </tr>
        <tr>
            <th scope="col">NOMBRE</th>
            <th scope="col">APELLIDOS</th>
            <th scope="col">CORREO</th>
            <th scope="col">TELEFONO</th>
            <th scope="col">DIRECCIÓN</th>
            <th scope="col">CÓDIGO POSTAL</th>
            <th scope="col">FECHA DE NACMIENTO</th>
            <th scope="col">GÉNERO</th>
            <th scope="col">DNI/NIE/PASAPORTE</th>
        </tr>
    </thead>
    <tbody>
        <?php if($results): ?>
            <?php foreach($results as $result): ?>
                <tr>
                    <th><?=$result["nombre"] ?></th>
                    <th><?=$result["apellidos"] ?></th>
                    <th><?=$result["correo"] ?></th>
                    <th><?=$result["telefono"] ?></th>
                    <th><?=$result["direccion"] ?></th>
                    <th><?=$result["codigo_postal"] ?></th>
                    <th><?=$result["fecha_nacimiento"] ?></th>
                    <th><?=$result["genero"] ?></th>
                    <th><?=$result["dni"] ?></th>
                    <th>
                        <a href="show.php?id=<?= $result["id"]?>" class="btn btn-primary">Ver</a>
                        <a href="edit.php?id=<?= $result["id"]?>" class="btn btn-success">Editar</a>
                        <!-- Button trigger modal -->
                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">¿Desea eliminar el candidato?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Una vez eliminado no se podrá recuperar los datos del candidato
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button>
                                        <a href="delete.php?id=<?= $result["id"]?>" class="btn btn-danger">Eliminar</a>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </th>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">No hay registros</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
    
</body>
</html>