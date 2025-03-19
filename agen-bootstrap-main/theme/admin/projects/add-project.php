<?php
//2. comprobar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //3. Recoger los datos del formulario
    $title = $_POST['title'];
    $url = $_POST['url'];
    $description = $_POST['description'];
    $thumbnail = $_POST['thumbnail'];

    //4. Ejecutar la consulta
    $stmt = $mysqli->prepare("INSERT INTO PROJECTS (tittle, url, thumbnail,descripcion) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $title, $url, $thumbnail, $description);
    if($stmt->execute()){
        header('Location:./adminprojects.php');

    } else {
        die('Error en la ejecucion: '. $stmt->error);
    }
    $stmt->execute();
    
}
?>