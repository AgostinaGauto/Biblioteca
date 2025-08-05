<?php
include("../connection.php");

$sql= "SELECT s.cod_socio, s.nomyape, p.*, l.cod_libro, l.titulo
FROM socio s
INNER JOIN prestamo p ON s.cod_socio= p.cod_socio
INNER JOIN detalleprestamo dp ON p.cod_prestamo= dp.cod_prestamo
INNER JOIN libro l ON dp.cod_libro= l.cod_libro
WHERE p.fecha_devolucion= '0000-00-00'";
$result= mysqli_query($connection, $sql);
$amount= mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de prestamos no devolver</title>
</head>
<body>
    <h1>Listado de prestamos no devueltos</h1>

    <?php if($amount >= 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Código socio</th>
                    <th>Nombre</th>
                    <th>Código prestamo</th>
                    <th>Fecha de prestamo</th>
                    <th>Fecha de devolución</th>
                    <th>Estado</th>
                    <th>Código libro</th>
                    <th>Titulo</th>
                </tr>
            </thead>

            <tbody>
                <?php while($row= mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['cod_socio'] ?></td>
                        <td><?php echo $row['nomyape'] ?></td>
                        <td><?php echo $row['cod_prestamo'] ?></td>
                        <td><?php echo $row['fecha_prestamo'] ?></td>
                        <td><?php echo $row['fecha_devolucion'] ?></td>
                        <td><?php echo $row['estado'] ?></td>
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