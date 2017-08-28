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
                       
                        {if $articulo.id_familia eq $fam.id}
                            <option value="{$fam.id}" selected='selected'>
                                {$fam.nombre}
                            </option>
                        {else}
                            <option value="{$fam.id}">
                                {$fam.nombre}
                            </option>
                         {/if}
                    {/foreach}
                    </select>
                </p>
                <p>
                    Nombre <input type="text" name="nombre" value='{$articulo.nombre}'>
                </p>
                <p>
                    Precio <input type="text" name="precio" value='{$articulo.precio}'>
                </p>
                <p>
                    Proveedores 
                     <select name="provId">
                    {foreach from=$proveedores item=prov}
                         {if $articulo.id_proveedor eq $prov.id}
                            <option value="{$prov.id}" selected='selected'>
                                {$prov.nombre}
                            </option>
                        {else}
                            <option value="{$prov.id}">
                                {$prov.nombre}
                            </option>
                         {/if}
                    {/foreach}
                    </select>
                </p>
                <p>Imagen
                     <input type="file" name="imagen" accept="image/*" />
                </p>
                <p>
                    {if $articulo.destacado eq "1"}
                        <input type="checkbox" name="destacado" value="1" checked>
                    {else}
                        <input type="checkbox" name="destacado" value="1">
                    {/if}
                    Destacado
                </p>
                <p>
                    <input type="submit" value="Guardar">
                </p>
                
                <input type="hidden" name="id" value={$articulo.id}/>
                <input type="hidden" name="editMode"/>
            </form>
        </div>         
    </body>
</html>