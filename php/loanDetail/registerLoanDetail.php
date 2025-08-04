<?php
include("../connection.php");

$sql= "SELECT * FROM prestamo";
$result= mysqli_query($connection, $sql);

$sql= "SELECT * FROM libro WHERE estado= 'En biblioteca'";
$result2= mysqli_query($connection, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar detalle de prestamo</title>
</head>
<body>
    <h1>Registrar detalle de prestamo</h1>

    <form action="../loanDetail/processLoanDetail.php" method="post">
        <label>Prestamo:</label>
        <select name="cod_prestamo" required>
            <option value="">---Seleccione una opción---</option>
            <?php while($loan= mysqli_fetch_assoc($result)){
                echo "<option value= {$loan['cod_prestamo']}>{$loan['cod_prestamo']}</option>";
            } ?>
        </select><br><br>

        <label>Libro:</label>
        <select name="cod_libro" required>
            <option value="">---Seleccione una opción---</option>
            <?php while($book= mysqli_fetch_assoc($result2)){
                echo "<option value={$book['cod_libro']}>{$book['titulo']}</option>";
            } ?>
        </select><br><br>

        <label>Observación:</label>
        <input type="text" name="observacion" required><br><br>

        <button type="submit">Enviar</button>
    </form><br>

    <a href="../../pages/menu.html">Volver</a>
</body>
</html>