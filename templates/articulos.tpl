<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="./js/jquery-3.2.1.js"></script>
        <script src="./js/articulos.js"></script>
        <title>Inicio de sesion</title>
        <link rel="stylesheet" type="text/css" href="./css/main.css">
    </head>
    <body>
        {include file="header.tpl"}
        {include file="adminMenu.tpl"}
        
        
        
        Articulos       
        <input type="submit" value="Agregar Nuevo" onClick="document.location.href='./nuevoArticulo.php'">
        <div>          
            <table class="table-fill">
               <thead>
                    <tr>
                        <th class="text-left">Nombre</th>
                        <th class="text-left"></th>
                        <th class="text-left"></th>
                    </tr>
                </thead>
                <tbody class="table-hover">   
                    {foreach from=$articulos item=articulo}                                      
                            <tr id="row_articulo{$articulo.id}">                
                                <td class="text-center">{$articulo.nombre}</td>   
                                <td class="text-center" >
                                    <img class="eliminar" data="{$articulo.id}" src="./imagenes/trash-can.png"/>                                      
                                </td>
                                <td class="text-center" >
                                    <a href='./editarArticulo.php?id={$articulo.id}'>
                                        <img class="editar" data="{$articulo.id}" src="./imagenes/edit.png"/>  
                                    </a>    
                                </td> 
                            </tr>
                    {/foreach}
                </tbody>
            </table>
            <button id="primero">Primero</button>
            {if ($mostrarAnterior)}
                <button id="anterior">Anterior</button>
            {/if}
            {if ($mostrarSiguiente)}
                <button id="siguiente">Siguiente</button>
            {/if}
            <button id="ultimo">Ultimo</button>
            <input type="hidden" value="{$total}" id="total">          
        </div>
    </body>
</html>
