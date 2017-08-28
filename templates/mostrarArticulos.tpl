<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="./css/product-list-vertical.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

</head>
<body>

    <ul class="product-list-vertical">
        {foreach from=$articulos item=art}
        <li>
            <a href="#" class="product-photo">
                <img src="{$art.imagen}" height="160" width= "215" alt="iPhone 6" />
            </a>

            <div class="product-details">
                
                <h2><a href="#">{$art.nombre}</a></h2>

                <div class="product-rating">
                    {if $art.destacado == 1}
                        <div>
                            <span class="product-stars" style="width: 90px" >
                                <i class="fa fa-star"></i> <a href="#">Destacado</a>
                            </span>
                        </div>
                        
                    {/if}                  
                </div>
                <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ornare sem sed nisl dignissim, facilisis dapibus lacus vulputate. Sed lacinia lacinia magna.</p>
                <p class="product-price">${$art.precio}.00</p>
            </div>

        </li>
        {/foreach}
    </ul>
    <button id="primero">Primero</button>
    {if ($mostrarAnterior)}
        <button id="anterior">Anterior</button>
    {/if}
    {if ($mostrarSiguiente)}
        <button id="siguiente">Siguiente</button>
    {/if}
    <button id="ultimo">Ultimo</button>
    <input type="hidden" value="{$total}" id="total">
</body>