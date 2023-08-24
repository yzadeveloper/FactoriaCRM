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
    <link rel="stylesheet" href="../../../../../src/styles/style.css">
    <title>Editar candidato</title>
</head>
<body>

<a href="http://localhost/FactoriaCRM/">  
      <img src="../../../../../src/assets/images/2 Logo FF5 VECTORIZADO naranja con negro.png" alt="logo naranja">
   </a>

<form action="update.php" method="post" autocomplete="off">
    <h2>Editar requisito <?= $result["id_requisitos_ingreso"]?></h2>
  <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Id</label>
    <div class="col-sm-10">
      <input type="text" name="id_requisitos_ingreso" readonly class="form-control-plaintext" id="staticEmail" value="<?= $result["id_requisitos_ingreso"]?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Nombre</label>
    <div class="col-sm-10">
      <input type="text" name="nombre_requisitos" class="form-control" id="inputPassword" value="<?= $result["nombre_requisitos"]?>">
    </div>
  </div>

  <div>
    <input type="submit" value="Actualizar" class="btn custom-btn">
    <a href="index.php" class="btn custom-btn-danger">Cancelar</a>
    </div>
  </div>
</form>
    
</body>
</html>

