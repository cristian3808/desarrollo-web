<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Productos de Cerámica</title>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>SECCION</th>
            <th>PRODUCTO</th>
            <th>ORIGEN</th>
            <th>IMPORTADO</th>
            <th>PRECIO</th>
        </tr>
    <?php
    require_once("../conexion.php");
    $conexion=mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);

    $busqueda=$_GET["search"];

    $consulta = "SELECT * FROM productos WHERE producto like '%$busqueda%'";
    $resultado = mysqli_query($conexion, $consulta);
    
    while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        echo "<table><tr><td>";
        echo $fila['id_producto'] . "</td><td>";
        echo $fila['producto'] . "</td><td>";
        echo $fila['precio'] . "</td><td></tr></table>";
        echo "<br>";
        echo "<br>";
    }
    mysqli_close($conexion);
    ?>

    </table>
</body>
</html>