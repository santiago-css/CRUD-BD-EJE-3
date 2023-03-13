<div class="container py-5">
    <div class="row">
        <!-- Formulario para crear usuarios -->
        <?php
        if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'];?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php session_unset();} ?>

        <div class="col-md-6">
            <h2 class="text-center mb-4">Crear usuario</h2>
            <form action="create_user.php" method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre completo</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="rol" class="form-label">Rol</label>
                    <select class="form-control" id="rol" name="rol" required>
                        <option value="">Selecciona un rol</option>
                        <option value="1">Administrador</option>
                        <option value="2">Cliente</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="create_user" value="Crearte User">Crear
                    usuario</button>
            </form>
        </div>
        <!-- Formulario para crear productos -->
        <?php
        if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'];?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php session_unset();} ?>
        <div class="col-md-6">
            <h2 class="text-center mb-4">Crear producto</h2>
            <form action="create_product.php" method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del producto</label>
                    <input type="text" class="form-control" id="nombre" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="cost" name="cost" step="0.01" required>
                </div>
                <button type="submit" class="btn btn-primary" name="create_product" value="Crearte Product">Crear
                    producto</button>
            </form>
        </div>
    </div>
</div>