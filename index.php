<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        h1 {
            color: #FF4700;
            
        }

        .custom-btn {
            background-color: #FF4700; 
            border-color: #FF4700; 
            color: white;
            
        }
        .custom-btn:hover {
            background-color: white; 
            border-color: #FF4700;
            color: #FF4700; 
        }

        img{
            display:flex;
            max-width: 20%;
            padding: 10px; 
        }
        .center{
            
            display:flex;
            flex-direction: column;
            border: 5px solid #FF4700;
            margin: 50px auto; 
            margin-left: 100px;
            margin-right: 100px;
            padding: 50px; 
            text-align: center;
        }
    </style>
    <title>Bienvenidos a Factoría F5</title>
</head>
<body >

<img src="src/assets/images/2 Logo FF5 VECTORIZADO naranja con negro.png" alt="logo naranja">


<div class="center">
  <h1>Bienvenido a Factoría F5</h1>
  <div class="botones">
      <a class="btn custom-btn" href="./src/views/rp/index.php">Ingresar como RP</a>
      <a class="btn custom-btn" href="./src/views/candidato/create.php">Inscribirse como Candidato</a>
   </div>
</div>
</body>
</html>