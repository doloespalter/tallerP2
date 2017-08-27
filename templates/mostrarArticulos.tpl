<h1>ARTICULOS</h1>
<div>
    <div>  
            <div class="divArticulos">
                {foreach from=$articulos item=art}
                <div>
                   
                     <h2>{$art.nombre}</h2>
                   
                </div>
                     {/foreach}
            </div>
        
    </div>
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