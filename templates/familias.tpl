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
        
        <img id="eliminar2" src="./imagenes/trash-can.png"/>  
        
        Familias de Productos
        
        <input type="submit" value="Agregar Nuevo" onClick="document.location.href='./nuevaFamilia.php'">
        <div>
            
            <table class="table-fill">
               <thead>
                    <tr>
                        <th class="text-left">Nombre</th>
                        <th class="text-left"></th>
                    </tr>
                </thead>
                <tbody class="table-hover">   
                    {foreach from=$familias item=familia}                                      
                            <tr class="row.{$familia.id}">                
                                <td class="text-center">{$familia.nombre}</td>   
                                <td class="text-center" >
                                    <img class="eliminar" data="{$familia.id}" src="./imagenes/trash-can.png"/>                                      
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
