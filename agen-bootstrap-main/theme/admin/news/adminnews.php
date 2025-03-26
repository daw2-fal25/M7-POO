<?php
session_start();
require_once '../../bbdd/config.php';

// Verificar si el usuario tiene el rol de administrador
if ($_SESSION['user_rol'] !== 'admin') {
    echo 'No tiene el rol de administrador';
    exit();
}

// Consulta segura para obtener las noticias
$stmt = $mysqli->prepare("SELECT * FROM NEWS ORDER BY new_data DESC");
if (!$stmt) {
    echo 'Error al preparar la consulta: ' . $mysqli->error;
    exit();
}

$stmt->execute();
$news = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Noticias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/147cf78807.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
    <header class="bg-dark text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h3">Gestión de Noticias</h1>
            <a href="../admin.php" class="btn btn-outline-light"><i class="fa-solid fa-arrow-left"></i> Volver</a>
        </div>
    </header>

    <main class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h4">Lista de Noticias</h2>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addNewsModal"><i class="fa-solid fa-plus"></i> Añadir Noticia</button>
        </div>

        <div class="table-responsive bg-white shadow-sm rounded p-3">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Título</th>
                        <th>Subtítulo</th>
                        <th>Descripción</th>
                        <th>Imagen</th>
                        <th>Fecha de Publicación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($news)): ?>
                        <?php foreach ($news as $new): ?>
                            <tr>
                                <td><?= htmlspecialchars($new['title']) ?></td>
                                <td><?= htmlspecialchars($new['subtitle']) ?></td>
                                <td><?= htmlspecialchars($new['description']) ?></td>
                                <td>
                                    <a href="<?= htmlspecialchars($new['thumbnail']) ?>" target="_blank">
                                        <img src="<?= htmlspecialchars($new['thumbnail']) ?>" alt="Imagen" class="img-thumbnail" style="width: 80px; height: 50px; object-fit: cover;">
                                    </a>
                                </td>
                                <td><?= htmlspecialchars($new['new_data']) ?></td>
                                <td>
                                    <a href="./edit-new.php?id=<?= $new['id'] ?>" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="./delete-new.php?id=<?= $new['id'] ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">No se encontraron noticias.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Modal para añadir noticia -->
    <div class="modal fade" id="addNewsModal" tabindex="-1" aria-labelledby="addNewsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="addNewsModalLabel">Añadir Noticia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="./add-new.php" method="POST">
                        <div class="mb-3">
                            <label for="Titulo" class="form-label">Título</label>
                            <input type="text" class="form-control" id="Titulo" name="Titulo" required>
                        </div>
                        <div class="mb-3">
                            <label for="Subtitulo" class="form-label">Subtítulo</label>
                            <input type="text" class="form-control" id="Subtitulo" name="Subtitulo" required>
                        </div>
                        <div class="mb-3">
                            <label for="Descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="Descripcion" name="Descripcion" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="Imagen" class="form-label">URL de la Imagen</label>
                            <input type="text" class="form-control" id="Imagen" name="Imagen" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>