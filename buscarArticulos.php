<?php
require_once 'funciones.php';

//ini_set('display_errors', 1);

$nombre = $_POST['buscador'];
$tipo = $_POST['tipoBusqueda'];

$objetos = array();
if($tipo == "Nombre"){
   $artiuclos = getArticulos();
   //$artiuclos = buscarArticulosPorNombre($nombre, $tipo);
}else{
   $articulos = buscarArticulosPorNombre($nombre, $tipo);
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


