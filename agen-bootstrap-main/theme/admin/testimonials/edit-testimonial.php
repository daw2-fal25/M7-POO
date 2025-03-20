<?php

session_start();
require_once '../../bbdd/config.php';
if (!isset($_SESSION['user_rol']) || $_SESSION['user_rol'] != 'admin') {
    echo 'No tiene el rol de administrador';
    exit();
}
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo 'ID inválido';
    exit();
}
$id = (int) $_GET['id'];

$testimonios = $mysqli->query("SELECT * FROM TESTIMONIALS WHERE id = $id");
if (!$testimonios) {
    die("Error en la consulta: " . $mysqli->error);
}
$testimonios = $testimonios->fetch_assoc();
if (!$testimonios) {
    echo 'Testimonio no encontrado';
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $photo = htmlspecialchars($_POST['photo']);
    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);
    $description = htmlspecialchars($_POST['description']);
    $rating = (int) $_POST['rating'];

    $stmt = $mysqli->prepare("UPDATE TESTIMONIALS SET photo=?, name=?, surname=?, description=?, rating=? WHERE id=?");
    if (!$stmt) {
        die("Error en la preparación: " . $mysqli->error);
    }
    $stmt->bind_param("ssssii", $photo, $name, $surname, $description, $rating, $id);
    if ($stmt->execute()) {
        header('Location: ./admintestimonial.php');
        exit();
    } else {
        echo 'Error al actualizar el testimonio';
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
    <title>Editar Testimonio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/147cf78807.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
    <header class="bg-dark text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h3">Editar Testimonio</h1>
            <a href="./admintestimonial.php" class="btn btn-outline-light"><i class="fa-solid fa-arrow-left"></i> Volver</a>
        </div>
    </header>

    <main class="container my-5">
        <div class="card shadow-sm p-4">
            <h2 class="h4 mb-4 text-center">Editar Información del Testimonio</h2>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="photo" class="form-label">photo (URL)</label>
                    <input type="text" class="form-control" id="photo" name="photo" value="<?php echo htmlspecialchars($testimonios['photo']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($testimonios['name']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="surname" name="surname" value="<?php echo htmlspecialchars($testimonios['surname']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Comentario</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required><?php echo htmlspecialchars($testimonios['description']); ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="rating" class="form-label">Puntuación</label>
                    <input type="number" class="form-control" id="rating" name="rating" max="5" min="1" value="<?php echo htmlspecialchars($testimonios['rating']); ?>" required>
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