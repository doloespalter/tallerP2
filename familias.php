<?php
require_once 'funciones.php';


$pagina = $_GET['pag'];


if (!isset($pagina)) {
    $pagina = 1;
}



$objetos = array();
$familias = obtenerFamiliasDeA10($pagina);

foreach($familias['objetos'] as $familia){ 
    $objetos[] = $familia;
}

$miSmarty = nuevoSmarty();
$miSmarty->assign('familias', $objetos);
$miSmarty->assign('mostrarAnterior', $pagina > 1);
$miSmarty->assign('mostrarSiguiente', $pagina < $familias['total']);
$miSmarty->assign('total', $familias['total']);
$miSmarty->display("familias.tpl");
