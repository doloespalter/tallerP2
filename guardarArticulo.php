<?php
require_once 'funciones.php';

$nombre = $_POST['nombre'];
$famId = $_POST['famId'];
$precio = $_POST['precio'];
$provId = $_POST['provId'];
$destacado = $_POST['destacado'];
$id = guardarArticulo($nombre, $famId, $destacado, $precio, $provId);

$foto = $_FILES['imagen'];
if(isset($foto)) {
    $temporal = $foto['tmp_name'];
    $nuevo = "./imagenes/$id";
    move_uploaded_file($temporal, $nuevo );
}


echo("se guardo");
header('location:articulos.php');

