<?php
require_once 'funciones.php';

$pagina = $_GET['pag'];

if (!isset($pagina)) {
    $pagina = 1;
}

$objetos = array();
$articulos = obtenerArticulosDeA10($pagina);

foreach($articulos['objetos'] as $articulo){ 
    $id = $articulo['id'];
    if(file_exists("./imagenes/$id")) {
        $articulo['imagen'] = "./imagenes/".$id;
    } else {
        $articulo['imagen'] = "./imagenes/defecto.png";
    }
    
    $objetos[] = $articulo;
}

$miSmarty = nuevoSmarty();
$miSmarty->assign("proveedores", getProveedores());
$miSmarty->assign("familias", getFamilias());
$miSmarty->assign('articulos', $objetos);
$miSmarty->assign('mostrarAnterior', $pagina > 1);
$miSmarty->assign('mostrarSiguiente', $pagina < $articulos['total']);
$miSmarty->assign('total', $articulos['total']);
$miSmarty->display("tablaArticulos.tpl");
                          