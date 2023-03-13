<div class="col-md-12">
    <h2>Comprar</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID de Pago</th>
                <th>ID de Usuario</th>
                <th>ID de Producto</th>
                <th>Fecha de Pago</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $query = "SELECT * FROM Tab_Payment";
            $result_payment = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result_payment)) { ?>
                        <tr>
                            <td><?php echo $row['Pay_Id'];?></td>
                            <td><?php echo $row['Pay_Id_Use'];?></td>
                            <td><?php echo $row['Pay_Id_Pro'];?></td>
                            <td><?php echo $row['Pay_Date'];?></td>
                        </tr>
                        <?php } ?>
        </tbody>
    </table>
</div>