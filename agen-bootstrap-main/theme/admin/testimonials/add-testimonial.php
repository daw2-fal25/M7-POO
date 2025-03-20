<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../../bbdd/config.php';

    $photo = $_POST['photo'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $description = $_POST['description'];
    $rating = $_POST['rating'];

    $stmt = $mysqli->prepare("INSERT INTO TESTIMONIALS (photo, name, surname, description, rating) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        die('Error en la preparación de la consulta: ' . $mysqli->error);
    }

    $stmt->bind_param("ssssi", $photo, $name, $surname, $description, $rating);
    if ($stmt->execute()) {
        header('Location: ./admintestimonial.php');
        exit();
    } else {
        die('Error al ejecutar la consulta: ' . $stmt->error);
    }

    // Cerrar la consulta
    $stmt->close();
}
?>