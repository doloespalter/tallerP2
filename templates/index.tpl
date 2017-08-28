<!DOCTYPE html>
<html>
    <head>
        <title>Sitio de Ventas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/index.css">
        <link rel="stylesheet" type="text/css" href="./libs/slick/slick/slick.css"/>
        <script src="./js/jquery-3.2.1.js"></script>
        <script type="text/javascript" src="./libs/slick/slick/slick.min.js"></script>
        <script src="./js/index.js"></script>
    </head>
    <body>
        {include file="header.tpl"}
        <div class="centeredContent">
            <div class="picGallery">  
                {foreach from=$destacados item=destacado}  
                  
                        <div class="product-item">
                            <div class="pi-img-wrapper">
                                <img src="{$destacado.imagen}" class="img-responsive" alt="Berry Lace Dress">                                
                            </div>
                            <h3><a href="shop-item.html">{$destacado.nombre}</a></h3>
                            <div class="pi-price">$ {$destacado.precio}</div>
                        </div>
                   
                {/foreach}
            </div>
        </div>
            
            
      
            
        <div id="divBarraBuscador">
             <!-- <form method="POST" action="./buscarArticulos.php"
                  enctype="multipart/form-data"> -->
   
                 
                    <select name="familia" id="familiaSeleccionada">
                        <option selected="selected" value="0"> Todas </option>
                        {foreach from=$familias item=familia}    
                             <option value="{$familia.id}">{$familia.nombre}</option>
                         {/foreach}
                    </select>
                
                    <input type="text" name="buscador" id="buscador">
                    <img src="./imagenes/search.png" id="searchIcon"/>
                   <input type="submit" value="Buscar" id="searchButton">
                
           <!-- </form> -->
        </div>   
                    
        <div id="contenidoBusqueda">         
        </div>      
                    
    </body>
</html>
