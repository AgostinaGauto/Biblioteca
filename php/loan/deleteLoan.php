<?php
include("../connection.php");

$cod_prestamo= $_GET['cod_prestamo'];
$sql= "SELECT * FROM detalleprestamo WHERE cod_prestamo= '$cod_prestamo'";
$result= mysqli_query($connection, $sql);
$amount= mysqli_num_rows($result);

if($amount >= 1){
    echo "No se puede eliminar un prestamo asociado a un detalle.";
    echo "<br><a href= '../loan/loanList.php'>Volver</a>";
    

}else{
    $sql= "DELETE FROM prestamo WHERE cod_prestamo= '$cod_prestamo'";
    $result2= mysqli_query($connection, $sql);

    if($result2){
        echo "Se ha eliminado el prestamo.";
        echo "<br><a href= '../loan/loanList.php'>Volver</a>";

    }else{
        echo "Error: ".mysqli_error($connection);
        echo "<br><a href= '../loan/loanList.php'>Volver</a>";
    }
}

?>