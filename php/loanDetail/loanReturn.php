<?php
include("../connection.php");

$sql= "SELECT p.cod_prestamo, p.fecha_devolucion, l.*
FROM prestamo p 
INNER JOIN detalleprestamo dp ON p.cod_prestamo= dp.cod_prestamo
INNER JOIN libro l ON dp.cod_libro= l.cod_libro
WHERE l.estado= 'Prestado'";
$result= mysqli_query($connection, $sql);
$amount= mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devolución prestamo</title>
</head>
<body>
    <h1>Libros prestados</h1>

    <?php if($amount >= 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Titulo</th>
                    <th>Editorial</th>
                    <th>Fecha edición</th>
                    <th>Idioma</th>
                    <th>Cantidad de páginas</th>
                    <th>Estado</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php while($row= mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['cod_libro'] ?></td>
                        <td><?php echo $row['titulo'] ?></td>
                        <td><?php echo $row['editorial'] ?></td>
                        <td><?php echo $row['fedicion'] ?></td>
                        <td><?php echo $row['idioma'] ?></td>
                        <td><?php echo $row['cantpaginas'] ?></td>
                        <td><?php echo $row['estado'] ?></td>
                        <td><a href="../loanDetail/modifyLoanReturn.php?cod_libro=<?php echo $row['cod_libro'] ?>&cod_prestamo=<?php echo $row['cod_prestamo'] ?>">Modificar</a></td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table><br>
    
    <?php endif ?>

    <a href="../../pages/menu.html">Volver</a>

</body>
</html>