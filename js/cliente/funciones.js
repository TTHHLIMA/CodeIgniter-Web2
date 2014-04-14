//var ruta ="http://localhost/web2/clientes/";
var ruta ="http://80.147.114.91/clientes/";
function filtrar(id){
    var fecha = document.getElementById(id).value;
    //alert(fecha);
    if (fecha =="all"){
        var dir = ruta + "reportes/";
    } else {
    var dir = ruta + "reportes/filtro/" + fecha;
    }
    document.location.href = dir;
}

