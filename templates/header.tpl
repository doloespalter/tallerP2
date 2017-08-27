<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./css/header.css">
    </head>
    <body>
        <div id="divEncabezado"> 
            <div class="topnav" id="myTopnav">
                <a id="logo_nav">
                    <img height="50px" src="./imagenes/avocado.png"/>
                </a>

                {if (isset($usuario))}
                    <div class="dropdown">
                        <button class="dropbtn">Hola {$usuario.nombre}</button>
                        <div class="dropdown-content">
                            <a href="./familias.php">Manejar Backend</a>
                            <a href="./doLogout.php">Cerrar sesión</a>
                        </div>
                    </div>
                    <!--<a href="./familias.php" id="login_nav"></a>-->
                {else}             
                    <a href="./login.php" id="login_nav">Iniciar Sesion</a>
                {/if}       
            </div>
        </div>
    </body>
</html>    

