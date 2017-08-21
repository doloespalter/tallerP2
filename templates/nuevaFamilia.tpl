<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inicio de sesion</title>
     <!--   <link rel="stylesheet" type="text/css" href="./css/ventas.css"> -->
    </head>
    <body>
        {include file="header.tpl"}
        {include file="adminMenu.tpl"}
        
        <div class="addForm">
            <form method="POST" action="guardarFamilia.php">
                <p>
                    Nombre <input type="text" name="nombre">
                </p>
                
                <p>
                    <input type="submit" value="Guardar">
                </p>
                
            </form>
        </div>
    </body>
</html>

