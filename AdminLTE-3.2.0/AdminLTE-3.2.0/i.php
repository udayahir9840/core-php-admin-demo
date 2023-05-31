<form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="images[]" multiple>
    <input type="text" name="title">
    <textarea name="description"></textarea>
    <button type="submit">Upload</button>
</form>
<?php
    // index.php

// Connect to the database
$pdo = new PDO("mysql:host=localhost;dbname=mydatabase", "username", "password");

// Query the database for all the images
$stmt = $pdo->query("SELECT * FROM images

?>
<?php
// upload.php

// Connect to the database
$pdo = new PDO("mysql:host=localhost,dbname=phpadmin_panel", "username");

// Loop through each uploaded file
foreach ($_FILES['images']['name'] as $key => $name) {
    // Get the file extension
    $extension = pathinfo($name, PATHINFO_EXTENSION);

    // Generate a unique filename
    $filename = uniqid() . '.' . $extension;

    // Move the file to the uploads directory
    move_uploaded_file($_FILES['images']['tmp_name'][$key], 'uploads/' . $filename);

    // Insert a record into the database
    $stmt = $pdo->prepare("INSERT INTO images (filename, title, description) VALUES (?, ?, ?)");
    $stmt->execute([$filename, $_POST['title'], $_POST['description']]);
}
?>