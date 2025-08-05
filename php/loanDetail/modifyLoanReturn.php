<?php
include("../connection.php");

$cod_libro= $_GET['cod_libro'];
$cod_prestamo= $_GET['cod_prestamo'];

$sql= "SELECT * FROM prestamo WHERE cod_prestamo= '$cod_prestamo'";
$result= mysqli_query($connection, $sql);
$loan= mysqli_fetch_assoc($result);

$sql= "SELECT * FROM libro WHERE cod_libro= '$cod_libro'";
$result2= mysqli_query($connection, $sql);
$book= mysqli_fetch_assoc($result2);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar devolución de prestamo</title>
</head>
<body>
    <h1>Modificar devolución</h1>

    <form action="../loanDetail/processLoanReturn.php" method="post">
        <input type="hidden" name="cod_prestamo" value="<?php echo $loan['cod_prestamo'] ?>">

        <input type="hidden" name="cod_libro" value="<?php echo $book['cod_libro'] ?>">

        <label>Fecha devolución:</label>
        <input type="date" name="fecha_devolucion" value="<?php echo $loan['fecha_devolucion'] ?>"><br><br>

        <label>Estado:</label>
        <input type="text" name="estado" value="<?php echo $book['estado'] ?>"><br><br>

        <button type="submit">Enviar</button>
    </form><br>

    <a href="../loanDetail/loanReturn.php">Volver</a>
</body>
</html>