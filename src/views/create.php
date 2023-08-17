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
                <input type="text" name="dirección" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                <label for="exampleInputEmail1" class="form-label">Código Postal</label>
                <input type="number" name="codigo_postal" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                <label for="exampleInputEmail1" class="form-label">Fecha de nacimiento</label>
                <input type="date" name="date_create" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                <label for="exampleInputEmail1" class="form-label">Género</label>
                <input type="text" name="genero" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                <label for="exampleInputEmail1" class="form-label">DNI/NIE/Pasaporte</label>
                <input type="text" name="dni" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                <br><br>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-danger" href="../../index.php">Cancelar</a>
            <br><br>
        </form>
    </div>


<!---
    <form action="./store.php" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required>

        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" id="apellidos" required>

        <label for="correo">Correo</label>
        <input type="email" name="correo" id="correo" required>

        <label for="telefono">Teléfono</label>
        <input type="text" name="telefono" id="telefono" required>

        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" id="direccion" required>

        <label for="codigo_postal">Código Postal</label>
        <input type="number" name="telefono" id="telefono" required>

        <label for="fecha_nacimiento">Fecha de nacimiento</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>

        <label for="genero">Género</label>
        <input type="text" name="genero" id="genero" required>

        <label for="dni">DNI/NIE/PASAPORTE</label>
        <input type="text" name="dni" id="dni" required>

        <input type="hidden" name="id_rol" value="candidato">

        <input type="hidden" name="method" value="post">
        <button tye="submit">Save</button>
    </form>---->
</body>
</html>