<?php
session_start();
require_once '../../bbdd/config.php';

if ($_SESSION['user_rol'] != 'admin') {
    echo 'No tiene el rol sea administrador';
    exit();
}

$id = $_GET['id'];
$stmt = $mysqli->prepare("DELETE FROM PROJECTS WHERE id = ?");
$stmt->bind_param("i", $id);
if($stmt->execute()){
    header('Location: ./adminprojects.php');
} else {
    echo 'Error al eliminar el proyecto';
}
$stmt->close();
$mysqli->close();
exit();
?>