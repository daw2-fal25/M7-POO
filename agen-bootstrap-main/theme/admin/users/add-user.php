<?php
session_start();
require_once '../../bbdd/config.php';

if ($_SESSION['user_rol'] != 'admin') {
    echo 'No tiene el rol sea administrador';
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Avatar = $_POST['Avatar'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];

    $stmt = $mysqli->prepare("INSERT INTO USERS (name,surname,email,avatar,rol) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssss", $name, $surname, $email, $Avatar, $rol);
    if($stmt->execute()){
        
    } else {
        echo 'Error al añadir el testimonial';
    }
    $stmt->close();
    
}

?>