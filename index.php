<?php
ini_set('display_errors', 1); 
require_once 'funciones.php'; 

 
 
 /*
$catId = $_GET['cat'];

if (!isset($catId)) {
    $catId = 1;
}
  */


$miSmarty = nuevoSmarty();
/* $miSmarty->assign('categorias', getCategorias()); */
$miSmarty->display('index.tpl');

