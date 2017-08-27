<?php
require_once 'funciones.php';

$nombre = $_POST['nombre'];

$id = guardarFamilia($nombre);

header('location:familias.php');

