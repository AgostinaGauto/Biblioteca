<?php
include("../connection.php");

$cod_reparacion= $_GET['cod_reparacion'];

$sql= "SELECT * FROM reparacion WHERE cod_reparacion= '$cod_reparacion'";
$result= mysqli_query($connection, $sql);
$repair= mysqli_fetch_assoc($result);
$bookCode= $repair['cod_libro'];

$sql= "UPDATE libro SET estado= 'En biblioteca' WHERE cod_libro= '$bookCode'";
$result2= mysqli_query($connection, $sql);

$sql= "DELETE FROM reparacion WHERE cod_reparacion= '$cod_reparacion'";
$result3= mysqli_query($connection, $sql);

if($result3){
    echo "Se ha eliminado la reparación.";
    echo "<br><a href= '../repair/repairList.php'>Volver al listado</a>";

}else{
    echo "Error: ".mysqli_error($connection);
    echo "<br><a href= '../repair/repairList.php'>Volver al listado</a>";
}

?>