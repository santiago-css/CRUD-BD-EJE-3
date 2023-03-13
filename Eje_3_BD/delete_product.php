<?php
include('database/db.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM Tab_Product WHERE Pro_Id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_error($conn)) {
        echo "Error: ". mysqli_error($conn);
    } else {
        $_SESSION['message'] = 'Producto eliminado correctamente';
        $_SESSION['message_type'] = 'danger';
        header("Location: index.php");
    }
}
?>