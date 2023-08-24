<?php
use App\Controllers\EscuelaController;
require __DIR__ . '../../../../../vendor/autoload.php';
$obj= new EscuelaController;
$results= $obj -> index()
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

        .bg-primary-subtle {
            display:flex;
            flex-direction: column;
            border: 5px solid #FF4700;
            margin: 50px auto;
            max-width: 600px;
            padding: 50px; 
        }

        :root {
            --bs-primary-bg-subtle: white; 
        }
    </style>
    <title>Document</title>
</head>
<body>
<a href="http://localhost/FactoriaCRM/">
     <img src="../../../../src/assets/images/2 Logo FF5 VECTORIZADO naranja con negro.png" alt="logo naranja">
  </a>
    <div class="container-fluid bg-primary-subtle" >
        <h1>Crear Bootcamp</h1>
        <form action="./store.php" method="POST" autocomplete="off">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" name="nombre_bootcamp" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                <label for="exampleInputEmail1" class="form-label">Promoción</label>
                <input type="text" name="promocion" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                <label for="exampleInputEmail1" class="form-label">Género</label>
                <input type="text" name="genero" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                <label for="exampleInputEmail1" class="form-label">Patrocinador</label>
                <input type="text" name="patrocinador" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                    <label for="inputPassword" class="col-sm-2 col-form-label">Escuela</label>
                    <select class="form-select" aria-label="Default select example" name="id_escuela">
                    <?php if($results): ?>
                    <?php foreach($results as $resultado):?>  
                    <option selected value="<?=$resultado["id_escuela"]?>"><?=$resultado["nombre_escuela"] ?></option>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <?php endif; ?>
                    </select>
                  
        
                <br><br>
            <button type="submit" class="btn custom-btn">Guardar</button>
            <a class="btn custom-btn-danger" href="index.php">Cancelar</a>
            <br><br>
        </form>
    </div>


</body>
</html>