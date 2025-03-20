<?php
session_start();
require_once '../bbdd/config.php';
if ($_SESSION['user_rol'] !== 'admin') {
    echo 'No tiene el rol de administrador';
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/147cf78807.js" crossorigin="anonymous"></script>
    <style>
        .btn {
            padding: 15px 25px;
            border-radius: 10px;
            font-size: 18px;
        }
        .btn i {
            margin-left: 10px;
            font-size: 24px;
        }
    </style>
</head>
<body class="bg-light">
    <header class="bg-dark text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h3">Panel de Administración</h1>
            <a href="../index.php" class="btn btn-outline-light"><i class="fa-solid fa-arrow-right-to-bracket"></i> Salir</a>
        </div>
    </header>

    <main class="container my-5">
        <div class="row text-center">
            <div class="col-md-6 col-lg-3 mb-4">
                <a href="./testimonials/admintestimonial.php" class="btn btn-outline-primary w-100">
                    Testimonios <i class="fa-solid fa-users"></i>
                </a>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <a href="./projects/adminprojects.php" class="btn btn-outline-secondary w-100">
                    Proyectos <i class="fa-solid fa-shapes"></i>
                </a>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <a href="./news/adminnews.php" class="btn btn-outline-success w-100">
                    Noticias <i class="fa-solid fa-newspaper"></i>
                </a>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <a href="./users/adminuser.php" class="btn btn-outline-info w-100">
                    Usuarios <i class="fa-solid fa-user"></i>
                </a>
            </div>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>