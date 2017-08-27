<?php
require_once 'funciones.php';

//ini_set('display_errors', 1);

$nombre = $_GET['buscador'];
$familia = $_GET['familia'];

$objetos = array();
if($familia==0){
   $articulos = buscarArticulosPorNombre($nombre);
   //$artiuclos = buscarArticulosPorNombre($nombre, $tipo);
}else{
   $articulos = buscarArticulosPorFamilia($nombre, $familia);
}


foreach($articulos['objetos'] as $articulo){ 
   /* $id = $articulo['id'];
    if(file_exists("./imagenes/$id")) {
        $articulo['imagen'] = "./imagenes/".$id;
    } else {
        $articulo['imagen'] = "./imagenes/defecto.png";
    }
    */
   $objetos[] = $articulo;
}

$miSmarty = nuevoSmarty();
$miSmarty->assign('articulos', $objetos);

$miSmarty->assign('mostrarAnterior', $pagina > 1);
$miSmarty->assign('mostrarSiguiente', $pagina < $productos['total']);
$miSmarty->assign('total', $productos['total']);
$miSmarty->display('mostrarArticulos.tpl');


