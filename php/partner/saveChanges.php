<?php
include("../connection.php");

$cod_socio= $_POST['cod_socio'];
$nomyape= $_POST['nomyape'];
$fnacimiento= $_POST['fnacimiento'];
$direccion= $_POST['direccion'];
$telefono= $_POST['telefono'];
$email= $_POST['email'];

$sql= "UPDATE socio SET nomyape= '$nomyape', fnacimiento= '$fnacimiento', direccion= '$direccion',
telefono= '$telefono', email= '$email' WHERE cod_socio= '$cod_socio'";
$result= mysqli_query($connection, $sql);

if($result){
    echo "Se ha modificado el socio.";
    echo "<br><a href= '../partner/partnerList.php'>Volver al listado<a>";

}else{
    echo "Error: ".mysqli_error($connection);
    echo "<br><a href= '../../pages/menu.html'>Volver</a>";
}


?>