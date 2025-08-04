<?php
include("../connection.php");

$cod_prestamo= $_GET['cod_prestamo'];
$sql= "SELECT * FROM prestamo WHERE cod_prestamo= '$cod_prestamo'";
$result= mysqli_query($connection, $sql);
$row= mysqli_fetch_assoc($result);

$sql= "SELECT * FROM socio";
$result2= mysqli_query($connection, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar prestamo</title>
</head>
<body>
    <h1>Modificar prestamo</h1>

    <form action="../loan/saveChanges.php" method="post">
        <input type="hidden" name="cod_prestamo" value="<?php echo $row['cod_prestamo'] ?>">

        <label>Socio:</label>
        <select name="cod_socio">
            <option value="<?php echo $row['cod_socio'] ?>">---Seleccione una opción---</option>
            <?php while($partner= mysqli_fetch_assoc($result2)){
                echo "<option value= {$partner['cod_socio']}>{$partner['nomyape']}</option>";
            } ?>
        </select><br><br>

        <label>Fecha prestamo:</label>
        <input type="date" name="fecha_prestamo" value="<?php echo $row['fecha_prestamo'] ?>"><br><br>

        <label>Fecha devolución:</label>
        <input type="date" name="fecha_devolucion" value="<?php echo $row['fecha_devolucion'] ?>"><br><br>

        <label>Estado:</label>
        <input type="text" name="estado" value="<?php echo $row['estado'] ?>"><br><br>

        <button type="submit">Enviar</button>
    </form><br>

    <a href="../loan/loanList.php">Volver</a>
</body>
</html>