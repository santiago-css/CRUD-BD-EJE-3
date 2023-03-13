<?php

include("database/db.php");
if (isset($_POST['create_product'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $cost = $_POST['cost'];

    $query = "INSERT INTO Tab_Product (Pro_Name, Pro_Description, Pro_Cost) VALUES ('$name', '$description', '$cost');";
    $result = mysqli_query($conn, $query);
    if (mysqli_error($conn)) {
        echo "Error: ". mysqli_error($conn);
    } else {
        $_SESSION['message'] = 'Producto creado correctamente';
        $_SESSION['message_type'] = 'success';
        header("Location: index.php");
    }
}
?>