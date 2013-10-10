function upd_termStrac(termstrac,nivel){

var dato;
var txttot="txtTot"+termstrac;
var txtidiomaOrigen="txtidiomaOrigen"+termstrac;
var txtidiomaFinal="txtidiomaFinal"+termstrac;
var CboRealizado = "Cbo"+termstrac+"1"; 
var CboRevisado = "Cbo"+termstrac+"2"; 
var ChkTerminado="ChkTer"+termstrac;
var boton="btnR"+termstrac;

 
var txttotCad = document.getElementById(txttot).value; 

var txtidiomaOrigenCad = document.getElementById(txtidiomaOrigen).value; 

var txtidiomaFinalCad = document.getElementById(txtidiomaFinal).value; 

var CboRealizadoCad = document.getElementById(CboRealizado).value;

if (nivel=="1"){
var CboRevisadoCad = document.getElementById(CboRevisado).value;
(document.getElementById(ChkTerminado).checked) ? ChkTerminadoCad = "S" : ChkTerminadoCad = "N";
//alert(nivel);
ajax=nuevoAjax();
ajax.open("GET", "upd_TermStrac.php?termstrac=" + termstrac +
                                                "&txttot=" + txttotCad +
                                                "&txtidiomaOrigen=" + txtidiomaOrigenCad +
                                                "&txtidiomaFinal=" + txtidiomaFinalCad +
                                                "&CboRealizado=" + CboRealizadoCad +
                                                "&CboRevisado=" + CboRevisadoCad +
                                                "&ChkTerminado=" + ChkTerminadoCad +
                                                "&nivel=" + nivel
                                                ,true);
} else {
   
ajax=nuevoAjax();
ajax.open("GET", "upd_TermStrac.php?termstrac=" + termstrac +
                                                "&txttot=" + txttotCad +
                                                "&txtidiomaOrigen=" + txtidiomaOrigenCad +
                                                "&txtidiomaFinal=" + txtidiomaFinalCad +
                                                "&CboRealizado=" + CboRealizadoCad +
                                                "&nivel=" + nivel
                                                ,true); 
}



                                    
    ajax.onreadystatechange=function() {
        if (ajax.readyState==1){
            obj.value="Cargando";
        }
        if (ajax.readyState==4) {
            dato = ajax.responseText;
            //alert(dato.length);
            //alert(dato);
                if (dato.length == 2){ //ok
                    alert("Se guardo los cambios");
                    document.getElementById(boton).className='btn btn-danger btn-mini';
                    document.getElementById(boton).innerHTML="<i class='icon-envelope icon-white'></i> Informar";
                } else {
                    alert("error: no se realizo los cambios");
                }
        }
    }
    ajax.send(null)
}