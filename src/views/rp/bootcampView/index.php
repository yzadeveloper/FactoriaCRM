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
    <style>
        h1 {
            color: #FF4700;
            
        }

        .custom-btn {
            background-color: #FF4700; 
            border-color: #FF4700; 
            color: white;
            
        }
        .custom-btn:hover {
            background-color: white; 
            border-color: #FF4700;
            color: #FF4700; 
        }

        .custom-btn-danger{
            background-color: white; 
            border-color: #FF4700;
            color: #FF4700;
        }

        .custom-btn-danger:hover{
            background-color: #FF4700; 
            border-color: #FF4700; 
            color: white;
        }
        img{
            display:flex;
            max-width: 20%;
            padding: 10px; 
        }

        .botones{
            padding: 10px;
        }

        
    </style>
    <title>Bootcamps</title>
</head>
<body>
<a href="http://localhost/FactoriaCRM/">
     <img src="../../../../src/assets/images/2 Logo FF5 VECTORIZADO naranja con negro.png" alt="logo naranja">
  </a>
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
                        <a href="show.php?id=<?= $result["id"]?>" class="btn custom-btn">Ver</a>
                        <a href="edit.php?id=<?= $result["id"]?>" class="btn custom-btn">Editar</a>
                        <a href="delete.php?id=<?= $result["id"]?>" class="btn custom-btn-danger">Eliminar</a> 
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