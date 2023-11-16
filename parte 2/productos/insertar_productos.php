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

$id=$_GET["c_prod"];
$sec=$_GET["seccion"];
$prod=$_GET["n_prod"];
$org=$_GET["p_orig"];
$imp=$_GET["importado"];
$prec=$_GET["precio"];

//generar consultas para mostrar las personas de la base de datos
$consulta= "INSERT INTO productos(id_producto,seccion,producto,origen,importado,precio) 
VALUES('$id','$sec','$prod','$org','$imp',$prec)";//consulta sql
$resultado = mysqli_query($conexion, $consulta);

if($resultado==false){
    echo "ERROR DE EJECUCION";
}else{
    echo "EL PRODUCTO FUE ALMACENADO EXITOSAMENTE CON LOS SIGUIENTES DATOS: <br><br><br>";
    echo "CODIGO: " . "$id"."<br>";
    echo "SECCION: " . "$sec"."<br>";
    echo "PRODUCTO: " . "$prod"."<br>";
    echo "PAIS DE ORIGEN: " . "$org"."<br>";
    echo "ES IMPORTADO: " . "$imp"."<br>";
    echo "PRECIO: " . "$prec"."<br>";
}

//cerra la conexion
mysqli_close($conexion);
?>