<?php
include("../connection.php");

$estado= $_POST['estado'];
$sql= "SELECT * FROM libro WHERE estado= '$estado'";
$result= mysqli_query($connection, $sql);
$amount= mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de libros por estado</title>
</head>
<body>
    <h1>Listado de libros por estado</h1>

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
                <?php while($book= mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $book['cod_libro'] ?></td>
                        <td><?php echo $book['titulo'] ?></td>
                        <td><?php echo $book['editorial'] ?></td>
                        <td><?php echo $book['fedicion'] ?></td>
                        <td><?php echo $book['idioma'] ?></td>
                        <td><?php echo $book['cantpaginas'] ?></td>
                        <td><?php echo $book['estado'] ?></td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table><br>

    <?php endif ?>
    <a href="../../pages/listBooksStatusForm.html">Volver</a>
</body>
</html>