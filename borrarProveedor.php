<?php
require_once 'funciones.php';

$id = $_POST['id'];

if(puedoEliminarProveedor($id)){
    eliminarProveedor($id);
} else{
    echo json_encode(array("result"=>"No se puede eliminar ese proveedor porque tiene articulos.")); 
}