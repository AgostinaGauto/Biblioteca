<?php
include("../connection.php");

$nomyape= $_POST['nomyape'];
$fnacimiento= $_POST['fnacimiento'];
$direccion= $_POST['direccion'];
$telefono= $_POST['telefono'];
$email= $_POST['email'];

$sql= "INSERT INTO socio(nomyape, fnacimiento, direccion, telefono, email)
VALUES('$nomyape', '$fnacimiento', '$direccion', '$telefono', '$email')";
$result= mysqli_query($connection, $sql);

if($result){
    echo "Se ha registrado el socio.";
    echo "<br><a href= '../../pages/menu.html'>Volver</a>";

}else{
    echo "Error: ".mysqli_error($connection);
    echo "<br><a href= '../../pages/menu.html'>Volver</a>";
}

?>