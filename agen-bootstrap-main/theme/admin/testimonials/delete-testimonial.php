<?php
session_start();
require_once '../../bbdd/config.php';


if (!isset($_SESSION['user_rol']) || $_SESSION['user_rol'] !== 'admin') {
    echo 'No tiene el rol de administrador';
    exit();
}
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo 'ID inválido';
    exit();
}

$id = (int) $_GET['id'];

$stmt = $mysqli->prepare("DELETE FROM TESTIMONIALS WHERE id = ?");
if (!$stmt) {
    die('Error en la preparación de la consulta: ' . $mysqli->error);
}

$stmt->bind_param("i", $id);
if ($stmt->execute()) {
    header('Location: ./admintestimonial.php');
    exit();
} else {
    die('Error al ejecutar la consulta: ' . $stmt->error);
}
$stmt->close();
?>