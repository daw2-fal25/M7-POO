<?php
    session_start();
    require_once '../bbdd/config.php';
    if ($_SESSION['user_rol'] !== 'admin') {
        echo 'No tiene el rol sea administrador';
        exit();
    }


    

    


    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/147cf78807.js" crossorigin="anonymous"></script>
    <style>
        .btn{
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 18px;
            transition: background-color 2s ease infinite;
            
        }
        .btn i{
            margin-left: 10px;
            font-size: 24px;
        }
        .btn:hover i{
            
            
            
            animation: rotar 1s infinite linear;
        }
        @keyframes rotar{
            0% { transform: rotate(0deg); }
            50% { transform: rotate(180deg); }
            100% { transform: rotate(360deg); }

        }
    </style>
</head>

<body>
    
<div class="container">
<div class="titulo d-flex justify-content-between p-3">
          <a href="../index.php"><i class="fa-solid fa-arrow-right-to-bracket fs-5 text-black"></i></a>
          <h1>Panel admin</h1>
          <p></p>

          </div>
    <div class="row text-center">
        <div class="col-6 p-5">
            <a href="./testimonials/admintestimonial.php" class="btn btn-outline-primary p-3">Testimonios<i class="fa-solid fa-users"></i></a>
        </div>
        <div class="col-6 p-5">
            <a href="./projects/adminprojects.php" class="btn btn-outline-secondary p-3">Proyectos <i class="fa-solid fa-shapes"></i></a>

        </div>
        <div class="col-6 p-5">
            <a href="./news/adminnews.php" class="btn btn-outline-success p-3">Noticias <i class="fa-solid fa-newspaper"></i></a>
        </div>
        <div class="col-6 p-5">
            <a href="./users/adminuser.php" class="btn btn-outline-info p-3">Usuarios <i class="fa-solid fa-user"></i></a>
        </div>        
    </div>
</div>    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>