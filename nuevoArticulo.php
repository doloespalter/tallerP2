<?php
require_once 'funciones.php';

$miSmarty = nuevoSmarty();
$miSmarty->assign("proveedores", getProveedores());
$miSmarty->assign("familias", getFamilias());
$miSmarty->display("nuevoArticulo.tpl");
