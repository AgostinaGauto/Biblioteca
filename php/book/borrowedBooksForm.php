<?php
include("../connection.php");

$sql= "SELECT * FROM socio";
$result= mysqli_query($connection, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIstado de libros prestados según socio</title>
</head>
<body>
    <h1>Seleccione un socio</h1>

    <form action="../book/borrowedBooksList.php" method="post">
        <label>Socio:</label>
        <select name="cod_socio">
            <option value="">---Seleccione una opción---</option>
            <?php while($partner= mysqli_fetch_assoc($result)){
                echo "<option value= {$partner['cod_socio']}>{$partner['nomyape']}</option>";

            } ?>
        </select><br><br>

        <button type="submit">Enviar</button>
    </form><br>

    <a href="../../pages/menu.html">Volver</a>
</body>
</html>