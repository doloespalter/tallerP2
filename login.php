<?php
require_once 'funciones.php';
$miSmarty = nuevoSmarty();


if (isset($_GET['err'])) {
    $miSmarty->assign('err', True);
}

$miSmarty->display("login.tpl");
             