//var ruta ="http://localhost/web2/";
var ruta ="http://80.147.114.91/";
function filtrar(id, idcompania){
    var fecha = document.getElementById(id).value;
    //var idcompania = document.getElementById(idcompania).value;
    //alert(fecha);
    if (fecha =="all"){
        var dir = ruta + "marqueting/reportes/filtro/" + idcompania;
    } else {
    var dir = ruta + "marqueting/reportes/filtro/" + idcompania + "/" + fecha;
    }
    document.location.href = dir;
}

