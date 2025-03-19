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
$testimonios = $mysqli->query("SELECT * FROM TESTIMONIONS WHERE id = $id");
$testimonios = $testimonios->fetch_assoc();


//4. Validar los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_GET['id'];
    $foto = $_POST['foto'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $descripcion = $_POST['descripcion'];
    $rating = $_POST['rating'];

    //5. Actualizar los datos en la base de datos
    $stmt = $mysqli->prepare("UPDATE TESTIMONIONS SET foto=?,name=?,surname=?, descripcion=?, rating=? WHERE id=?");
    $stmt->bind_param("ssssii", $foto, $name, $surname, $descripcion, $rating, $id);
    if($stmt->execute()){
        header('Location: ./admintestimonial.php');
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
                <label for="foto" class="form-label">Foto</label>
                <input type="text" class="form-control" id="foto" name="foto" value="<?php echo $testimonios['foto']?>" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $testimonios['name']?>" required>
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="surname" name="surname" value="<?php echo $testimonios['surname']?>" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Comentario</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?php echo $testimonios['descripcion']?></textarea>
            </div>
            <div class="mb-3">
                <label for="rating" class="form-label">Puntuación</label>
                <input type="number" class="form-control" id="rating" name="rating" max="5" min="1" value="<?php echo $testimonios['rating']?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+0I5gybF5b5yD1Fq4u5Kk5tBT5j5" crossorigin="anonymous"></script>
    
    
</body>
</html>