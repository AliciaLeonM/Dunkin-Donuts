<?php 

include("conexiondb.php");

if (isset($_POST['save_task'])){
    $producto = $_POST['producto'];
    $precio = $_POST['precio'];

    $query = "INSERT INTO productos(producto, precio) VALUES ('$producto', '$precio')";
    $result =  mysqli_query($conexion, $query);
    if(!$result) {
    
    die("Query Falló");
}

    $_SESSION['message'] = 'Producto guardado satisfactoriamente';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");
}

?>