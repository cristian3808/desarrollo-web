<?php
//habilitamos la conexion a la base de datos
require_once("conexion.php");

//crear la conexion
$conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre);
//prueba de fallos de la conexion
//prueba de fallos de ubicacion en el servidor

if (mysqli_connect_errno()){
    echo "LA CONEXION CON LA BASE DE DATOS FALLO";
    exit();
}
//prueba de fallos para la base de datos
mysqli_select_db($conexion,$db_nombre) or die("LA BASE DE DATOS NO EXISTE");

//generar consultas para mostrar las personas de la base de datos

$consulta= "INSERT INTO productos(id_producto,seccion,producto,origen,importado,precio) 
VALUES('ar41','FERRETERIA','pela cables','colombia','FALSO',10000)";
$resultado = mysqli_query($conexion, $consulta);

//cerra la conexion
mysqli_close($conexion);
?>