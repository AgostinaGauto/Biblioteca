<?php
include("../connection.php");

$cod_reparacion= $_POST['cod_reparacion'];
$fegreso= $_POST['fegreso'];

$sql= "UPDATE reparacion SET fegreso= '$fegreso' WHERE cod_reparacion= '$cod_reparacion'";
$result= mysqli_query($connection, $sql);

$sql= "SELECT * FROM reparacion WHERE cod_reparacion= '$cod_reparacion'";
$result2= mysqli_query($connection, $sql);
$repair= mysqli_fetch_assoc($result2);
$bookCode= $repair['cod_libro'];

$sql= "UPDATE libro SET estado= 'En biblioteca' WHERE cod_libro= '$bookCode'";
$result3= mysqli_query($connection, $sql);

if($result){
    echo "Se ha modificado la reparacion.";
    echo "<br><a href= '../repair/repairList.php'>Volver al listado</a>";

}else{
    echo "Error: ".mysqli_error($connection);
    echo "<br><a href= '../repair/repairList.php'>Volver al listado</a>";

}

?>