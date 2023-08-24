<?php
use App\Controllers\RequisitosIngresoController;
require __DIR__ . '../../../../../../vendor/autoload.php';
    $obj = new RequisitosIngresoController;
    $result = $obj->show($_GET['id']);


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

        .custom-btn.custom-btn {
            background-color: #FF4700; 
            border-color: #FF4700; 
            color: white;
            
        }
        .custom-btn:hover {
            background-color: white; 
            border-color: #FF4700;
            color: #FF4700; 
        }

        .custom-btn.custom-btn-danger{
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
    
    </style>
    <title>Editar candidato</title>
</head>
<body>

<a href="http://localhost/FactoriaCRM/">  
      <img src="../../../../../src/assets/images/2 Logo FF5 VECTORIZADO naranja con negro.png" alt="logo naranja">
   </a>

<form action="update.php" method="post" autocomplete="off">
    <h2>Editar requisito <?= $result["id"]?></h2>
  <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Id</label>
    <div class="col-sm-10">
      <input type="text" name="id" readonly class="form-control-plaintext" id="staticEmail" value="<?= $result["id"]?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Nombre</label>
    <div class="col-sm-10">
      <input type="text" name="nombre" class="form-control" id="inputPassword" value="<?= $result["nombre"]?>">
    </div>
  </div>

  <div>
    <input type="submit" value="Actualizar" class="btn custom-btn">
    <a href="show.php?id=<?= $result["id"]?>" class="btn custom-btn-danger">Cancelar</a>
    </div>
  </div>
</form>
    
</body>
</html>

