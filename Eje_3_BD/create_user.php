<?php

include("database/db.php");

if (isset($_POST['create_user'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];

    $query = "INSERT INTO Tab_User (Use_Name, Use_Email, Use_Password, Use_Id_Rol) VALUES ('$name', '$email', '$password', '$rol');";
    $result = mysqli_query($conn, $query);
    if (mysqli_error($conn)) {
        echo "Error: ". mysqli_error($conn);
    } else {
        $_SESSION['message'] = 'Usuario creado correctamente';
        $_SESSION['message_type'] = 'success';
        header("Location: index.php");
    }
}
?>