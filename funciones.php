<?php

require_once './libs/Smarty.class.php';
require_once './class.Conexion.BD.php';

function getConexion() {
    $cn = new ConexionBD('mysql', 'localhost', 
            'tallerP2', 'root','root');
    $cn->conectar();
    return $cn;
}

function guardarFamilia($nombre) {
    $cn = getConexion();
    $cn->consulta("INSERT INTO familias(nombre) VALUES(:nombre)",
            array(
                array('nombre', $nombre, 'string')
            ));
    $cn->desconectar();
}

function ingresarLog($texto) {
    $cn = getConexion();
    $cn->consulta("INSERT INTO logs(texto) VALUES(:texto)",
            array(
                array('texto', $texto, 'string')
            ));
    $cn->desconectar();
}


function eliminarArticulo($id) {
    $cn = getConexion();
    $sql = "DELETE FROM articulos WHERE id=:id;";
    $params = array(
                array('id', $id, 'string')
              );
    
    if($cn->consulta($sql, $params)){
        $respuesta["result"] = "OK";
        echo json_encode($respuesta);
    }else{
        echo json_encode(array("result"=>$cn->ultimoError())); 
    }
    $cn->desconectar();
}

function eliminarFamilia($id) {
    $cn = getConexion();
    $sql = "DELETE FROM familias WHERE id=:id;";
    $params = array(
                array('id', $id, 'string')
              );
    
    if($cn->consulta($sql, $params)){
        $respuesta["result"] = "OK";
        echo json_encode($respuesta);
    }else{
        echo json_encode(array("result"=>$cn->ultimoError())); 
    }
    $cn->desconectar();
}

function eliminarProveedor($id) {
    $cn = getConexion();
    $sql = "DELETE FROM proveedores WHERE id=:id;";
    $params = array(
                array('id', $id, 'string')
              );
    
    if($cn->consulta($sql, $params)){
        $respuesta["result"] = "OK";
        echo json_encode($respuesta);
    }else{
        echo json_encode(array("result"=>$cn->ultimoError())); 
    }
    $cn->desconectar();
}



function editarArticulo($id, $nombre, $famId, $destacado, $precio, $provId){
    $cn = getConexion();
    $sql = "UPDATE articulos SET nombre = :nombre, id_familia = :famId, id_proveedor = :provId, precio = :precio, destacado = :destacado WHERE id = :id";

    $cn->consulta($sql,
            array(
                array('nombre', $nombre, 'string'),
                array('destacado', $destacado, 'int'),
                array('famId', $famId, 'int'),
                array('precio', $precio, 'int'),
                array('provId', $provId, 'int'),
                array('id', $id, 'int')              
            ));
    $cn->desconectar();
}

function guardarArticulo($nombre, $famId, $destacado, $precio, $provId){
    $cn = getConexion();
    $cn->consulta("INSERT INTO articulos(nombre, id_familia, id_proveedor, precio, destacado) VALUES(:nombre, :famId,  :provId, :precio, :destacado)",
            array(
                array('nombre', $nombre, 'string'),
                array('destacado', $destacado, 'int'),
                array('famId', $famId, 'int'),
                array('precio', $precio, 'int'),
                array('provId', $provId, 'int')        
                
            ));
    $id = $cn->ultimoIdInsert();
    $cn->desconectar();
    return $id;   
}

function guardarProveedor($nombre) {
    $cn = getConexion();
    $cn->consulta("INSERT INTO proveedores(nombre) VALUES(:nombre)",
            array(
                array('nombre', $nombre, 'string')
            ));
    $cn->desconectar();
}

function getProveedores() {
    
    $cn = getConexion();
    $cn->consulta("SELECT * FROM proveedores");
    $proveedores = $cn->restantesRegistros();
    $cn->desconectar();
    
    return $proveedores;
}

function getFamilias() {
    
    $cn = getConexion();
    $cn->consulta("SELECT * FROM familias");
    $familias = $cn->restantesRegistros();
    $cn->desconectar();
    
    return $familias;
}

function getArticulos() {
    
    $cn = getConexion();
    $cn->consulta("SELECT * FROM articulos");
    $articulos = $cn->restantesRegistros();
    $cn->desconectar();
    
    return $articulos;
}

function getArticuloById($id) {
    $cn = getConexion();
    $cn->consulta("SELECT * FROM articulos WHERE id = :id",
            array(
                array('id', $id, 'int')
            ));
    $articulo = $cn->siguienteRegistro();
    $cn->desconectar();
    
    return $articulo;
}

