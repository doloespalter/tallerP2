<?php
require_once 'funciones.php';
$miSmarty = nuevoSmarty();

$pagina = $_GET['pag'];

if (!isset($pagina)) {
    $pagina = 1;
}

$objetos = array();
$articulos = obtenerArticulosDeA10($pagina);

foreach($articulos['objetos'] as $articulo){ 
    $objetos[] = $articulo;
}

$miSmarty->assign('articulos', $objetos);
$miSmarty->assign('mostrarAnterior', $pagina > 1);
$miSmarty->assign('mostrarSiguiente', $pagina < $articulos['total']);
$miSmarty->assign('total', $articulos['total']);
$miSmarty->display("articulos.tpl");
                          