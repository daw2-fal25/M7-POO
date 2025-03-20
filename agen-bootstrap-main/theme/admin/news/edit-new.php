<?php

session_start();
require_once '../../bbdd/config.php';
if ($_SESSION['user_rol'] != 'admin') {
    echo 'No tiene el rol de administrador';
    exit();
}
$id = $_GET['id'];
$noticia = $mysqli->query("SELECT * FROM NEWS WHERE id = $id");
$noticia = $noticia->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $subtitulo = $_POST['subtitulo'];
    $imagen = $_POST['Imagen'];
    $descripcion = $_POST['descripcion'];
    $stmt = $mysqli->prepare("UPDATE NEWS SET tittle=?, subtittle=?, thumbnail=?, descripcion=? WHERE id=?");
    $stmt->bind_param("ssssi", $titulo, $subtitulo, $imagen, $descripcion, $id);
    if ($stmt->execute()) {
        header('Location: ./adminnews.php');
    } else {
        echo 'Error al actualizar la noticia';
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
    <title>Editar Noticia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/147cf78807.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
    <header class="bg-dark text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h3">Editar Noticia</h1>
            <a href="./adminnews.php" class="btn btn-outline-light"><i class="fa-solid fa-arrow-left"></i> Volver</a>
        </div>
    </header>

    <main class="container my-5">
        <div class="card shadow-sm p-4">
            <h2 class="h4 mb-4 text-center">Editar Información de la Noticia</h2>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="Titulo" class="form-label">Título</label>
                    <input type="text" class="form-control" id="Titulo" name="titulo" value="<?php echo htmlspecialchars($noticia['tittle']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="Subtitulo" class="form-label">Subtítulo</label>
                    <input type="text" class="form-control" id="Subtitulo" name="subtitulo" value="<?php echo htmlspecialchars($noticia['subtittle']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="Descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="Descripcion" name="descripcion" rows="4" required><?php echo htmlspecialchars($noticia['descripcion']); ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="Imagen" class="form-label">URL de la Imagen</label>
                    <input type="text" class="form-control" id="Imagen" name="Imagen" value="<?php echo htmlspecialchars($noticia['thumbnail']); ?>" required>
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