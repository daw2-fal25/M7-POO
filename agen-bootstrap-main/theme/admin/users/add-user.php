<?php
require_once '../../bbdd/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $avatar = $_POST['avatar'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encriptar la contraseña
    $date_register = date("Y-m-d"); // Fecha actual

    // Consulta preparada para insertar el usuario
    $stmt = $mysqli->prepare("INSERT INTO USERS (name, surname, email, avatar, password, rol, date_register) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die('Error en la preparación de la consulta: ' . $mysqli->error);
    }

    // Vincular los parámetros
    $stmt->bind_param("sssssss", $name, $surname, $email, $avatar, $password, $rol, $date_register);

    // Ejecutar la consulta y redirigir si es exitosa
    if ($stmt->execute()) {
        header('Location: ./adminuser.php'); // Redirigir a la lista de usuarios
        exit();
    } else {
        die('Error al ejecutar la consulta: ' . $stmt->error);
    }

    $stmt->close();
}
?>