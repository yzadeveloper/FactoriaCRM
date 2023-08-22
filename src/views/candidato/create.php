<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
    <div class="container-fluid bg-primary-subtle" >
        <h1>Crear candidato</h1>
        <form action="./store.php" method="POST" autocomplete="off">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" name="nombre" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                <label for="exampleInputEmail1" class="form-label">Apellidos</label>
                <input type="text" name="apellidos" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                <label for="exampleInputEmail1" class="form-label">Correo</label>
                <input type="email" name="correo" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                <label for="exampleInputEmail1" class="form-label">Teléfono</label>
                <input type="text" name="telefono" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                <label for="exampleInputEmail1" class="form-label">Dirección</label>
                <input type="text" name="direccion"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                <label for="exampleInputEmail1" class="form-label">Código Postal</label>
                <input type="number" name="codigo_postal" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                <label for="exampleInputEmail1" class="form-label">Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                <label for="exampleInputEmail1" class="form-label">Género</label>
                <select class="form-select" aria-label="Default select example" name="genero">
                    <option selected>Elige un género</option>
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                    <option value="Otro">Otro</option>
                </select>

                <label for="exampleInputEmail1" class="form-label">DNI/NIE/Pasaporte</label>
                <input type="text" name="dni" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                <input type="text" name="id_rol" value="1" hidden class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                
                <label for="exampleInputEmail1" class="form-label">Acepto los T&C de protección de datos</label>
                <input class="form-check-input" name="tratamiento_datos" type="checkbox" value="1" id="flexCheckDefault" required>
                    

                
                <br><br>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-danger" href="../../index.php">Cancelar</a>
            <br><br>
        </form>
    </div>


</body>
</html>