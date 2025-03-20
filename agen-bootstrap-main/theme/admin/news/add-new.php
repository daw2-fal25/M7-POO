<?php
session_start();
require_once '../../bbdd/config.php';

if ($_SESSION['user_rol'] != 'admin') {
    echo 'No tiene el rol sea administrador';
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Titulo = $_POST['Titulo'];
    $Subtitulo = $_POST['Subtitulo'];
    $Descripcion = $_POST['Descripcion'];
    $Imagen = $_POST['Imagen'];

    $stmt = $mysqli->prepare("INSERT INTO NEWS (tittle, subtittle, descripcion, thumbnail) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $Titulo, $Subtitulo, $Descripcion, $Imagen);
    if($stmt->execute()){
        
    } else {
        echo 'Error al añadir la noticia';
    }
    $stmt->close();
    
}
?>

</html>