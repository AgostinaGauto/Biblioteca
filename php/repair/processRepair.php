<?php
include("../connection.php");

$fingreso= $_POST['fingreso'];
$motivo= $_POST['motivo'];
$fegreso= $_POST['fegreso'];
$cod_libro= $_POST['cod_libro'];

$sql= "INSERT INTO reparacion(fingreso, motivo, fegreso, cod_libro)
VALUES('$fingreso', '$motivo', '$fegreso', '$cod_libro')";
$result= mysqli_query($connection, $sql);

$sql= "UPDATE libro SET estado= 'En reparacion' WHERE cod_libro= '$cod_libro'";
$result2= mysqli_query($connection, $sql);

if($result){
    echo "Se ha registrado la reparación.";
    echo "<br><a href= '../../pages/menu.html'>Volver</a>";

}else{
    echo "Error: "-mysqli_error($connection);
    echo "<br><a href= '../../pages/menu.html'>Volver</a>";
}

?>