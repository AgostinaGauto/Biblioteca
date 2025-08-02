<?php 
include("../connection.php");

$cod_socio= $_GET['cod_socio'];
$sql= "SELECT * FROM prestamo WHERE cod_socio= '$cod_socio'";
$result= mysqli_query($connection, $sql);
$amount= mysqli_num_rows($result);

if($amount >= 1){
    echo "No se puede eliminar un socio asociado a un prestamo.";
    echo "<br><a href= '../partner/partnerList.php'>Volver</a>";

}else{
    $sql= "DELETE FROM socio WHERE cod_socio= '$cod_socio'";
    $resultDelete= mysqli_query($connection, $sql);

    if($resultDelete){
        echo "Se ha eliminado el socio.";
        echo "<br><a href= '../partner/partnerList.php'>Volver al listado</a>";

    }else{
        echo "Error: ".mysqli_error($connection);
        echo "<br><a href= '../../pages/menu.html'>Volver al menú</a>";
    }
}

?>