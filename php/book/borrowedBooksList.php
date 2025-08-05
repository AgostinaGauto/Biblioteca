<?php
include("../connection.php");

$cod_socio= $_POST['cod_socio'];
$sql= "SELECT l.*
FROM libro l
INNER JOIN detalleprestamo dp ON l.cod_libro= dp.cod_libro
INNER JOIN prestamo p ON dp.cod_prestamo= p.cod_prestamo
INNER JOIN socio s ON p.cod_socio= s.cod_socio
WHERE s.cod_socio= '$cod_socio' AND l.estado= 'Prestado'";
$result= mysqli_query($connection, $sql);
$amount= mysqli_num_rows($result);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIstado de libros prestado según socio</title>
</head>
<body>
    <h1>Listado de libros prestados</h1>

    <?php if($amount >= 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Titulo</th>
                    <th>Editorial</th>
                    <th>Fecha de edición</th>
                    <th>Idioma</th>
                    <th>Cantidad de páginas</th>
                    <th>Estado</th>
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
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table><br>

    <?php endif ?>
    <a href="../book/borrowedBooksForm.php">Volver</a>
</body>
</html>