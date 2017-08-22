<?php
require_once 'funciones.php';
$miSmarty = nuevoSmarty();

$pagina = $_GET['pag'];

if (!isset($pagina)) {
    $pagina = 1;
}

$objetos = array();
$proveedores = obtenerProveedoresDeA10($pagina);

foreach($proveedores['objetos'] as $proveedor){ 
    $objetos[] = $proveedor;
}

$miSmarty->assign('proveedores', $objetos);
$miSmarty->assign('mostrarAnterior', $pagina > 1);
$miSmarty->assign('mostrarSiguiente', $pagina < $productos['total']);
$miSmarty->assign('total', $proveedores['total']);
$miSmarty->display("proveedores.tpl");
             