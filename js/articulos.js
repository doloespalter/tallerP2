var pagina = 1;
var id=0;

$(document).ready(
    function () {
        cargarArticulos();

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
        
        /*
        $(".editar").click(               
            function () {
                id = $(this).attr("data");
                $.ajax({
                    url: "editarArticulo.php",
                    dataType: "JSON",
                    type: "POST",
                    data: "id=" + id,
                    success: procesar2,
                    timeout: 4000,
                    error: error2
                });
        }); 
        */
});


function error(){
    alert("Lo sentimos, no se ha podido eliminar el articulo");
}

function procesar2(respuesta){

}

function error2(respuesta){

}

function procesar(respuesta){
    if(respuesta["result"]=="OK"){
        alert("se elimino correctamente");
        actualizarTabla();
    }
    else{
        alert("ERROR " + respuesta["result"]);
    }
}

function actualizarTabla(){
    var fila =  $('#row_articulo'+id);
    fila.remove();
};


function cargarArticulos() {
   
    $.ajax({
        url: 'articulos.php',
        dataType: 'html',
        data: {pag: pagina }
    }).done(function (html) {
        $('#divContenido').html(html);

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

    }).fail(function () {
        alert('no se pudo cargar el contenido');
    });
}

