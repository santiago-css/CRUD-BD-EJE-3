<?php
include('database/db.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM Tab_Product WHERE Pro_Id =$id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $name = $row['Pro_Name'];
        $description = $row['Pro_Description'];
        $cost = $row['Pro_Cost'];
    }
}

if (isset($_POST['edit_product'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $cost = $_POST['cost'];
    $query = "UPDATE Tab_Product SET Pro_Name = '$name', Pro_Description = '$description', Pro_Cost = '$cost' WHERE Pro_Id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_error($conn)) {
        echo "Error: ". mysqli_error($conn);
    } else {
        $_SESSION['message'] = 'Producto actualizado correctamente';
        $_SESSION['message_type'] = 'info';
        header("Location: index.php");
    }
}
?>
<?php include("includes/header.php"); ?>

<div class="container py-5">
    <div class="row">
        <!-- Formulario para editar productos -->
        <div class="col-md-12">
            <h2 class="text-center mb-4">Crear producto</h2>
            <form action="edit_product.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del producto</label>
                    <input type="text" class="form-control" id="nombre" name="name" value="<?= $name ?>"
                        required>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="description" rows="4"
                        required><?= $description?></textarea>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="precio" name="cost" value="<?= $cost ?>"
                        step="0.01" required>
                </div>
                <button type="submit" class="btn btn-primary" name="edit_product"
                    value="Actualizar Product">Actualizar
                    producto</button>
            </form>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>