<?php
session_start();
require_once './bbdd/config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['Nombres'];
    $apellido = $_POST['Apellidos'];
    $email = $_POST['email'];
    $avatar = $_POST['avatar'];
    $password = $_POST['password'];

    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $mysqli->prepare(
        "INSERT INTO USERS (name, surname, email, avatar, password, rol, date_register) 
        VALUES (?, ?, ?, ?, ?, 'usuario', NOW())"
    );

    if (!$stmt) {
        die('Error en la preparación: ' . $mysqli->error);
    }
    $stmt->bind_param('sssss', $nombre, $apellido, $email, $avatar, $passwordHashed);
    if ($stmt->execute()) {
        echo '<div class="alert alert-success text-center">Registro exitoso</div>';
    } else {
        die('Error en la ejecución: ' . $stmt->error);
    }
    $stmt->close();
    $mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
        <h1 class="text-center mb-4">Registro</h1>
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
                <label for="avatar" class="form-label">Avatar (URL):</label>
                <input type="text" class="form-control" id="avatar" name="avatar" required>
                <div class="invalid-feedback">
                    Por favor, ingrese un avatar.
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <div class="invalid-feedback">
                    Por favor, ingrese una contraseña.
                </div>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Registrarse</button>
            </div>
            <div class="text-center mt-3">
                <a href="login.php" class="text-decoration-none">¿Ya tienes una cuenta? Inicia sesión</a>
            </div>
        </form>
    </div>
    <script>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>