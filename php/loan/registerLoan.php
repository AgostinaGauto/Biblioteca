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
    <title>Registrar prestamo</title>
</head>
<body>
    <h1>Registrar prestamo</h1>

    <form action="../loan/processPartner.php" method="post">
        <label>Socio:</label>
        <select name="cod_socio">
            <option value="">---Seleccione una opción---</option>
            <?php while($loan= mysqli_fetch_assoc($result)){
                echo "<option value= {$loan['cod_socio']}>{$loan['nomyape']}</option>";
            } ?>
        </select><br><br>

        <label>Fecha prestamo:</label>
        <input type="date" name="fecha_prestamo" required><br><br>

        <label>Fecha devolución:</label>
        <input type="date" name="fecha_devolucion"><br><br>

        <label>Estado:</label>
        <input type="text" name="estado" required><br><br>

        <button type="submit">Enviar</button>
    </form><br>

    <a href="../../pages/menu.html">Volver</a>
</body>
</html>