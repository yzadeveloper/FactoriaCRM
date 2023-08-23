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
    <title>Candidatos Factoría F5</title>
</head>
<body>
<a class="btn btn-primary" href="./requisitos/create.php">Añadir requisito</a>
<a class="btn btn-primary" href="create.php">Crear Candidato</a>
<table class="table table-light table-striped-columns" id="table">
    <thead>
        <!-- <tr>
            <th colspan="9" class="text-center"><b>LISTA DE CANDIDATOS</b></th>
        </tr> -->
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
                        <a href="show.php?id=<?= $result["id"]?>" class="btn btn-primary">Ver</a>
                        <a href="edit.php?id=<?= $result["id"]?>" class="btn btn-success">Editar</a>
                        <a href="delete.php?id=<?= $result["id"]?>" class="btn btn-danger">Eliminar</a> 
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

<div class="pagination-container">
    <ul class="pagination justify-content-center" id="pagination"></ul>
</div>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        var table = document.getElementById("table");
        var headers = table.getElementsByTagName("th");
        var rows = Array.from(table.getElementsByTagName("tr")).slice(1);
        var sortOrder = 1; // 1 para orden ascendente, -1 para orden descendente

        var itemsPerPage = 5; // Cambiar la cantidad de elementos por página
        var currentPage = 1;

        // Asignar evento clic a cada encabezado de columna
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

            // Reorganizar las filas en la tabla
            for (var i = 0; i < rows.length; i++) {
                table.tBodies[0].appendChild(rows[i]);
            }

            // Cambiar el orden de clasificación para el siguiente clic en el mismo encabezado
            sortOrder *= -1;

            // Actualizar la paginación después de ordenar
            currentPage = 1; // Regresar a la primera página
            updatePagination();
        }

        function displayRows(startIndex, endIndex) {
            for (var i = 0; i < rows.length; i++) {
                if (i >= startIndex && i < endIndex) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }

        function renderPagination() {
            var totalPages = Math.ceil(rows.length / itemsPerPage);
            var paginationElement = document.getElementById("pagination");
            paginationElement.innerHTML = "";

            for (var i = 1; i <= totalPages; i++) {
                var li = document.createElement("li");
                var a = document.createElement("a");
                a.href = "#";
                a.textContent = i;
                a.classList.add("page-link");

                a.addEventListener("click", function(page) {
                    return function(event) {
                        event.preventDefault();
                        currentPage = page;
                        updatePagination();
                    };
                }(i));

                li.appendChild(a);
                li.classList.add("page-item");
                if (i === currentPage) {
                    li.classList.add("active");
                }

                paginationElement.appendChild(li);
            }
        }

        function updatePagination() {
            var startIndex = (currentPage - 1) * itemsPerPage;
            var endIndex = currentPage * itemsPerPage;
            displayRows(startIndex, endIndex);
            renderPagination();
        }

        displayRows(0, itemsPerPage);
        renderPagination();
    });
</script>

<!-- <script type="text/javascript">
        
            document.addEventListener("DOMContentLoaded", function() {
                var table = document.getElementById("table");
                var headers = table.getElementsByTagName("th");
                var rows = Array.from(table.getElementsByTagName("tr")).slice(1);
                var sortOrder = 1; // 1 para orden ascendente, -1 para orden descendente

                // Asignar evento clic a cada encabezado de columna
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

                // Reorganizar las filas en la tabla
                for (var i = 0; i < rows.length; i++) {
                    table.tBodies[0].appendChild(rows[i]);
                }

                // Cambiar el orden de clasificación para el siguiente clic en el mismo encabezado
                sortOrder *= -1;
                }
            });


 </script> -->
    
</body>
</html>