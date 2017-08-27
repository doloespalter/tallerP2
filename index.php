<?php

//ini_set('display_errors', 1);

require_once 'funciones.php'; 

$destacados = obtenerProductosDestacados(); 
 
 /*
$catId = $_GET['cat'];

if (!isset($catId)) {
    $catId = 1;
}
  */

foreach($destacados['objetos'] as $destacado){
    
    $id = $destacado['id'];
    if(file_exists("./imagenes/$id")) {
        $destacado['imagen'] = "./imagenes/".$id;
    } else {
        $destacado['imagen'] = "./imagenes/defecto.png";
    }
    
    $objetos[] = $destacado;
}


$miSmarty = nuevoSmarty();
$miSmarty->assign('destacados', $objetos); 
$miSmarty->assign('familias', getFamilias()); 
$miSmarty->display('index.tpl');

