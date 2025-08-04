<?php
include("../connection.php");

$cod_detalle= $_GET['cod_detalle'];
$sql= "SELECT * FROM detalleprestamo  WHERE cod_detalle= '$cod_detalle'";
$result= mysqli_query($connection, $sql);
$detail= mysqli_fetch_assoc($result);

$sql= "SELECT * FROM libro WHERE estado= 'En biblioteca'";
$result2= mysqli_query($connection, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar detalle de prestamo</title>
</head>
<body>
    <h1>Modificar detalle de prestamo</h1>

    <form action="../loanDetail/saveChanges.php" method="post">
        <input type="hidden" name="cod_detalle" value="<?php echo $detail['cod_detalle'] ?>">

        <label>Libro:</label>
        <select name="cod_libro">
            <option value="<?php echo $detail['cod_libro'] ?>">---Seleccione una opción---</option>
            <?php while($book= mysqli_fetch_assoc($result2)){
                echo "<option value= {$book['cod_libro']}>{$book['titulo']}</option>";
            } ?>
        </select><br><br>

        <label>Observación:</label>
        <input type="text" name= "observacion" value="<?php echo $detail['observacion'] ?>"><br><br>

        <button type="submit">Enviar</button>
    </form><br>

    <a href="../loanDetail/loanDetailList.php">Volver</a>
</body>
</html>