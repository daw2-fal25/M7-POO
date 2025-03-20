<?php

require_once '../../bbdd/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $url = $_POST['url'];
    $description = $_POST['description'];
    $thumbnail = $_POST['thumbnail'];

    $stmt = $mysqli->prepare("INSERT INTO PROJECTS (title, url, thumbnail, description) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        die('Error en la preparación de la consulta: ' . $mysqli->error);
    }

    $stmt->bind_param("ssss", $title, $url, $thumbnail, $description);
    if ($stmt->execute()) {
        header('Location: ./adminprojects.php');
        exit();
    } else {
        die('Error al ejecutar la consulta: ' . $stmt->error);
    }

    $stmt->close();
}
?>