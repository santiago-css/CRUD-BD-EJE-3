<?php
session_start(); // Iniciar la sesión

include("database/db.php");

// Paso 1: Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['Use_Id'])) {
    header("Location: login.php");
    exit();
}

// Paso 2: Recuperar el ID del producto de la URL
$pro_id = $_GET['id'];

// Paso 3: Insertar el registro de pago
$use_id = $_SESSION['Use_Id'];
$query = "INSERT INTO Tab_Payment (Pay_Id_Use, Pay_Id_Pro) VALUES ($use_id, $pro_id)";
$result = mysqli_query($conn, $query);
if (mysqli_error($conn)) {
    echo "Error: " . mysqli_error($conn);
} else {
    $_SESSION['message'] = 'Producto comprado correctamente';
    $_SESSION['message_type'] = 'success';
    if (isset($_SESSION['Use_Id'])) { // Verificar si la sesión existe antes de la redirección
        header("Location: Tab_Comprar.php");
        exit();
    }
}
?>