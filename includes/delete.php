<?php

include("conexiondb.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM productos WHERE id = $id";
    $result = mysqli_query($conexion, $query);
    if (!$result) {
        die("Query Failed");
    }

    $_SESSION['message'] = 'Producto removido satisfactoriamente';
    $_SESSION['message_type'] = 'danger';
    header("Location: index.php");

}

?>