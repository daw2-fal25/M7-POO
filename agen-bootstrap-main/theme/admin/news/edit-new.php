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
$noticia = $mysqli->query("SELECT * FROM NEWS WHERE id = $id");
$noticia = $noticia->fetch_assoc();


//4. Validar los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];
    $titulo = $_POST['titulo'];
    $subtitulo = $_POST['subtitulo'];
    $imagen = $_POST['Imagen'];
    $descripcion = $_POST['descripcion'];

    //5. Actualizar los datos en la base de datos
    $stmt = $mysqli->prepare("UPDATE NEWS SET tittle=?,subtittle=?,thumbnail=?, descripcion=? WHERE id=?");
    $stmt->bind_param("ssssi", $titulo, $subtitulo, $imagen, $descripcion, $id);
    if($stmt->execute()){
        header('Location: ./adminnews.php'); 
    } else {
        echo 'Error al actualizar el noticia';
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
        <h1 class="mb-4">Editar noticia</h1>
        <form action="" method="post">
                <div class="mb-3">
                <label for="Titulo" class="form-label">Titulo</label>
                <input type="text" class="form-control" id="Titulo" name="titulo" value="<?php echo $noticia['tittle']?>" required>
            </div>
            <div class="mb-3">
                <label for="Subtitulo" class="form-label">Subtitulo</label>
                <input type="text" class="form-control" id="Subtitulo" name="subtitulo" value="<?php echo $noticia['subtittle']?>" required>
            </div>
            <div class="mb-3">
                <label for="Descripcion" class="form-label">Descripcion</label>
                <input type="text" class="form-control" id="Descripcion" name="descripcion" value="<?php echo $noticia['descripcion']?>" required>
            </div>
            <div class="mb-3">
                <label for="Imagen" class="form-label">Imagen</label>
                <input type="text" value="<?php echo $noticia['thumbnail']?>" class="form-control" id="Imagen" name="Imagen"  required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+0I5gybF5b5yD1Fq4u5Kk5tBT5j5" crossorigin="anonymous"></script>
    
    
</body>
</html>