<?php include("database/db.php"); ?>

<?php include("includes/header.php"); ?>
<div class="container py-5">
    <div class="row">
    <?php
        if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'];?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php session_unset();} ?>
        <div class="col-md-12">
            <h2>Productos disponibles</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>SKU</th>
                        <th>Producto</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        $query = "SELECT * FROM Tab_Product";
                        $result_product = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result_product)) { ?>
                                <tr>
                                    <td><?php echo $row['Pro_Id'];?></td>
                                    <td><?php echo $row['Pro_Name'];?></td>
                                    <td><?php echo $row['Pro_Description'];?></td>
                                    <td><?php echo $row['Pro_Cost'];?></td>
                                    <td>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md">
                                            <a href="comprar.php?id=<?php echo $row['Pro_Id']?>"class="btn btn-success btn-md">
                                            <i class="fa-sharp fa-solid fa-cart-shopping"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
        <?php include("includes/tabla_payment.php"); ?>
    </div>
</div>

<?php include("includes/footer.php"); ?>
