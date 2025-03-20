<?php

session_start();
require_once '../../bbdd/config.php';
if ($_SESSION['user_rol'] != 'admin') {
    echo 'No tiene el rol de administrador';
    exit();
}
$id = $_GET['id'];
$usuario = $mysqli->query("SELECT * FROM USERS WHERE id = $id");
$usuario = $usuario->fetch_assoc();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $avatar = $_POST['avatar'];
    $rol = $_POST['rol'];
    $stmt = $mysqli->prepare("UPDATE USERS SET name=?, surname=?, email=?, avatar=?, rol=? WHERE id=?");
    $stmt->bind_param("sssssi", $name, $surname, $email, $avatar, $rol, $id);
    if ($stmt->execute()) {
        header('Location: ./adminuser.php');
    } else {
        echo 'Error al actualizar el usuario';
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
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/147cf78807.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
    <header class="bg-dark text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h3">Editar Usuario</h1>
            <a href="./adminuser.php" class="btn btn-outline-light"><i class="fa-solid fa-arrow-left"></i> Volver</a>
        </div>
    </header>

    <main class="container my-5">
        <div class="card shadow-sm p-4">
            <h2 class="h4 mb-4 text-center">Editar Información del Usuario</h2>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($usuario['name']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="surname" name="surname" value="<?php echo htmlspecialchars($usuario['surname']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="avatar" class="form-label">Avatar</label>
                    <input type="text" class="form-control" id="avatar" name="avatar" value="<?php echo htmlspecialchars($usuario['avatar']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="rol" class="form-label">Rol</label>
                    <select class="form-select" id="rol" name="rol" required>
                        <option value="admin" <?php echo $usuario['rol'] == 'admin' ? 'selected' : ''; ?>>Administrador</option>
                        <option value="user" <?php echo $usuario['rol'] == 'user' ? 'selected' : ''; ?>>Usuario</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-50">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+0I5gybF5b5yD1Fq4u5Kk5tBT5j5" crossorigin="anonymous"></script>
</body>
</html>