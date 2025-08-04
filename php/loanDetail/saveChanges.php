<?php
include("../connection.php");

$cod_detalle= $_POST['cod_detalle'];
$cod_libro= $_POST['cod_libro'];
$observacion= $_POST['observacion'];

$sql= "UPDATE libro SET estado= 'Prestado' WHERE cod_libro= '$cod_libro'";
$result= mysqli_query($connection, $sql);

$sql= "UPDATE detalleprestamo SET cod_libro= '$cod_libro', observacion= '$observacion'
WHERE cod_detalle= '$cod_detalle'";
$result2= mysqli_query($connection, $sql);

if($result2){
    echo "Se ha modificado el detalle de prestamo.";
    echo "<br><a href= '../loanDetail/loanDetailList.php'>Volver</a>";

}else{
    echo "Error: ".mysqli_error($connection);
    echo "<br><a href= '../loanDetail/loanDetailList.php'>Volver</a>";
}

?>