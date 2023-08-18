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
        <h1>Añadir Requisito</h1>
        <form action="store.php" method="POST" autocomplete="off">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Requisito</label>
                <input type="text" name="nombre" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                <br><br>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a class="btn btn-danger" href="../../index.php">Cancelar</a>
            <br><br>
        </form>
    </div>


</body>
</html>