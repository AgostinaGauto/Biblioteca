<?php
include("../connection.php");

$cod_libro= $_GET['cod_libro'];
$sql= "SELECT * FROM detalleprestamo WHERE cod_libro= '$cod_libro'";
$result= mysqli_query($connection, $sql);
$amount= mysqli_num_rows($result);

$sql= "SELECT * FROM reparacion WHERE cod_libro= '$cod_libro'";
$result2= mysqli_query($connection, $sql);
$amount2= mysqli_num_rows($result2);

if($amount == 0){
    if($amount2 >= 1){
        echo "No se puede eliminar un libro asociado a una reparación.";
        echo "<br><a href= '../book/bookList.php'>Volver</a>";

    }else{
        $sql= "DELETE FROM libro WHERE cod_libro= '$cod_libro'";
        $result3= mysqli_query($connection, $sql);

        if($result3){
            echo "Se ha eliminado el libro.";
            echo "<br><a href= '../book/bookList.php'>Volver al listado</a>";

        }else{
            echo "Error: ".mysqli_error($connection);
            echo "<br><a href= '../book/bookList.php'>Volver al listado</a>";
        }

    }

}else{
    echo "No se puede eliminar un libro asociado a un detalle de prestamo.";
    echo "<br><a href= '../book/bookList.php'>Volver</a>";
}

?>