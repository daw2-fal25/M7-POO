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
$stmt = $mysqli->prepare("DELETE FROM TESTIMONIONS WHERE id = ?");
$stmt->bind_param("i", $id);
if($stmt->execute()){
    header('Location:./admintestimonial.php');
} else {
    echo 'Error al eliminar el testimonial';
}
$stmt->close();
$mysqli->close();
exit();
?>