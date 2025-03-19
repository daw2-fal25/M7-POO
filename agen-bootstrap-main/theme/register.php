<?php
session_start();
require_once './bbdd/config.php';
//1. Comprobar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //recoger datos del formulario
    $nombre = $_POST['Nombres'];
    $apellido = $_POST['Apellidos'];
    $email = $_POST['email'];
    $avatar = $_POST['avatar'];
    $password = $_POST['password'];
    //2. cifrar la paswword con password_hash
    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
    //3.Prepara la consulta antes de insertar para evitar el sql injection
    $stmt = $mysqli->prepare(
        "INSERT INTO USERS (name,surname,email,avatar, password,rol,date_register) 
        VALUES (?,?,?,?,?,'usuario',NOW())"
        );
    //4. Comprobar que la preparacion tuvo exito
    if(!$stmt){
        die('Error en la preparacion: ' . $mysqli->error);
    }
    //5. Bindear los parametos
    $stmt->bind_param('sssss',$nombre,$apellido,$email,$avatar,$passwordHashed);
    //6. Ejecutar la consulta
    if($stmt->execute()){
        echo 'Registro exitoso';
    } else {
        die('Error en la ejecucion: '. $stmt->error);
        //7.cerrar la coneccion
    $stmt->close();
    $mysqli->close();
    }
    
    



}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Registro</h2>
        <form action="" method="post" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="Nombres" class="form-label">Nombres:</label>
                <input type="text" class="form-control" id="Nombres" name="Nombres" required>
                <div class="invalid-feedback">
                    Por favor, ingrese sus nombres.
                </div>
            </div>
            <div class="mb-3">
                <label for="Apellidos" class="form-label">Apellidos:</label>
                <input type="text" class="form-control" id="Apellidos" name="Apellidos" required>
                <div class="invalid-feedback">
                    Por favor, ingrese sus apellidos.
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <div class="invalid-feedback">
                    Por favor, ingrese un email válido.
                </div>
            </div>
            <div class="mb-3">
                <label for="avatar" class="form-label">Avatar:</label>
                <input type="text" class="form-control" id="avatar" name="avatar" required>
                <div class="invalid-feedback">
                    Por favor, ingrese un avatar.
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <div class="invalid-feedback">
                    Por favor, ingrese una contraseña.
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </div>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
    
</body>
</html>