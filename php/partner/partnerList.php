<?php
include("../connection.php");

$sql= "SELECT * FROM socio";
$result= mysqli_query($connection, $sql);
$amount= mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar socios</title>
</head>
<body>
    <h1>Listado de socios</h1>

    <?php if($amount >= 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Fecha de nacimiento</th>
                    <th>Dirección</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php while($partner= mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $partner['cod_socio'] ?></td>
                        <td><?php echo $partner['nomyape'] ?></td>
                        <td><?php echo $partner['fnacimiento'] ?></td>
                        <td><?php echo $partner['direccion'] ?></td>
                        <td><?php echo $partner['telefono'] ?></td>
                        <td><?php echo $partner['email'] ?></td>
                        <td><a href="../partner/modifyPartner.php?cod_socio=<?php echo $partner['cod_socio'] ?>">Modificar</a></td>
                        <td><a href="../partner/deletePartner.php?cod_socio=<?php echo $partner['cod_socio'] ?>">Eliminar</a></td>
                    </tr>
                <?php endwhile ?> 
            </tbody>
        </table><br>

    <?php endif ?>
    <a href="../../pages/menu.html">Volver</a>
</body>
</html>