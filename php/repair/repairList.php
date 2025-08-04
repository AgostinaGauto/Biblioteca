<?php
include("../connection.php");

$sql= "SELECT * FROM reparacion WHERE fegreso= '0000-00-00'";
$result= mysqli_query($connection, $sql);
$amount= mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar reparaciones</title>
</head>
<body>
    <h1>Listado de reparaciones</h1>

    <?php if($amount >= 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Fecha de ingreso</th>
                    <th>Motivo</th>
                    <th>Fecha de egreso</th>
                    <th>Libro</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php while($row= mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['cod_reparacion'] ?></td>
                        <td><?php echo $row['fingreso'] ?></td>
                        <td><?php echo $row['motivo'] ?></td>
                        <td><?php echo $row['fegreso'] ?></td>
                        <td><?php echo $row['cod_libro'] ?></td>
                        <td><a href="../repair/modifyRepair.php?cod_reparacion=<?php echo $row['cod_reparacion'] ?>">Modificar</a></td>
                        <td><a href="../repair/deleteRepair.php?cod_reparacion=<?php echo $row['cod_reparacion'] ?>">Eliminar</a></td>
                    </tr>

                <?php endwhile ?>
            </tbody>
        </table><br>

    <?php endif ?>
    <a href="../../pages/menu.html">Volver</a>
</body>
</html>
