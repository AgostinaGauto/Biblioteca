<?php
include("../connection.php");

$sql= "SELECT * FROM detalleprestamo";
$result= mysqli_query($connection, $sql);
$amount= mysqli_num_rows($result);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar detalle de prestamo</title>
</head>
<body>
    <h1>Listado de detalles de prestamos</h1>

    <?php if($amount >= 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Prestamo</th>
                    <th>Libro</th>
                    <th>Observación</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php while($row= mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['cod_detalle'] ?></td>
                        <td><?php echo $row['cod_prestamo'] ?></td>
                        <td><?php echo $row['cod_libro'] ?></td>
                        <td><?php echo $row['observacion'] ?></td>
                        <td><a href="../loanDetail/modifyLoanDetail.php?cod_detalle=<?php echo $row['cod_detalle'] ?>">Modificar</a></td>
                        <td><a href="../loanDetail/deleteLoanDetail.php?cod_detalle=<?php echo $row['cod_detalle'] ?>">Eliminar</a></td>
                    </tr>

                <?php endwhile ?>
            </tbody>
        </table><br>

    <?php endif ?>
    <a href="../../pages/menu.html">Volver</a>
</body>
</html>