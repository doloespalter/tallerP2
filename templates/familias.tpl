<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="./js/jquery-3.2.1.js"></script>
        <script src="./js/familias.js"></script>
        <title>Inicio de sesion</title>
        <link rel="stylesheet" type="text/css" href="./css/main.css">
    </head>
    <body>
        {include file="header.tpl"}
        {include file="adminMenu.tpl"}
        
        Familias de Productos
        
        <input type="submit" value="Agregar Nuevo" onClick="document.location.href='./nuevaFamilia.php'">
        
        <div id="divTablaFamilias">       
        </div>
        
    </body>
</html>
