<?php

session_start();
require_once '../../bbdd/config.php';

if ($_SESSION['user_rol'] != 'admin') {
    echo 'No tiene el rol de administrador';
    exit();
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo 'ID inválido';
    exit();
}
$id = (int) $_GET['id'];

$proyecto = $mysqli->query("SELECT * FROM PROJECTS WHERE id = $id");
if (!$proyecto) {
    die("Error en la consulta: " . $mysqli->error);
}
$proyecto = $proyecto->fetch_assoc();
if (!$proyecto) {
    echo 'Proyecto no encontrado';
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = htmlspecialchars($_POST['title']);
    $url = htmlspecialchars($_POST['url']);
    $imagen = htmlspecialchars($_POST['thumbnail']);
    $description = htmlspecialchars($_POST['description']);

    // Preparar la consulta para actualizar el proyecto
    $stmt = $mysqli->prepare("UPDATE PROJECTS SET title=?, url=?, thumbnail=?, description=? WHERE id=?");
    if (!$stmt) {
        die('Error en la preparación de la consulta: ' . $mysqli->error);
    }

    $stmt->bind_param("ssssi", $titulo, $url, $imagen, $description, $id);
    if ($stmt->execute()) {
        header('Location: ./adminprojects.php');
        exit();
    } else {
        die('Error al ejecutar la consulta: ' . $stmt->error);
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
    <title>Editar Proyecto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/147cf78807.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
    <header class="bg-dark text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h3">Editar Proyecto</h1>
            <a href="./adminprojects.php" class="btn btn-outline-light"><i class="fa-solid fa-arrow-left"></i> Volver</a>
        </div>
    </header>

    <main class="container my-5">
        <div class="card shadow-sm p-4">
            <h2 class="h4 mb-4 text-center">Editar Información del Proyecto</h2>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" id="title" name="title" class="form-control" value="<?php echo htmlspecialchars($proyecto['title']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="url" class="form-label">URL</label>
                    <input type="text" id="url" name="url" class="form-control" value="<?php echo htmlspecialchars($proyecto['url']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required><?php echo htmlspecialchars($proyecto['description']); ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="thumbnail" class="form-label">URL de la Imagen</label>
                    <input type="text" id="thumbnail" name="thumbnail" class="form-control" value="<?php echo htmlspecialchars($proyecto['thumbnail']); ?>" required>
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