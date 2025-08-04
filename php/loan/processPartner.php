<?php
include("../connection.php");

$cod_socio= $_POST['cod_socio'];
$fecha_prestamo= $_POST['fecha_prestamo'];
$fecha_devolucion= $_POST['fecha_devolucion'];
$estado= $_POST['estado'];

$sql= "INSERT INTO prestamo(cod_socio, fecha_prestamo, fecha_devolucion, estado)
VALUES('$cod_socio', '$fecha_prestamo', '$fecha_devolucion', '$estado')";
$result= mysqli_query($connection, $sql);

if($result){
    echo "Se ha registrado el prestamo.";
    echo "<br><a href= '../../pages/menu.html'>Volver al menú</a>";

}else{
    echo "Error: ".mysqli_error($connection);
    echo "<br><a href= '../../pages/menu.html'>Volver al menú</a>";
}

?>