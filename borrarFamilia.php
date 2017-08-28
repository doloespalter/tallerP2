<?php

require_once 'funciones.php';

$id = $_POST['id'];

if(puedoEliminarFamilia($id)){
    eliminarFamilia($id);
} else{
    echo json_encode(array("result"=>"No se puede eliminar esa familia porque tiene articulos.")); 
}