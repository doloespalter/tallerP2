var pagina = 1;
var id=0;

$(document).ready(
    function () {
        cargarFamilias();

        $(".eliminar").click(               
            function () {
                id = $(this).attr("data");
                $.ajax({
                    url: "borrarFamilia.php",
                    dataType: "JSON",
                    type: "POST",
                    data: "id=" + id,
                    success: procesar,
                    timeout: 4000,
                    error: error
                });
        });  
});


function error(){
    alert("Lo sentimos, no se ha podido eliminar la familia");
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
    var fila =  $('.fila'+id);
    fila.remove();
    
};


function cargarFamilias() {
   
    $.ajax({
        url: 'familias.php',
        dataType: 'html',
        data: {pag: pagina }
    }).done(function (html) {
        $('#divContenido').html(html);

        $("#anterior").click(function () {
            pagina = pagina - 1;
            cargarFamilias(pagina);
        });

        $("#siguiente").click(function () {
            pagina = pagina + 1;
            cargarFamilias(pagina);
        });
        
        $("#primero").click(function () {
            pagina = 1;
            cargarFamilias(pagina);
        });
        
         $("#ultimo").click(function () {
            pagina = $("#total").val();
            cargarFamilias(pagina);
        });

    }).fail(function () {
        alert('no se pudo cargar el contenido');
    });
}