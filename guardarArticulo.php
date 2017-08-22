<?php
require_once 'funciones.php';

$nombre = $_POST['nombre'];
$famId = $_POST['famId'];
$precio = $_POST['precio'];
$provId = $_POST['provId'];


if(isset($_POST['destacado']) && $_POST['destacado']=='1'){  
    $destacado = "1";
}else{
    $destacado = "0";
}


if(isset($_POST['editMode']) && isset($_POST['id'])){
    
    $id = $_POST['id'];
    editarArticulo($id,$nombre, $famId, $destacado, $precio, $provId);
}else{

    $id = guardarArticulo($nombre, $famId, $destacado, $precio, $provId);
    $foto = $_FILES['imagen'];
    if(isset($foto)) {
        $temporal = $foto['tmp_name'];
        $nuevo = "./imagenes/$id";
        move_uploaded_file($temporal, $nuevo );
    }
}

header('location:articulos.php');

