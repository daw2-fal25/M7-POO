<?php
    session_start();
    require_once '../../bbdd/config.php';
    if ($_SESSION['user_rol'] !== 'admin') {
        echo 'No tiene el rol sea administrador';
        exit();
    }
    require_once './add-new.php';
    $news = $mysqli->query("SELECT * FROM NEWS");
    $news = $news->fetch_all(MYSQLI_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/147cf78807.js" crossorigin="anonymous"></script>
</head>
<body>
    <main class="">
        <div class="container text-center">
        <div class="titulo d-flex justify-content-between p-3">
          <a href="../admin.php"><i class="fa-solid fa-arrow-right-to-bracket fs-5 text-black"></i></a>
          <h1>Tabla noticias</h1>
          <p></p>

          </div>
          <div class="text-center mt-3 mb-3">
            <a type="button" class="btn btn-outline-success ps-5 pe-5 pt-2 pb-2" style="width: 50%;" data-bs-toggle="modal" data-bs-target="#exampleModal">Añadir noticia</a>

          </div>
                <div class="border p-3">
                <table class="table table-striped">
                <tr>
                    <th>Titulo</th>
                    <th>Subtitulo</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>
                    <th>Fecha de publicacion</th>
                    <th></th>
                    <th></th>
                    

                </tr>
                <?php
                foreach ($news as $new) {
                    echo '<tr>';
                    echo '<td>'.$new['tittle'].'</td>';
                    echo '<td>'.$new['descripcion'].'</td>';
                    echo '<td>'.$new['subtittle'].'</td>';
                    echo '<td><a href='.$new['thumbnail'].'><img src="'.$new['thumbnail'].'" alt="" width=80px height=50px></a></td>';
                    echo '<td>'.$new['data_publicacio'].'</td>';
                    echo '<td><a class="btn btn-success" href="./edit-new.php?id='.$new['id'].'"><i class="fa-solid fa-pen-to-square"></i></a></td>';
                    echo '<td><a class="btn btn-danger"href="./delete-new.php?id='.$new['id'].'"><i class="fa-solid fa-trash"></i></a></td>';
                    echo '</tr>';
                }
                ?>
            </table>
                </div>
            </div>
        </div>

    </main>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir noticia</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <form action="" method="POST">
    <div class="mb-3">
                <label for="Titulo" class="form-label">Titulo</label>
                <input type="text" class="form-control" id="Titulo" name="Titulo" required>
            </div>
            <div class="mb-3">
                <label for="Subtitulo" class="form-label">Subtitulo</label>
                <input type="text" class="form-control" id="Subtitulo" name="Subtitulo" required>
            </div>
            <div class="mb-3">
                <label for="Descripcion" class="form-label">Descripcion</label>
                <input type="text" class="form-control" id="Descripcion" name="Descripcion" required>
            </div>
            <div class="mb-3">
                <label for="Imagen" class="form-label">Imagen</label>
                <input type="text" class="form-control" id="Imagen" name="Imagen"  required>
            </div>
        
        
        <input type="submit" class="btn btn-primary text-center" value="Enviar">
    </form>
      </div>
      
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>