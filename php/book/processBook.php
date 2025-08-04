<?php
include("../connection.php");

$titulo= $_POST['titulo'];
$editorial= $_POST['editorial'];
$fedicion= $_POST['fedicion'];
$idioma= $_POST['idioma'];
$cantpaginas= $_POST['cantpaginas'];
$estado= $_POST['estado'];

$sql= "INSERT INTO libro(titulo, editorial, fedicion, idioma, cantpaginas, estado)
VALUES('$titulo', '$editorial', '$fedicion', '$idioma', '$cantpaginas', '$estado')";
$result= mysqli_query($connection, $sql);

if($result){
    echo "Se ha registrado el libro.";
    echo "<br><a href= '../../pages/menu.html'>Volver</a>";

}else{
    echo "Error: ".mysqli_error($connection);
    echo "<br><a href= '../../pages/menu.html'>Volver</a>";
}

?>