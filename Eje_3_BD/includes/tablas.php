<div class="container py-5">
    <div class="row">
        <div class="col-md-6 col-sm-12" >
            <h2>Usuarios</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM Tab_User";
                        $result_user = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_array($result_user)) { ?>
                                <tr>
                                    <td ><?php echo $row['Use_Id'];?></td>
                                    <td><?php echo $row['Use_Name'];?></td>
                                    <td><?php echo $row['Use_Email'];?></td>
                                    <td><?php echo $row['Use_Id_Rol'];?></td>
                                    <td >
                                        <div class="d-grid gap-2 d-md-flex justify-content-md">
                                            <a href="edit_user.php?id=<?php echo $row['Use_Id']?>" class="btn btn-dark btn-sm">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="delete_user.php?id=<?php echo $row['Use_Id']?>" class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-ban"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                        <?php } ?>
                </tbody>
            </table>

        </div>
        <div class="col-md-6 col-sm-12">
            <h2>Productos</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Costo</th>
                        <th scope="col">Acciones</th>
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
                                            <a href="edit_product.php?id=<?php echo $row['Pro_Id']?>"class="btn btn-dark btn-sm">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="delete_product.php?id=<?php echo $row['Pro_Id']?>"class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-ban"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                        <?php } ?>
                    <!-- Más filas aquí -->
                </tbody>
            </table>
        </div>
    </div>
</div>