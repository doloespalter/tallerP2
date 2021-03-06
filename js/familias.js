var pagina = 1;
var id=0;

$(document).ready(
    function () {
        cargarFamilias();

        
});


function error(){
    alert("Lo sentimos, no se ha podido eliminar la familia");
}

function procesar(respuesta){
    if(respuesta["result"]==="OK"){
        alert("se elimino correctamente");
        cargarFamilias();
    }
    else{
        alert("ERROR! " + respuesta["result"]);
    }
}


function cargarFamilias() {
   
    $.ajax({
        url: 'cargarFamilias.php',
        dataType: 'html',
        data: {pag: pagina}
    }).done(function (html) {
        $('#divTablaFamilias').html(html);

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
        
        
        

    }).fail(function () {
        alert('no se pudo cargar el contenido');
    });
}