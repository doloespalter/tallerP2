<?php
require_once 'funciones.php';

$pagina = $_GET['pag'];

if (!isset($pagina)) {
    $pagina = 1;
}

$objetos = array();
$proveedores = obtenerProveedoresDeA10($pagina);

foreach($proveedores['objetos'] as $proveedor){ 
    $objetos[] = $proveedor;
}

ingresarLog("pagina ".$pagina);
ingresarLog("total ".$proveedores['total']);

$miSmarty = nuevoSmarty();
$miSmarty->assign('proveedores', $objetos);
$miSmarty->assign('mostrarAnterior', $pagina > 1);
$miSmarty->assign('mostrarSiguiente', $pagina < $proveedores['total']);
$miSmarty->assign('total', $proveedores['total']);
$miSmarty->display("tablaProveedores.tpl");
             