function obtenerProductosPorCant($catId, $pagina = 1, $cantidad) {
     
    $desde = ($pagina - 1) * $cantidad;
    
    $cn = getConexion();
    $cn->consulta("
        SELECT count(*) as total 
        FROM productos");
    
    $total = $cn->siguienteRegistro()['total'] / $porPagina;
    
    $cn->consulta("
            SELECT * FROM productos 
            WHERE id_categoria = :catId 
            LIMIT :desde, :cantidad
            ",
            array(
                array('catId', $catId, 'int'),
                array('desde', $desde, 'int'),
                array('cantidad', $porPagina, 'int'),
            ));
    $productos = $cn->restantesRegistros();
    $cn->desconectar();
    
    return array(
        'total' => $total,
        'objetos' => $productos
    );
}

function obtenerFamiliasDeA10($pagina = 1) {
    $cantidad=3;
    $desde = ($pagina - 1) * $cantidad;
    
    $cn = getConexion();
    $cn->consulta("
        SELECT count(*) as total 
        FROM familias");
    
    $total = $cn->siguienteRegistro()['total'] / $cantidad;
    
    $cn->consulta("
            SELECT * FROM familias 
            LIMIT :desde, :cantidad
            ",
            array(              
                array('desde', $desde, 'int'),
                array('cantidad', $cantidad, 'int'),
            ));
    $familias = $cn->restantesRegistros();
    $cn->desconectar();
    
    return array(
        'total' => $total,
        'objetos' => $familias
    );
}

function obtenerProveedoresDeA10($pagina = 1) {
    $cantidad=10;
    $desde = ($pagina - 1) * $cantidad;
    
    $cn = getConexion();
    $cn->consulta("
        SELECT count(*) as total 
        FROM proveedores");
    
    $total = $cn->siguienteRegistro()['total'] / $porPagina;
    
    $cn->consulta("
            SELECT * FROM proveedores 
            LIMIT :desde, :cantidad
            ",
            array(              
                array('desde', $desde, 'int'),
                array('cantidad', $cantidad, 'int'),
            ));
    $proveedores = $cn->restantesRegistros();
    $cn->desconectar();
    
    return array(
        'total' => $total,
        'objetos' => $proveedores
    );
}

function obtenerArticulosDeA10($pagina = 1) {
    $cantidad=10;
    $desde = ($pagina - 1) * $cantidad;
    
    $cn = getConexion();
    $cn->consulta("
        SELECT count(*) as total 
        FROM articulos");
    
    $total = $cn->siguienteRegistro()['total'] / $porPagina;
    
    $cn->consulta("
            SELECT * FROM articulos 
            LIMIT :desde, :cantidad
            ",
            array(              
                array('desde', $desde, 'int'),
                array('cantidad', $cantidad, 'int'),
            ));
    $articulos = $cn->restantesRegistros();
    $cn->desconectar();
    
    return array(
        'total' => $total,
        'objetos' => $articulos
    );
}

function obtenerProductosDestacados() {
    $cn = getConexion();
    $cn->consulta("
            SELECT * FROM articulos 
            WHERE destacado = 1           
            ",
            array());
    $articulos = $cn->restantesRegistros();
    $cn->desconectar();
    
    return array(
        'objetos' => $articulos
    );
}

function nuevoSmarty() {
    $miSmarty = new Smarty();
    $miSmarty->template_dir = "templates";
    $miSmarty->compile_dir = "templates_c";
    $miSmarty->cache_dir = "cache";
    $miSmarty->config_dir = "config";
    $miSmarty->assign('usuario', getUsuarioLogueado());
    return $miSmarty;
}

function getUsuarioLogueado() {
    $usuario = NULL;
    session_start();
    if (isset($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario'];
    } 
    /*
    else {
        if (isset($_COOKIE['recordar'])) {
            $usuario = buscarUsuarioPorGuid($_COOKIE['recordar']);
            $_SESSION['usuario'] = $usuario;
        }
    }*/
    return $usuario;
}

function buscarUsuarioPorGuid($guid) {
    $usuario = NULL;
    if ($guid == '123456789ABCDEF123456') {
        $usuario = $usuario_logueado = array(
            'id' => 1,
            'login' => 'test',
            'nombre' => 'Usuario de prueba',
            'guid' => '123456789ABCDEF123456'
        );
    }
    return $usuario;
}


function login($usuario, $clave, $recordar){
    $usuario_logueado = NULL;
    
    $file = fopen("./data.csv","r");   
    while (($line = fgetcsv($file)) !== FALSE) {
        if($usuario==$line[0] && $clave==$line[1]){
            
            $usuario_logueado = array(
                'id' => 1,
                'nombre' => $usuario,
                'guid' => '123456789ABCDEF123456'
            );

            if ($recordar) {
                setcookie('recordar', $usuario_logueado['guid'], time() + (60 * 60 * 24), "/");
            }           
        }
    }
   fclose($file);
   return $usuario_logueado;
}
