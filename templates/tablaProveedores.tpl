<table class="table-fill">
    <thead>
        <tr>
            <th class="text-left">Nombre</th>
            <th class="text-left"></th>
        </tr>
    </thead>
    <tbody class="table-hover">   
        {foreach from=$proveedores item=proveedor}                                      
            <tr id="row_proveedor{$proveedor.id}">                
                <td class="text-center">{$proveedor.nombre}</td>   
                <td class="text-center" >
                    <img class="eliminar" data="{$proveedor.id}" src="./imagenes/trash-can.png"/>                                      
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