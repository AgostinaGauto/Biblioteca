<?php
include("../connection.php");

$cod_libro= $_GET['cod_libro'];
$sql= "SELECT * FROM libro WHERE cod_libro= '$cod_libro'";
$result= mysqli_query($connection, $sql);
$book= mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar libro</title>
</head>
<body>
    <h1>Modificar libro</h1>

    <form action="../connection.php" method="post">
        <input type="hidden" name="cod_libro" value="<?php echo $book['cod_libro'] ?>">

        <label>Titulo:</label>
        <input type="text" name="titulo" value="<?php echo $book['titulo'] ?>"><br><br>

        <label>Editorial:</label>
        <input type="text" name="editorial" value="<?php echo $book['editorial'] ?>"><br><br>

        <label>Fecha de edición:</label>
        <input type="date" name="fedicion" value="<?php echo $book['fedicion'] ?>"><br><br>

        <label>Idioma:</label>
        <input type="text" name="idioma" value="<?php echo $book['idioma'] ?>"><br><br>

        <label>Cantidad de páginas:</label>
        <input type="number" name="cantpaginas" value="<?php echo $book['cantpaginas'] ?>"><br><br>

        <label>Estado:</label>
        <input type="text" name="estado" value="<?php echo $book['estado'] ?>"><br><br>

        <button type="submit">Enviar</button>

    </form><br>

    <a href="../book/bookList.php">Volver</a>
</body>
</html>