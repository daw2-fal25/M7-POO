<?php
session_start();
require_once '../../bbdd/config.php';

if (!isset($_SESSION['user_rol']) || $_SESSION['user_rol'] != 'admin') {
    echo 'No tiene el rol de administrador';
    exit();
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo 'ID inválido';
    exit();
}

$id = (int) $_GET['id'];

// Eliminar las respuestas a los comentarios relacionados con el usuario
$stmt_replies = $mysqli->prepare("DELETE FROM COMMENTS WHERE comment_id IN (SELECT id FROM COMMENTS WHERE user_id = ?)");
if (!$stmt_replies) {
    die('Error en la preparación de la consulta para eliminar respuestas: ' . $mysqli->error);
}
$stmt_replies->bind_param("i", $id);
if (!$stmt_replies->execute()) {
    die('Error al eliminar las respuestas: ' . $stmt_replies->error);
}
$stmt_replies->close();

// Eliminar los comentarios relacionados con el usuario
$stmt_comments = $mysqli->prepare("DELETE FROM COMMENTS WHERE user_id = ?");
if (!$stmt_comments) {
    die('Error en la preparación de la consulta para eliminar comentarios: ' . $mysqli->error);
}
$stmt_comments->bind_param("i", $id);
if (!$stmt_comments->execute()) {
    die('Error al eliminar los comentarios: ' . $stmt_comments->error);
}
$stmt_comments->close();

// Eliminar el usuario
$stmt_user = $mysqli->prepare("DELETE FROM USERS WHERE id = ?");
if (!$stmt_user) {
    die('Error en la preparación de la consulta para eliminar usuario: ' . $mysqli->error);
}
$stmt_user->bind_param("i", $id);
if ($stmt_user->execute()) {
    header('Location: ./adminuser.php');
    exit();
} else {
    echo 'Error al eliminar el usuario: ' . $stmt_user->error;
}
$stmt_user->close();

$mysqli->close();
?>