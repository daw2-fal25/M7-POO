<?php
    

//2. comprobar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //3. Recoger los datos del formulario
    $foto = $_POST['foto'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $descripcion = $_POST['descripcion'];
    $rating = $_POST['rating'];

    //4. Ejecutar la consulta
    $stmt = $mysqli->prepare("INSERT INTO TESTIMONIONS (foto, name, surname, descripcion, rating) VALUES (?,?,?,?,?)");
    $stmt->bind_param("ssssi", $foto, $name, $surname, $descripcion, $rating);
    if($stmt->execute()){

        
    } else {
        echo 'Error al añadir el testimonial';
    }
    $stmt->close();
    
}

?>