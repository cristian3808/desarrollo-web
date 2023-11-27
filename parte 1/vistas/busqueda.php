<?php
require_once("../conexion.php");

$conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre);

$mibusqueda = isset($_GET["buscar"]) ? $_GET["buscar"] : '';
$mipagina = $_SERVER["PHP_SELF"];
$consulta = "SELECT * FROM productos WHERE producto LIKE '%$mibusqueda%'";

if ($mibusqueda != NULL) {
  //  ejecutar_consulta($mibusqueda);
} else {
    echo("<form action='" . $mipagina . "' method='get'>
        <label>Buscar:<input type='text' name='buscar'></label>
        <input type='submit' name='search' value='Enviar'>
    </form>");
}
$resultado = mysqli_query($conexion, $consulta);

echo "<table>";
echo "<tr>
        <th>ID</th>
        <th>SECCION</th>
        <th>PRODUCTO</th>
        <th>ORIGEN</th>
        <th>IMPORTADO</th>
        <th>PRECIO</th>
    </tr>";

while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
    echo "<tr><td>";
    echo $fila['id_producto'] . "</td><td>";
    echo $fila['producto'] . "</td><td>";
    echo $fila['precio'] . "</td></tr>";
    echo "<br>";
}

echo "</table>";

mysqli_close($conexion);
?>


