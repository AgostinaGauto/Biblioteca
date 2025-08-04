<?php
include("../connection.php");

$cod_detalle= $_GET['cod_detalle'];

$sql= "SELECT p.*
FROM prestamo p
INNER JOIN detalleprestamo dp ON p.cod_prestamo= dp.cod_prestamo
WHERE dp.cod_detalle= '$cod_detalle' AND p.fecha_devolucion IS NULL";
$result= mysqli_query($connection, $sql);
$amount= mysqli_num_rows($result);

if($amount >= 1){
    echo "No se puede eliminar un prestamo vigente.";
    echo "<br><a href= '../loanDetail/loanDetailList.php'>Volver</a>";


}else{
    $sql= "DELETE FROM detalleprestamo WHERE cod_detalle= '$cod_detalle'";
    $result2= mysqli_query($connection, $sql);

    if($result2){
        echo "Se ha eliminado el detalle de prestamo.";
        echo "<br><a href= '../loanDetail/loanDetailList.php'>Volver al listado</a>";

    }else{
        echo "Error: ".mysqli_error($connection);
        echo "<br><a href= '../loanDetail/loanDetailList.php'>Volver al listado</a>";
    }
}
?>