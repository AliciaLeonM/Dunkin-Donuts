<?php include("conexiondb.php")?>

<?php include("../includes/header.php") ?>
    
<div class="container p-4">
    <div class="row">

<div class="col-md-4">

    <?php if(isset($_SESSION['message'])) {?>

        <div class="alert alert-dark alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>    
        <?php session_unset(); } ?>

    <div class="card card-body">
        <form action="guardar.php" method="POST">
        <div class="form-group">
            <input type="text" name="producto" class="form-control" placeholder="Escribe el producto" autofocus>
    </div>
    <div class="form-group">
    <textarea name="precio" rows="2" class="form-control" placeholder="Inserta el precio"></textarea>
    </div>
    <input type="submit" class="btn btn-success btn-block" name="save_task" value="Insertar Producto">
</form>
    
</div>

</div>

        <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Productos</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        
                        $query = "SELECT * FROM productos";
                        $result_task = mysqli_query($conexion, $query);

                        while($row = mysqli_fetch_array($result_task)) {  ?>
                            <tr>
                                    <td><?php echo $row['producto'] ?></td>
                                    <td><?php echo $row['precio'] ?></td>
                                    <td>
                                        <a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                            Editar
                                        </a>
                                        <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                            Eliminar
                                        </a>
                                    </td>
                            </tr>

                        <?php }  ?>
                     </tbody>    
                </table>
</div>
    </div>
</div>

<?php include("../includes/footer.php") ?>