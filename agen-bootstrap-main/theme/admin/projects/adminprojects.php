<?php
    session_start();
    require_once '../../bbdd/config.php';
    if ($_SESSION['user_rol'] !== 'admin') {
        echo 'No tiene el rol sea administrador';
        exit();
    }
    require './add-project.php';
    $projects = $mysqli->query("SELECT * FROM PROJECTS");
    $projects = $projects->fetch_all(MYSQLI_ASSOC);
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel admin proyectos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/147cf78807.js" crossorigin="anonymous"></script>
</head>
<body>
    <main class="">
        <div class="container text-center">
          <div class="titulo d-flex justify-content-between p-3">
          <a href="../admin.php"><i class="fa-solid fa-arrow-right-to-bracket fs-5 text-black"></i></a>
          <h1>Tabla proyectos</h1>
          <p></p>

          </div>

            <div class="text-center mt-3 mb-3">
                    <a type="button" class="btn btn-outline-success ps-5 pe-5 pt-2 pb-2"  style="width: 50%;" data-bs-toggle="modal" data-bs-target="#exampleModal" >Añadir proyecto</a>
            </div>
            <div class="border p-3">
            <table class="table table-striped">
        <tr>
            <th>Titulo</th>
            <th>URL</th>
            <th>Descripcion</th>
            <th>Imagen</th>
            <th></th>
            <th></th>
        </tr>
        <?php
        foreach ($projects as $project) {
            echo '<tr>';
            echo '<td>'.$project['tittle'].'</td>';
            echo '<td><a class"btn btn-warning" href='.$project['url'].'>Visitar el sito</a></td>';
            echo '<td>'.$project['descripcion'].'</td>';
            echo '<td><a href='.$project['thumbnail'].'><img src="'.$project['thumbnail'].'" alt="" width=100px height=70px></a></td>';
            echo '<td><a class="btn btn-success" href="edit-project.php?id='.$project['id'].'"><i class="fa-solid fa-pen-to-square"></i></a></td>';
            echo '<td><a class="btn btn-danger" href="delete-project.php?id='.$project['id'].'"><i class="fa-solid fa-trash"></a></td>';
            echo '</tr>';
        }
        ?>
    </table>
    </div>
            </div>
    </main>
    c
</body>

</html>