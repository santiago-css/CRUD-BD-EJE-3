<?php
include("database/db.php"); // Incluimos la conexión a la base de datos

// Verificamos si se ha enviado el formulario de login
if (isset($_POST['login'])) {
    // Obtenemos los datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consultamos la base de datos para verificar si el usuario existe
    $query = "SELECT * FROM Tab_User WHERE Use_Email = '$email' AND Use_Password = '$password'";
    $result = mysqli_query($conn, $query);

    // Verificamos si se encontró el usuario en la base de datos
    if (mysqli_num_rows($result) == 1) {
        // Iniciamos la sesión y redirigimos al usuario a la página de productos
        session_start();
        $row = mysqli_fetch_array($result);
        $_SESSION['Use_Id'] = $row['Use_Id'];
        header("Location: Tab_Comprar.php");
        exit();
    } else {
        // Si el usuario no existe, mostramos un mensaje de error
        $error_message = "Usuario o contraseña incorrectos.";
    }
}
?>
<!-- HTML del formulario de login -->

<?php include("includes/header.php"); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Iniciar sesión</h2>
            <?php
            // Mostramos el mensaje de error si existe
            if (isset($error_message)) {
                echo '<div class="alert alert-danger">' . $error_message . '</div>';
            }
            ?>
            <form method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" name="login" class="btn btn-primary">Ingresar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>