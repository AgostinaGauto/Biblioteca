<?php
include("../connection.php");

$cod_reparacion= $_GET['cod_reparacion'];
$sql= "SELECT * FROM reparacion WHERE cod_reparacion= '$cod_reparacion'";
$result= mysqli_query($connection, $sql);
$repair= mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar reparación</title>
</head>
<body>
    <h1>Modificar reparación</h1>

    <form action="../repair/saveChanges.php" method="post">
        <input type="hidden" name="cod_reparacion" value="<?php echo $repair['cod_reparacion'] ?>">

        <label>Fecha de egreso:</label>
        <input type="date" name="fegreso" value="<?php echo $repair['fegreso'] ?>"><br><br>

        <label>Estado:</label>
        <input type="text" name="estado"><br><br>

        <button type="submit">Enviar</button>
    </form><br>

    <a href="../repair/repairList.php">Volver</a>
</body>
</html>