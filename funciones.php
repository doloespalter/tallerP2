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

function guardarArticulo($nombre, $famId, $destacado, $precio, $provId){
    $cn = getConexion();
    $cn->consulta("INSERT INTO articulos(nombre, id_familia, id_proveedor, precio, destacado) VALUES(:nombre, :famId,  :provId, :precio, :destacado)",
            array(
                array('nombre', $nombre, 'string'),
                array('destacado', $destacado, 'boolean'),
                array('famId', $famId, 'int'),
                array('precio', $precio, 'int'),
                array('provId', $provId, 'int')        
                
            ));
    $cn->desconectar();
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
    } else {
        if (isset($_COOKIE['recordar'])) {
            $usuario = buscarUsuarioPorGuid($_COOKIE['recordar']);
            $_SESSION['usuario'] = $usuario;
        }
    }

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
            //loggeo
            header("Location: ./familias.php");            
        }
    }
   fclose($file);
}
