<?php
require_once 'funciones.php';

$nombre = $_POST['nombre'];

$id = guardarProveedor($nombre);

echo("se guardo");
header('location:proveedores.php');

