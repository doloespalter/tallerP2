<?php
require_once 'funciones.php';

$nombre = $_POST['nombre'];

$id = guardarFamilia($nombre);

echo("se guardo");
header('location:familias.php');

