var pagina = 1;
var idFamilia;
var nombre;
var criterio;

$(document).ready(
        function () {
    
            $('.picGallery').slick({
                    slidesToShow: 1,
                    arrows: true,      
                    adaptiveHeight: true,
                    prevArrow: '<img class="slick-prev" src="./imagenes/back.png" style="display: block;height: 66px;position: absolute; margin-top: 18%; margin-left: 0%; z-index:2;" />',
                    nextArrow: '<img class="slick-next" src="./imagenes/next.png" style="display: block;height: 66px;position: relative; margin-top: -26.3%; margin-left: 89%; z-index:2;"/>'
            });
            
            $('#searchButton').click(function () {
                idFamilia = $('#familiaSeleccionada').val();
                nombre = $('#buscador').val();
                criterio = $('#criterioDeOrden').val();
                cargarResultados();
             });
             
             $('#criterioDeOrden').change(function(){
                 criterio = $('#criterioDeOrden').val();
                 pagina = 1;
                 cargarResultados();              
             });
                
                
        }   
);

function cargarResultados() {

    $.ajax({
        url: 'buscarArticulos.php',
        dataType: 'html',
        data: {pag: pagina, buscador: nombre, familia: idFamilia, criterio:criterio }
    }).done(function (html) {
        $('#contenidoBusqueda').html(html);
        
         $("#anterior").click(function () {
            pagina = pagina - 1;
            cargarResultados(pagina);
        });

        $("#siguiente").click(function () {
            pagina = pagina + 1;
            cargarResultados(pagina);
        });
        
        $("#primero").click(function () {
            pagina = 1;
            cargarResultados(pagina);
        });
        
         $("#ultimo").click(function () {
            pagina = $("#total").val();
            cargarResultados(pagina);
        });
        

    }).fail(function () {
        alert('no se pudo cargar el contenido');
    });
}

