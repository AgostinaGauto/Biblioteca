<?php
include("../connection.php");

$cod_socio= $_GET['cod_socio'];
$sql= "SELECT * FROM socio WHERE cod_socio= '$cod_socio'";
$result= mysqli_query($connection, $sql);
$partner= mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar socio</title>
</head>
<body>
    <h1>Modificar socio</h1>

    <form action="../partner/saveChanges.php" method="post">
        <input type="hidden" name="cod_socio" value="<?php echo $partner['cod_socio'] ?>">

        <label>Nombre:</label>
        <input type="text" name="nomyape" value="<?php echo $partner['nomyape'] ?>"><br><br>

        <label>Fecha de nacimiento:</label>
        <input type="date" name="fnacimiento" value="<?php echo $partner['fnacimiento'] ?>"><br><br>

        <label>Dirección:</label>
        <input type="text" name="direccion" value="<?php echo $partner['direccion'] ?>"><br><br>

        <label>Telefono:</label>
        <input type="number" name="telefono" value="<?php echo $partner['telefono'] ?>"><br><br>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $partner['email'] ?>"><br><br>

        <button type="submit">Enviar</button>
    </form><br>

    <a href="../partner/partnerList.php">Volver</a>
</body>
</html>