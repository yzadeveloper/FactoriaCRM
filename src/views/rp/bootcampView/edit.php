<?php
    use App\Controllers\BootcampController;
    require __DIR__ . '../../../../../vendor/autoload.php';
    $obj = new BootcampController;
    $result = $obj->show($_GET['id']);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Editar Bootcamp</title>
</head>
<body>

<form action="update.php" method="post" autocomplete="off">
    <h2>Editar Bootcamp <?= $result["id"]?></h2>
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
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Promoción</label>
    <div class="col-sm-10">
      <input type="text" name="promocion" class="form-control" id="inputPassword" value="<?= $result["promocion"]?>">
    </div>
  </div>
  <div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Género</label>
    <div class="col-sm-10">
      <input type="text" name="genero"  class="form-control" id="inputPassword" value="<?= $result["genero"]?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Patrocinador</label>
    <div class="col-sm-10">
      <input type="text" name="patrocinador" class="form-control" id="inputPassword" value="<?= $result["patrocinador"]?>">
    </div>
  </div>
    <input type="submit" value="Actualizar" class="btn btn-success">
    <a href="show.php?id=<?= $result["id"]?>" class="btn btn-danger">Cancelar</a>
    </div>
  </div>
</form>
    
</body>
</html>
