<?php

session_start();
require_once '../../bbdd/config.php';

//1. verificar que el rol sea administrador
if ($_SESSION['user_rol'] != 'admin') {
    echo 'No tiene el rol sea administrador';
    exit();
}
//2. agarramos el id
$id = $_GET['id'];
//3. Ejecutar la consulta
$usuario = $mysqli->query("SELECT * FROM USERS WHERE id = $id");
$usuario = $usuario->fetch_assoc();


//4. Validar los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $avatar = $_POST['avatar'];
    $rol = $_POST['rol'];

    //5. Actualizar los datos en la base de datos
    $stmt = $mysqli->prepare("UPDATE USERS SET name=?,surname=?, email=?, avatar=?, rol=? WHERE id=?");
    $stmt->bind_param("sssssi",  $name, $surname, $email, $avatar, $rol, $id);
    if($stmt->execute()){
        header('Location: ./adminuser.php');
    } else {
        echo 'Error al actualizar el testimonial';
    }
    $stmt->close();
    $mysqli->close();
    exit();
}



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit testimonial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
        <h1 class="mb-4">Editar Testimonial</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $usuario['name']?>" required>
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="surname" name="surname" value="<?php echo $usuario['surname']?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email"value="<?php echo $usuario['email']?>" required>
            </div>
            <div class="mb-3">
                <label for="Avatar" class="form-label">Avatar</label>
                <input type="text" class="form-control" id="Avatar" name="avatar" value="<?php echo $usuario['avatar']?>"required>
            </div>
            
            <div class="mb-3">
                <label for="rol" class="form-label">Rol</label>
                <input type="text" class="form-control" id="rol" name="rol" value="<?php echo $usuario['rol']?>"required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+0I5gybF5b5yD1Fq4u5Kk5tBT5j5" crossorigin="anonymous"></script>
    
    
</body>
</html>