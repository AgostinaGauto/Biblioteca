<?php
include("../connection.php");

$sql= "SELECT * FROM libro WHERE estado= 'En biblioteca'";
$result= mysqli_query($connection, $sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar reparación</title>
</head>
<body>

    <h1>Registrar reparación</h1>

    <form action="../repair/processRepair.php" method="post">
        <label>Fecha de ingreso:</label>
        <input type="date" name="fingreso" required><br><br>

        <label>Motivo:</label>
        <input type="text" name="motivo" required><br><br>

        <label>Fecha de egreso:</label>
        <input type="date" name="fegreso"><br><br>

        <label>Libro:</label>
        <select name="cod_libro">
            <option value="">---Seleccione una opción---</option>
            <?php while($row= mysqli_fetch_assoc($result)){
                echo "<option value= {$row['cod_libro']}>{$row['titulo']}</option>";
            } ?>
        </select><br><br>

        <button type="submit">Enviar</button>
    </form><br>

    <a href="../../pages/menu.html">Volver</a>
    
</body>
</html>