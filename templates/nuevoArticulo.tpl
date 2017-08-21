<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nuevo Artículo</title>
     <!--   <link rel="stylesheet" type="text/css" href="./css/ventas.css"> -->
    </head>
    <body>
        {include file="header.tpl"}
        {include file="adminMenu.tpl"}
        
        <div class="addForm">
            <form method="POST" action="guardarArticulo.php"
                  enctype="multipart/form-data">
                <p>
                    Familia 
                     <select name="famId">
                    {foreach from=$familias item=fam}
                         <option value="{$fam.id}">{$fam.nombre}</option>
                    {/foreach}
                    </select>
                </p>
                <p>
                    Nombre <input type="text" name="nombre">
                </p>
                <p>
                    Precio <input type="text" name="precio">
                </p>
                <p>
                    Proveedores 
                     <select name="provId">
                    {foreach from=$proveedores item=prov}
                         <option value="{$prov.id}">{$prov.nombre}</option>
                    {/foreach}
                    </select>
                </p>
                <p>Imagen
                     <input type="file" name="imagen"  accept="image/*" />
                </p>
                <p>
                    <input type="checkbox" name="destacado">
                    Destacado
                </p>
                <p>
                    <input type="submit" value="Guardar">
                </p>
                
            </form>
        </div>
    </body>
</html>