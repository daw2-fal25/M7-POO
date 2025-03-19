<?php
    session_start();
    require_once '/workspaces/M7-DAW2HuamanPinto-FPLLEFIA/agen-bootstrap-main/theme/config.php';
    if ($_SESSION['user_rol'] !== 'admin') {
        echo 'No tiene el rol sea administrador';
        exit();
    }
    require './add-user.php';
        

    $users = $mysqli->query("SELECT * FROM USERS");
    $users = $users->fetch_all(MYSQLI_ASSOC);
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/147cf78807.js" crossorigin="anonymous"></script>
</head>
<body>
    <main class="">
        <div class="container text-center">
        <div class="titulo d-flex justify-content-between p-3">
          <a href="../admin.php"><i class="fa-solid fa-arrow-right-to-bracket fs-5 text-black"></i></a>
          <h1>Tabla usuarios</h1>
          <p></p>

          </div>
          <div class="text-center mt-3 mb-3">
            <a type="button" class="btn btn-outline-success ps-5 pe-5 pt-2 pb-2" style="width: 50%;" data-bs-toggle="modal" data-bs-target="#exampleModal">Añadir usuario</a>
          </div>
            <div class="border p-3">
            <table class="table table-striped">
        <tr>
            <th>Avatar</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Rol</th>
            <th></th>
            <th></th>
            
        </tr>

        <?php
        foreach ($users as $user) {
            echo '<tr>';
            echo '<td><img src="'.$user['avatar'].'" alt="" width=50px height=50px></td>';
            echo '<td>'.$user['name'].'</td>';
            echo '<td>'.$user['surname'].'</td>';
            echo '<td>'.$user['email'].'</td>';
            echo '<td>'.$user['rol'].'</td>';
            echo '<td><a class="btn btn-success" href="edit-user.php?id='.$user['id'].'"><i class="fa-solid fa-pen-to-square"></i></a></td>';
            echo '<td><a class="btn btn-danger"href="delete-user.php?id='.$user['id'].'"><i class="fa-solid fa-trash"></a></td>';
            echo '</tr>';
        }
        ?>
    </table>
            </div>
            </div>

    </main>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <form action="" method="POST">
    <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="surname" name="surname" required>
            </div>
            <div class="mb-3">
                <label for="Avatar" class="form-label">Avatar</label>
                <input type="text" class="form-control" id="Avatar" name="Avatar" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="rol" class="form-label">Rol</label>
                <input type="text" class="form-control" id="rol" name="rol" required>
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