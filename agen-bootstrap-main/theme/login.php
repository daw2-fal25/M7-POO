<?php
session_start();
require_once './bbdd/config.php';

//1. comprobar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //2. Recoger los datos del formulario
    $email =$_POST['email'];
    $password =$_POST['password'];

    //3. Ejecutar la consulta
    $result = $mysqli->query("SELECT * FROM USERS WHERE email = '$email' LIMIT 1");

    



    //4. Mirar si hay resultados
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        //5. Comprobar la contraseña
        if (password_verify($password, $user['password'])) {
            //6. Iniciar Sesion
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_surname'] = $user['surname'];
            $_SESSION['user_avatar'] = $user['avatar'];
            $_SESSION['user_rol'] = $user['rol'];
            header('Location: index.php');
        } else {
            echo 'Contraseña incorrecta';
        }


        
    }else{
        echo 'Usuario no encontrado';
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar session</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="container p-5">
    <h1 class="text-center">Inicion de sesion</h1>
<form action="" method="post" class="p-5">
        
        <div class="mb-3">
        <label for="email" class="form-label">Email:</label><br>
        <input type="email" id="email" name="email" class="form-control" required> 
        </div>
        <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <div class="mb3">
            
        </div>
        

        <input type="submit" value="Iniciar sesión" class="btn btn-primary">
        <a href="register.php" class="text-decoration-none btn btn-outline-primary" >Crear una cuenta</a>
    </form>
</body>
</html>