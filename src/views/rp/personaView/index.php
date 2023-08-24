<?php
use App\Controllers\PersonaController;
require __DIR__ . '../../../../../vendor/autoload.php';
    
    $obj = new PersonaController;
    $results = $obj->index();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Filtrar Tabla</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../../src/styles/style.css">
</head>
<body>

<a href="http://localhost/FactoriaCRM/">
     <img src="../../../../src/assets/images/2 Logo FF5 VECTORIZADO naranja con negro.png" alt="logo naranja">
</a>
  
<div class="botones">
   <a class="btn custom-btn" href="./requisitos/create.php">Añadir requisito</a>
   <a class="btn custom-btn" href="create.php">Crear Usuario</a>
</div>  
<div class="filter-container">
    <label for="inputPassword" class="col-sm-2 col-form-label">Filtrar por rol:</label>
    <select id="rolFilter" class="form-select">
        <option value="all">Todos</option>
        <option value="1">Candidato</option>
        <option value="2">Códer</option>
        <option value="3">Excóder</option>
        <option value="4">RP</option>
    </select>
</div>
<table class="table custom-table table-bordered table-striped-columns" id="table">
    <thead>
        <tr>
            <th scope="col">ROL</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">APELLIDOS</th>
            <th scope="col">CORREO</th>
            <th scope="col">TELEFONO</th>
            <th scope="col">FECHA REGISTRO</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php if($results): ?>
            <?php foreach($results as $result): ?>
                <tr>
                    <td><?=$result["id_rol"] ?></td>
                    <td><?=$result["nombre"] ?></td>
                    <td><?=$result["apellidos"] ?></td>
                    <td><?=$result["correo"] ?></td>
                    <td><?=$result["telefono"] ?></td>
                    <td><?=$result["fecha_registro"] ?></td>
                    <td>
                        <a href="show.php?id=<?= $result["id"]?>" class="btn custom-btn">Ver</a>
                        <a href="edit.php?id=<?= $result["id"]?>" class="btn custom-btn">Editar</a>
                        <a href="delete.php?id=<?= $result["id"]?>" class="btn custom-btn-danger">Eliminar</a> 
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" class="text-center">No hay registros</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<script type="text/javascript">
                document.addEventListener("DOMContentLoaded", function() {
                var table = document.getElementById("table");
                var headers = table.getElementsByTagName("th");
                var rows = Array.from(table.getElementsByTagName("tr")).slice(1);
                var sortOrder = 1; 

                for (var i = 0; i < headers.length; i++) {
                headers[i].addEventListener("click", sortTable.bind(null, i));
                headers[i].style.cursor = "pointer";
                }

                function sortTable(columnIndex) {
                rows.sort(function(rowA, rowB) {
                    var rowDataA = rowA.getElementsByTagName("td")[columnIndex].innerText;
                    var rowDataB = rowB.getElementsByTagName("td")[columnIndex].innerText;
                    if (rowDataA < rowDataB) {
                    return -1 * sortOrder;
                    } else if (rowDataA > rowDataB) {
                    return 1 * sortOrder;
                    }
                    return 0;
                });

                for (var i = 0; i < rows.length; i++) {
                    table.tBodies[0].appendChild(rows[i]);
                }

                sortOrder *= -1;
                }
            });

            document.addEventListener("DOMContentLoaded", function() {
            var table = document.getElementById("table");
            var rows = Array.from(table.getElementsByTagName("tr")).slice(1);
            var rolFilter = document.getElementById("rolFilter");

            rolFilter.addEventListener("change", function() {
                filterTableByRol();
            });

            function filterTableByRol() {
                var selectedValue = rolFilter.value;
                for (var i = 0; i < rows.length; i++) {
                    var rowRol = rows[i].getElementsByTagName("td")[0].innerText;
                    if (selectedValue === "all" || rowRol === selectedValue) {
                        rows[i].style.display = "";
                    } else {
                        rows[i].style.display = "none";
                    }
                }
            }

            filterTableByRol();
        });

</script>
    
</body>
</html>