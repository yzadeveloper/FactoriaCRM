<?php

use App\Controllers\EscuelaController;

    require __DIR__ . '../../../../../../vendor/autoload.php';
    $obj = new EscuelaController;
    $result = $obj->show($_GET['id']);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Editar Escuela</title>
</head>
<body>

<form action="update.php" method="post" autocomplete="off">
    <h2>Editar Escuela <?= $result["id_escuela"]?></h2>
  <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Id</label>
    <div class="col-sm-10">
      <input type="text" name="id" readonly class="form-control-plaintext" id="staticEmail" value="<?= $result["id_escuela"]?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Nombre</label>
    <div class="col-sm-10">
      <input type="text" name="nombre_escuela" class="form-control" id="inputPassword" value="<?= $result["nombre_escuela"]?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Ciudad</label>
    <div class="col-sm-10">
      <input type="text" name="ciudad" class="form-control" id="inputPassword" value="<?= $result["ciudad"]?>">
    </div>
  </div>
  <div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Zona</label>
    <div class="col-sm-10">
      <input type="text" name="zona"  class="form-control" id="inputPassword" value="<?= $result["zona"]?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Responsable</label>
    <div class="col-sm-10">
      <input type="text" name="responsable" class="form-control" id="inputPassword" value="<?= $result["responsable"]?>">
    </div>
  </div>
    <input type="submit" value="Actualizar" class="btn btn-success">
    <a href="show.php?id=<?= $result["id_escuela"]?>" class="btn btn-danger">Cancelar</a>
    </div>
  </div>
</form>
    
</body>
</html>

