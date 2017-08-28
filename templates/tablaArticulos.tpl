<table class="table-fill">
    <thead>
        <tr>
            <th class="text-left">Nombre</th>
            <th class="text-left">Precio</th>
            <th class="text-left">Familia</th>
            <th class="text-left">Proveedor</th>
            <th class="text-left">Destacado</th>
            <th class="text-left">Foto</th>
            <th class="text-left"></th>
            <th class="text-left"></th>
        </tr>
    </thead>
    <tbody class="table-hover">   
        {foreach from=$articulos item=articulo}                                      
            <tr id="row_articulo{$articulo.id}">                
                <td class="text-center">{$articulo.nombre}</td>
                <td class="text-center">{$articulo.precio}</td>
                <td class="text-center">  
                    {foreach from=$familias item=fam}

                        {if $articulo.id_familia eq $fam.id}                                           
                            {$fam.nombre}
                        {/if}
                    {/foreach}

                </td>
                <td class="text-center"> 
                    {foreach from=$proveedores item=prov}                       
                        {if $articulo.id_proveedor eq $prov.id}                                           
                            {$prov.nombre}
                        {/if}
                    {/foreach}
                </td>

                <td class="text-center">
                    {if $articulo.destacado == 1}
                        Si
                    {else}
                        No
                    {/if}   
                </td> 
                <td class="text-center">
                    <img class="img-producto" src="{$articulo.imagen}" />
                </td> 
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