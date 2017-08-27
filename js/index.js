var pagina = 1;
var idFamilia;
var nombre;

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
                cargarResultados();
             });
                
                
        }   
);

function cargarResultados() {

    $.ajax({
        url: 'buscarArticulos.php',
        dataType: 'html',
        data: {pag: pagina, buscador: nombre, familia: idFamilia }
    }).done(function (html) {
        $('#contenidoBusqueda').html(html);

    }).fail(function () {
        alert('no se pudo cargar el contenido');
    });
}

