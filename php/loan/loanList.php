<?php
include("../connection.php");

$sql= "SELECT * FROM prestamo";
$result= mysqli_query($connection, $sql);
$amount= mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar prestamos</title>
</head>
<body>
    <h1>Listado de prestamos</h1>

    <?php if($amount >= 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Socio</th>
                    <th>Fecha de prestamo</th>
                    <th>Fecha de devolución</th>
                    <th>Estado</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php while($loan= mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $loan['cod_prestamo'] ?></td>
                        <td><?php echo $loan['cod_socio'] ?></td>
                        <td><?php echo $loan['fecha_prestamo'] ?></td>
                        <td><?php echo $loan['fecha_devolucion'] ?></td>
                        <td><?php echo $loan['estado'] ?></td>
                        <td><a href="../loan/modifyLoan.php?cod_prestamo=<?php echo $loan['cod_prestamo'] ?>">Modificar</a></td>
                        <td><a href="../loan/deleteLoan.php?cod_prestamo=<?php echo $loan['cod_prestamo'] ?>">Eliminar</a></td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table><br>

    <?php endif ?>
    <a href="../../pages/menu.html">Volver</a>
</body>
</html>