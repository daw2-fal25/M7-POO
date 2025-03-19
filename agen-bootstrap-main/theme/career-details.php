<?php
     session_start();
     require_once '/workspaces/M7-DAW2HuamanPinto-FPLLEFIA/agen-bootstrap-main/theme/config.php';
     if ($_SESSION['user_rol'] !== 'admin') {
         echo 'No tiene el rol sea administrador';
         exit();
     }
     $testimonials = $mysqli->query("SELECT * FROM TESTIMONIONS");
     $testimonials = $testimonials->fetch_all(MYSQLI_ASSOC);
 
 
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/147cf78807.js" crossorigin="anonymous"></script>
 </head>
 <body>
     <main class="">
         <div class="container text-center">
             <h1>Tabla testimonials</h1>
             <div class="row">
             <div class="col-8 h-100">
             <table class="table table-striped">
         <tr>
             <th>Foto</th>
             <th>Nombre</th>
             <th>Apellido</th>
             <th>Comentario</th>
             <th>Puntuación</th>
             <th></th>
             <th></th>
         </tr>
         <?php
             foreach ($testimonials as $testimonial) {
                 echo '<tr>';
                 echo '<td><img src="'.$testimonial['foto'].'" alt="" width=50px height=50px></td>';
                 echo '<td>'.$testimonial['name'].'</td>';
                 echo '<td>'.$testimonial['subname'].'</td>';
                 echo '<td>'.$testimonial['descripcion'].'</td>';
                 echo '<td>'.$testimonial['rating'].'</td>';
                 echo '<td><a class="btn btn-success" href="edit-testimonial.php?id='.$testimonial['id'].'"><i class="fa-solid fa-pen-to-square"></i></a></td>';
                 echo '<td><a class="btn btn-danger"href="delete-testimonial.php?id='.$testimonial['id'].'"><i class="fa-solid fa-trash"></a></td>';
 
                 echo '</tr>';
             }
         ?>
     </table>
             </div>
                 <div class="col-4 align-items-center text-center">
                     <a class="btn btn-primary" href="./add-testimonial.php">Añadir testimonio</a>
                 </div>
                 
             </div>
         </div>
             
     
         
         
 
     </main>
     
 </body>
 </html>