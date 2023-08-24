<?php
use App\Controllers\PersonaController;
use App\Controllers\PersonaRequisitosIngresoController;
use App\Controllers\RequisitosIngresoController;
require __DIR__ . '../../../../../vendor/autoload.php';

    $obj = new PersonaController;
    $result = $obj->show($_GET['id']);
    $obj2 = new PersonaRequisitosIngresoController;
    $requisitos = $obj2->show($_GET['id']);
    $obj3 = new RequisitosIngresoController;
    $results = $obj3->index();

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
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Rol</label>
    <div class="col-sm-10">
      <select class="form-select" aria-label="Default select example" name="id_rol">
                      <option selected value="1">Candidato</option>
                      <option value="2">Coder</option>

      </select>
    </div>
  </div>
  <input type="submit" value="Actualizar" class="btn btn-success">
  <a href="show.php?id=<?= $result["id"]?>" class="btn btn-danger">Volver</a>
</form>

  <h2>Requisitos de acceso</h2>
  <form action="./personarequisito/store.php" method="post" autocomplete="off">
      <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Requisito</label>
        <div class="col-sm-10">
          <select class="form-select" aria-label="Default select example" name="id_requisitos_ingreso">
            <?php if($results): ?>
            <?php foreach($results as $resultado): ?>
            <option selected value="<?=$resultado["id_requisitos_ingreso"]?>"><?=$resultado["nombre_requisitos"] ?></option>
            <?php endforeach; ?>
            <?php else: ?>
            <?php endif; ?>
          </select>
          <input type="text" name="id_persona" value="<?=$result["id"]?>" class="form-control" id="inputPassword" hidden>
          <br>
          <input type="submit" value="Añadir requisito" class="btn btn-success">
        </div>
      </div>
    </form>
  <table class="table container-fluid">
        <thead>        
            <tr>
                <th>REQUISITO</th>
                <th>FECHA REGISTRO</th>
            </tr>
        </thead>
        <tbody>
            <?php if($requisitos): ?>
            <?php foreach($requisitos as $requisito): ?>
            <tr>
                <th><?=$requisito["nombre_requisitos"] ?></th>
                <th><?=$requisito["fecha_registro_requisito"] ?></th>
                <th><a href="./personarequisito/delete.php?id_persona=<?= $result["id"]?>" class="btn btn-danger">Eliminar</a></th>
            </tr>
        <?php endforeach; ?>
        <?php else: ?>
            <tr>
            <td colspan="3" class="text-center">No hay requisitos registrados</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    <a href="show.php?id=<?= $result["id"]?>" class="btn btn-danger">Volver</a>
  
</body>
</html>

