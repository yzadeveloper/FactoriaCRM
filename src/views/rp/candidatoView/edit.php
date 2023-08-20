<?php
use App\Controllers\PersonaController;
use App\Controllers\RequisitosIngresoController;
require __DIR__ . '../../../../../vendor/autoload.php';

    $obj = new PersonaController;
    $result = $obj->show($_GET['id']);
    $obj2 = new RequisitosIngresoController;
    $requisitos = $obj2->index();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Editar candidato</title>
</head>
<body>

<form action="update.php" method="post" autocomplete="off">
    <h2>Editar candidato <?= $result["id"]?></h2>
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
    <label for="inputPassword" class="col-sm-2 col-form-label">Apellidos</label>
    <div class="col-sm-10">
      <input type="text" name="apellidos" class="form-control" id="inputPassword" value="<?= $result["apellidos"]?>">
    </div>
  </div>
  <div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Correo</label>
    <div class="col-sm-10">
      <input type="email" name="correo"  class="form-control" id="inputPassword" value="<?= $result["correo"]?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Teléfono</label>
    <div class="col-sm-10">
      <input type="text" name="telefono" class="form-control" id="inputPassword" value="<?= $result["telefono"]?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Dirección</label>
    <div class="col-sm-10">
      <input type="text" name="direccion" class="form-control" id="inputPassword" value="<?= $result["direccion"]?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Código Postal</label>
    <div class="col-sm-10">
      <input type="number" name="codigo_postal" class="form-control" id="inputPassword" value="<?= $result["codigo_postal"]?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Fecha de nacimiento</label>
    <div class="col-sm-10">
      <input type="date" name="fecha_nacimiento" class="form-control" id="inputPassword" value="<?= $result["fecha_nacimiento"]?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Género</label>
    <div class="col-sm-10">
      <select class="form-select" aria-label="Default select example" name="genero">
                      <option selected><?= $result["genero"]?></option>
                      <option value="hombre">Hombre</option>
                      <option value="mujer">Mujer</option>
                      <option value="otro">Otro</option>
      </select>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">DNI/NIE/Pasaporte</label>
    <div class="col-sm-10">
      <input type="text" name="dni" class="form-control" id="inputPassword" value="<?= $result["dni"]?>">
    </div>
  </div>
  <input type="submit" value="Actualizar" class="btn btn-success">
  <a href="show.php?id=<?= $result["id"]?>" class="btn btn-danger">Volver</a>
</form>
  <h2>Requisitos de acceso</h2>
  <form action="update.php" method="post" autocomplete="off">
        <?php if($requisitos): ?>
            <?php foreach($requisitos as $requisito): ?>
              <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label"><?=$requisito["nombre"] ?></label>
                <div class="col-sm-10 form-check form-switch">
                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                  <input type="datetime" name="fecha" class="form-control" id="inputPassword" hidden>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
        <?php else: ?>
        <?php endif; ?>

    <input type="submit" value="Actualizar" class="btn btn-success">
    <a href="show.php?id=<?= $result["id"]?>" class="btn btn-danger">Volver</a>
</form>
    
</body>
</html>

