<?php

require_once '../../bbdd/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ajustar los nombres de los campos para que coincidan con el formulario
    $title = $_POST['Titulo']; // Cambiado para coincidir con el formulario
    $subtitle = $_POST['Subtitulo']; // Cambiado para coincidir con el formulario
    $description = $_POST['Descripcion']; // Cambiado para coincidir con el formulario
    $thumbnail = $_POST['Imagen']; // Cambiado para coincidir con el formulario

    // Insertar la fecha actual automáticamente
    $new_data = date("Y-m-d");

    // Consulta preparada para insertar la noticia
    $stmt = $mysqli->prepare("INSERT INTO NEWS (new_data, title, subtitle, description, thumbnail) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        die('Error en la preparación de la consulta: ' . $mysqli->error);
    }

    $stmt->bind_param("sssss", $new_data, $title, $subtitle, $description, $thumbnail);

    // Ejecutar la consulta y redirigir si es exitosa
    if ($stmt->execute()) {
        header('Location: ./adminnews.php'); // Redirigir a la lista de noticias
        exit();
    } else {
        die('Error al ejecutar la consulta: ' . $stmt->error);
    }

    $stmt->close();
}
?>