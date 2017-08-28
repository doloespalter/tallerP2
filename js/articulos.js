var pagina = 1;
var id=0;

$(document).ready(
    function () {
        cargarArticulos();
        
});


function error(){
    alert("Lo sentimos, no se ha podido eliminar el articulo");
}

function procesar(respuesta){
    if(respuesta["result"]=="OK"){
        alert("se elimino correctamente");
        cargarArticulos();
    }
    else{
        alert("ERROR " + respuesta["result"]);
    }
}



function cargarArticulos() {
   
    $.ajax({
        url: 'cargarArticulos.php',
        dataType: 'html',
        data: {pag: pagina }
    }).done(function (html) {
        $('#divTablaArticulos').html(html);

        $("#anterior").click(function () {
            pagina = pagina - 1;
            cargarArticulos(pagina);
        });

        $("#siguiente").click(function () {
            pagina = pagina + 1;
            cargarArticulos(pagina);
        });
        
        $("#primero").click(function () {
            pagina = 1;
            cargarArticulos(pagina);
        });
        
         $("#ultimo").click(function () {
            pagina = $("#total").val();
            cargarArticulos(pagina);
        });
        
        $(".eliminar").click(               
            function () {
                id = $(this).attr("data");
                $.ajax({
                    url: "borrarArticulo.php",
                    dataType: "JSON",
                    type: "POST",
                    data: "id=" + id,
                    success: procesar,
                    timeout: 4000,
                    error: error
                });
        });

    }).fail(function () {
        alert('no se pudo cargar el contenido');
    });
}

