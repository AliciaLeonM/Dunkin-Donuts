<?php
    include("conexiondb.php");
    
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM productos WHERE id = $id";
        $result = mysqli_query($conexion, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $producto = $row['producto'];
            $precio = $row['precio'];
        }

    }

    if(isset($_POST['Actualizar'])){
            $id = $_GET['id'];
            $producto = $_POST['producto'];
            $precio = $_POST['precio'];

            $query = "UPDATE productos SET producto = '$producto', precio = '$precio' WHERE id =$id";
            mysqli_query($conexion, $query);
           
           $_SESSION['message'] = 'Producto actualizado satisfactoriamente';
           $_SESSION['message_type'] = 'success';
            header("location: index.php");
        }

?>

<?php include("../includes/header.php") ?>

<div class="container p-4">
    <div class="row">
      <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar.php?id= <?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                            <input message_type="text" name="producto" value="<?php echo $producto; ?>" class="form-control" placeholder="Actualizar producto">
                    </div>
                    <div class="form-group">
                            <textarea name="precio" rows="2"class="form-control" placeholder="Actualizar precio"><?php echo $precio; ?></textarea>
                    </div>
                        <button class="btn btn-success" name="Actualizar">
                            Actualizar
                        </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("../includes/footer.php") ?>