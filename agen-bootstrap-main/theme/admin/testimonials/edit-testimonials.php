<?php

require_once '../../config.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

// Corregir la asignación del ID
$id = (int) $_GET['id'];

$result = $mysqli->query("SELECT * FROM TESTIMONIALS WHERE id = $id");

$testimonial = $result->fetch_assoc();

print_r($testimonial);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $description = $_POST['description'];
    $rating = $_POST['rating'];

    $query = "UPDATE TESTIMONIALS SET name = ?, surname = ?, description = ?, rating = ? WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("sssii", $name, $surname, $description, $rating, $id);
    $stmt->execute();
    
    header("Location: index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="" method="post">
        
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo $testimonial['name'] ?>">
        <br>

        <label for="surname">Surname</label>
        <input type="text" name="surname" value="<?php echo $testimonial['surname'] ?>">
        <br>

        <label for="description">Description</label>
        <textarea name="description"><?php echo $testimonial['description'] ?></textarea>
        <br>

        <label for="rating">Rating</label>
        <input type="number" name="rating" value="<?php echo $testimonial['rating'] ?>">
        <br>

        <button type="submit">Save</button>
    </form>
    
</body>
</html>