<?php
include("../connection.php");

$cod_prestamo= $_POST['cod_prestamo'];
$cod_libro= $_POST['cod_libro'];
$fecha_devolucion= $_POST['fecha_devolucion'];
$estado= $_POST['estado'];

$sql= "UPDATE prestamo SET fecha_devolucion= '$fecha_devolucion'
WHERE cod_prestamo= '$cod_prestamo'";
$result= mysqli_query($connection, $sql);

$sql= "UPDATE libro SET estado= '$estado'
WHERE cod_libro= '$cod_libro'";
$result2= mysqli_query($connection, $sql);

if($result){
    if($result2){
        echo "Se ha modificado la fecha de devolución y el estado.";
        echo "<br><a href= '../../pages/menu.html'>Volver</a>";

    }else{
        echo "Error: ".mysqli_error($connection);
        echo "<br><a href= '../../pages/menu.html'>Volver</a>";
    }

}else{
    echo "Error: ".mysqli_error($connection);
    echo "<br><a href= '../../pages/menu.html'>Volver</a>";
}
?>