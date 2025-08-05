<?php
include("../connection.php");

$sql= "SELECT r.*, l.*
FROM reparacion r
INNER JOIN libro l ON r.cod_libro= l.cod_libro
WHERE r.fegreso= '0000-00-00'";
$result= mysqli_query($connection, $sql);
$amount= mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de reparaciones sin fecha de egreso</title>
</head>
<body>
    <h1>Listado de reparaciones sin fecha de egereso</h1>

    <?php if($amount >= 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Fecha de ingreso</th>
                    <th>Motivo</th>
                    <th>Fecha de egreso</th>
                    <th>Código libro</th>
                    <th>Titulo</th>
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
                        <td><?php echo $row['titulo'] ?></td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table><br>

    <?php endif ?>
    <a href="../../pages/menu.html">Volver</a>
    
</body>
</html>