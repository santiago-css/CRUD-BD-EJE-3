<?php
include('database/db.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM Tab_User WHERE Use_Id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_error($conn)) {
        echo "Error: ". mysqli_error($conn);
    } else {
        $_SESSION['message'] = 'Usuario eliminado correctamente';
        $_SESSION['message_type'] = 'danger';
        header("Location: index.php");
    }
}
?>