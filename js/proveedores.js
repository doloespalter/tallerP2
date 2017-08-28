var pagina = 1;
var id=0;

$(document).ready(
    function () {
        cargarProveedores(); 
});

function error(){
    alert("Lo sentimos, no se ha podido eliminar el proveedor");
}

function procesar(respuesta){
    if(respuesta["result"]=="OK"){
        alert("se elimino correctamente");
        cargarProveedores();
    }
    else{
        alert("ERROR " + respuesta["result"]);
    }
}



function cargarProveedores() {
   
    $.ajax({
        url: 'cargarProveedores.php',
        dataType: 'html',
        data: {pag: pagina }
    }).done(function (html) {
        $('#divTablaProveedores').html(html);

        $("#anterior").click(function () {
            pagina = pagina - 1;
            cargarProveedores(pagina);
        });

        $("#siguiente").click(function () {
            pagina = pagina + 1;
            cargarProveedores(pagina);
        });
        
        $("#primero").click(function () {
            pagina = 1;
            cargarProveedores(pagina);
        });
        
         $("#ultimo").click(function () {
            pagina = $("#total").val();
            cargarProveedores(pagina);
        });
        
        $(".eliminar").click(               
            function () {
                id = $(this).attr("data");
                $.ajax({
                    url: "borrarProveedor.php",
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