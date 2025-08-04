<?php
include("../connection.php");

$cod_prestamo= $_POST['cod_prestamo'];
$cod_libro= $_POST['cod_libro'];
$observacion= $_POST['observacion'];

$sql= "INSERT INTO detalleprestamo(cod_prestamo, cod_libro, observacion)
VALUES('$cod_prestamo', '$cod_libro', '$observacion')";
$result= mysqli_query($connection, $sql);

$sql= "UPDATE libro SET estado= 'Prestado' WHERE cod_libro= '$cod_libro'";
$result2= mysqli_query($connection, $sql);

if($result){
    echo "Se ha registrado el detalle de prestamo.";
    echo "<br><a href= '../../pages/menu.html'>Volver</a>";

}else{
    echo "Error: ".mysqli_error($connection);
    echo "<br><a href= '../../pages/menu.html'>Volver</a>";
}

?>