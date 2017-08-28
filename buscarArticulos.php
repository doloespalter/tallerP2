<?php
require_once 'funciones.php';

//ini_set('display_errors', 1);

$nombre = $_GET['buscador'];
$familia = $_GET['familia'];
$pagina = $_GET['pag'];
$criterio = $_GET['criterio'];


if (!isset($pagina)) {
    $pagina = 1;
}

$objetos = array();
if($familia==0){
   $articulos = buscarArticulosPorNombre($nombre, $pagina, $criterio);
}else{
   $articulos = buscarArticulosPorFamilia($nombre, $familia, $pagina);
}


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
$miSmarty->assign('articulos', $objetos);

$miSmarty->assign('mostrarAnterior', $pagina > 1);
$miSmarty->assign('mostrarSiguiente', $pagina < $articulos['total']);
$miSmarty->assign('total', $articulos['total']);
$miSmarty->display('mostrarArticulos.tpl');


