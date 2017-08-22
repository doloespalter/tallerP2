<?php
require_once 'funciones.php';
$miSmarty = nuevoSmarty();

$pagina = $_GET['pag'];

if (!isset($pagina)) {
    $pagina = 1;
}

$objetos = array();
$familias = obtenerFamiliasDeA10($pagina);

foreach($familias['objetos'] as $familia){ 
    $objetos[] = $familia;
}

$prueba = "hola";

$miSmarty->assign('familias', $objetos);
$miSmarty->assign('mostrarAnterior', $pagina > 1);
$miSmarty->assign('mostrarSiguiente', $pagina < $productos['total']);
$miSmarty->assign('total', $productos['total']);
$miSmarty->assign('prueba', $prueba);
$miSmarty->display("familias.tpl");
