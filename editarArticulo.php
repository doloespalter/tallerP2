<?php
require_once 'funciones.php';

$id = $_GET['id'];
$articulo = getArticuloById($id);

$miSmarty = nuevoSmarty();
$miSmarty->assign("articulo", $articulo);
$miSmarty->assign("proveedores", getProveedores());
$miSmarty->assign("familias", getFamilias());
$miSmarty->display("editarArticulo.tpl");
