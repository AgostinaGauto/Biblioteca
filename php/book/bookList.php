<?php
include("../connection.php");

$sql= "SELECT * FROM libro";
$result= mysqli_query($connection, $sql);
$amount= mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar libros</title>
</head>
<body>
    <h1>Listado de libros</h1>

    <?php if($amount >= 1): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Titulo</th>
                    <th>Editorial</th>
                    <th>Fecha edición</th>
                    <th>Idioma</th>
                    <th>Cantidad páginas</th>
                    <th>Estado</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php while($row= mysqli_fetch_assoc($result)): ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['cod_libro'] ?></td>
                            <td><?php echo $row['titulo'] ?></td>
                            <td><?php echo $row['editorial'] ?></td>
                            <td><?php echo $row['fedicion'] ?></td>
                            <td><?php echo $row['idioma'] ?></td>
                            <td><?php echo $row['cantpaginas'] ?></td>
                            <td><?php echo $row['estado'] ?></td>
                            <td><a href="../book/modifyBook.php?cod_libro=<?php echo $row['cod_libro'] ?>">Modificar</a></td>
                            <td><a href="../book/deleteBook.php?cod_libro=<?php echo $row['cod_libro'] ?>">Eliminar</a></td>
                        </tr>
                    </tbody>
                <?php endwhile ?>
            </tbody>
        </table><br>
    
    <?php endif ?>   
    <a href="../../pages/menu.html">Volver</a>
</body>
</html>