<?php
include("../connection.php");

$cod_prestamo= $_POST['cod_prestamo'];
$cod_socio= $_POST['cod_socio'];
$fecha_prestamo= $_POST['fecha_prestamo'];
$fecha_devolucion= $_POST['fecha_devolucion'];
$estado= $_POST['estado'];

$sql= "UPDATE prestamo SET cod_socio= '$cod_socio', fecha_prestamo= '$fecha_prestamo',
fecha_devolucion= '$fecha_devolucion', estado= '$estado' WHERE cod_prestamo= '$cod_prestamo'";
$result= mysqli_query($connection, $sql);

if($result){
    echo "Se ha modificado el prestamo.";
    echo "<br><a href= '../loan/loanList.php'>Volver</a>";

}else{
    echo "Error: ".mysqli_error($connection);
    echo "<br><a href= '../loan/loanList.php'>Volver</a>";
}
?>