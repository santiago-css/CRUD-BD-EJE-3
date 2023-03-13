<?php
include('database/db.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM Tab_User WHERE Use_Id =$id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $name = $row['Use_Name'];
        $email = $row['Use_Email'];
        $password = $row['Use_Password'];
        $rol = $row['Use_Id_Rol'];
    }
}

if (isset($_POST['edit_user'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];
    $query = "UPDATE Tab_User SET Use_Name = '$name', Use_Email = '$email', Use_Password = '$password', Use_Id_Rol = '$rol' WHERE Use_Id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_error($conn)) {
        echo "Error: " . mysqli_error($conn);
    } else {
        $_SESSION['message'] = 'Usuario actualizado correctamente';
        $_SESSION['message_type'] = 'success';
        header("Location: index.php");
    }
}
?>
<?php include("includes/header.php"); ?>

<div class="container py-5">
    <div class="row">
        <!-- Formulario para crear usuarios -->
        <div class="col-md-12">
            <h2 class="text-center mb-4">Crear usuario</h2>
            <form action="edit_user.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre completo</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>"
                        required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $password ?>"required>
                </div>
                <div class="mb-3">
                    <label for="rol" class="form-label">Rol</label>
                    <select class="form-control" id="rol" name="rol" required>
                        <option value="">Selecciona un rol</option>
                        <option value="1" <?php if ($rol == 1)
                            echo 'selected'; ?>>Administrador</option>
                        <option value="2" <?php if ($rol == 2)
                            echo 'selected'; ?>>Cliente</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="edit_user" value="Editar usuario">Editar
                    usuario</button>
            </form>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>