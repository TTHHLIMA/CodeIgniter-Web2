function upd_userformPrepSalto(pedido){
var dato;
var Estado = "Cbo"+pedido+"1"; 
//alert (Estado);
var ChkPDFGlobal="ChkPDFGlobal"+pedido;
var Chksaltolinea="Chksaltolinea"+pedido;
var Chkchekearttx="Chkchekearttx"+pedido;
var txtobservacion5="txtobservacion5"+pedido;
var boton="btnR"+pedido+"1";

var EstadoCad = document.getElementById(Estado).value;  
(document.getElementById(ChkPDFGlobal).checked) ? ChkPDFGlobalCad = "S" : ChkPDFGlobalCad = "N";
(document.getElementById(Chksaltolinea).checked) ? ChksaltolineaCad = "S" : ChksaltolineaCad = "N";
(document.getElementById(Chkchekearttx).checked) ? ChkchekearttxCad = "S" : ChkchekearttxCad = "N";
var txtobservacion5Cad = document.getElementById(txtobservacion5).value;  

/*
 alert (EstadoCad + ", " +
        ChkPDFGlobalCad + ", " +
        ChksaltolineaCad + ", " +
        ChkchekearttxCad + ", " +
        txtobservacion5Cad);    
 */   

    ajax=nuevoAjax();
ajax.open("GET", "upd_userformPrepSalto.php?pedido=" + pedido +
                                                "&Estado=" + EstadoCad +
                                                "&ChkPDFGlobal=" + ChkPDFGlobalCad +
                                                "&Chksaltolinea=" + ChksaltolineaCad +
                                                "&Chkchekearttx=" + ChkchekearttxCad +
                                                "&txtobservacion5=" + txtobservacion5Cad  
                                                ,true);
                                    
    ajax.onreadystatechange=function() {
        if (ajax.readyState==1){
            obj.value="Cargando";
        }
        if (ajax.readyState==4) {
            dato = ajax.responseText;
            //alert(dato.length);
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


function upd_userformPrepFormateo(pedido){
    var dato1;
    var Estado = "Cbo"+pedido+"2"; 
    var Chkeditacionformateo="Chkeditacionformateo"+pedido;
    var Chkttx1="Chkttx1"+pedido;
    var Estado2 = "Cborealizadopor6"+pedido; 
    var Chkeditaciontextofoto="Chkeditaciontextofoto"+pedido;
    var txtobservacion1="txtobservacion1"+pedido;
    var boton="btnR"+pedido+"2";

    var EstadoCad = document.getElementById(Estado).value;  

    (document.getElementById(Chkeditacionformateo).checked) ? ChkeditacionformateoCad = "S" : ChkeditacionformateoCad = "N";
    (document.getElementById(Chkttx1).checked) ? Chkttx1Cad = "S" : Chkttx1Cad = "N";
    var Estado2Cad = document.getElementById(Estado2).value; 
    (document.getElementById(Chkeditaciontextofoto).checked) ? ChkeditaciontextofotoCad = "S" : ChkeditaciontextofotoCad = "N";
    var txtobservacion1Cad = document.getElementById(txtobservacion1).value;  
       


        ajax=nuevoAjax();

        ajax.open("GET","upd_userformPrepFormateo.php?pedido=" + pedido + 
                                                    "&Estado=" + EstadoCad +
                                                    "&Chkeditacionformateo=" + ChkeditacionformateoCad +
                                                    "&Chkttx1=" + Chkttx1Cad +
                                                    "&Estado2=" + Estado2Cad +
                                                    "&Chkeditaciontextofoto=" + ChkeditaciontextofotoCad +
                                                   "&txtobservacion1=" + txtobservacion1Cad,true);

        ajax.onreadystatechange=function() {
            if (ajax.readyState==1){
                obj.value="Cargando";
            }
            if (ajax.readyState==4) {
                dato1 = ajax.responseText;

                    if (dato1.length == 5){ //ok
                        alert("Se guardo los cambios");
                        document.getElementById(boton).className='btn btn-danger btn-mini';
                        document.getElementById(boton).innerHTML="<i class='icon-envelope icon-white'></i> Informar";
                        
                    } else {
                        alert("error: no se realizo los cambios");
                    }
            }
        }
        ajax.send(null);   
}


function upd_userformPrepPreTrad(pedido){
    var dato;
    var Estado = "Cbo"+pedido+"3"; 
    var Chkanalisistm="Chkanalisistm"+pedido;
    var Chk1roexporteus99="Chk1roexporteus99"+pedido;
    var Chkpretransl75="Chkpretransl75"+pedido;
    var Chktraducir100="Chktraducir100"+pedido;
    var Chk2doexporteus99="Chk2doexporteus99"+pedido;
    var Chkborrarunidadesnotraducibles="Chkborrarunidadesnotraducibles"+pedido;
    var Chkalfabetic="Chkalfabetic"+pedido;
    var Chkrtffortrans="Chkrtffortrans"+pedido;
    var Chkcrearttx="Chkcrearttx"+pedido;
    var Chkanalisisfinal="Chkanalisisfinal"+pedido;
    var Chkpreparacionter="Chkpreparacionter"+pedido;
    var txtobservacion2="txtobservacion2"+pedido;
    var boton="btnR"+pedido+"3";  
    
    
    

    var EstadoCad = document.getElementById(Estado).value;  
    (document.getElementById(Chkanalisistm).checked) ? ChkanalisistmCad = "S" : ChkanalisistmCad = "N";
    (document.getElementById(Chk1roexporteus99).checked) ? Chk1roexporteus99Cad = "S" : Chk1roexporteus99Cad = "N";
    (document.getElementById(Chkpretransl75).checked) ? Chkpretransl75Cad = "S" : Chkpretransl75Cad = "N";
    (document.getElementById(Chktraducir100).checked) ? Chktraducir100Cad = "S" : Chktraducir100Cad = "N";
    (document.getElementById(Chk2doexporteus99).checked) ? Chk2doexporteus99Cad = "S" : Chk2doexporteus99Cad = "N";
    (document.getElementById(Chkborrarunidadesnotraducibles).checked) ? ChkborrarunidadesnotraduciblesCad = "S" : ChkborrarunidadesnotraduciblesCad = "N";
    (document.getElementById(Chkalfabetic).checked) ? ChkalfabeticCad = "S" : ChkalfabeticCad = "N";
    (document.getElementById(Chkrtffortrans).checked) ? ChkrtffortransCad = "S" : ChkrtffortransCad = "N";
    (document.getElementById(Chkcrearttx).checked) ? ChkcrearttxCad = "S" : ChkcrearttxCad = "N";
    (document.getElementById(Chkanalisisfinal).checked) ? ChkanalisisfinalCad = "S" : ChkanalisisfinalCad = "N";
    (document.getElementById(Chkpreparacionter).checked) ? ChkpreparacionterCad = "S" : ChkpreparacionterCad = "N";    
    var txtobservacion2Cad = document.getElementById(txtobservacion2).value;  

/*    alert (EstadoCad + ", " +
            ChkanalisistmCad + ", " +
            Chk1roexporteus99Cad + ", " +
            Chkpretransl75Cad + ", " +
            Chktraducir100Cad + ", " +
            Chk2doexporteus99Cad + ", " +
            ChkborrarunidadesnotraduciblesCad + ", " +
            ChkalfabeticCad + ", " +
            ChkrtffortransCad + ", " +
            ChkcrearttxCad + ", " +
            ChkanalisisfinalCad + ", " +
            ChkpreparacionterCad + ", " +
            txtobservacion2Cad);    
*/

        ajax=nuevoAjax();
    ajax.open("GET", "upd_userformPrepPreTrad.php?pedido=" + pedido +
                                                    "&Estado=" + EstadoCad +
                                                    "&Chkanalisistm=" + ChkanalisistmCad +
                                                    "&Chk1roexporteus99=" + Chk1roexporteus99Cad +
                                                    "&Chkpretransl75=" + Chkpretransl75Cad +
                                                    "&Chktraducir100=" + Chktraducir100Cad +
                                                    "&Chk2doexporteus99=" + Chk2doexporteus99Cad +
                                                    "&Chkborrarunidadesnotraducibles=" + ChkborrarunidadesnotraduciblesCad +
                                                    "&Chkalfabetic=" + ChkalfabeticCad +
                                                    "&Chkrtffortrans=" + ChkrtffortransCad +
                                                    "&Chkcrearttx=" + ChkcrearttxCad +
                                                    "&Chkanalisisfinal=" + ChkanalisisfinalCad +
                                                    "&Chkpreparacionter=" + ChkpreparacionterCad +
                                                    "&txtobservacion2=" + txtobservacion2Cad  
                                                    ,true);

        ajax.onreadystatechange=function() {
            if (ajax.readyState==1){
                obj.value="Cargando";
            }
            if (ajax.readyState==4) {
                dato = ajax.responseText;
                //alert(dato.length);
                    if (dato.length == 5){
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


function upd_userformPrepTrad(pedido){
    var dato;
    var Estado = "Cbo"+pedido+"4"; 
    var Chktraduccion="Chktraduccion"+pedido;
    var Chkarchivofinal="Chkarchivofinal"+pedido;
    var txtobservacion7="txtobservacion7"+pedido;
    var boton="btnR"+pedido+"4";
    //alert (Estado);
    var EstadoCad = document.getElementById(Estado).value;  
    (document.getElementById(Chktraduccion).checked) ? ChktraduccionCad = "S" : ChktraduccionCad = "N";
    (document.getElementById(Chkarchivofinal).checked) ? ChkarchivofinalCad = "S" : ChkarchivofinalCad = "N";
    var txtobservacion7Cad = document.getElementById(txtobservacion7).value;  

    /* alert (EstadoCad + ", " +
            ChktraduccionCad + ", " +
            ChkarchivofinalCad + ", " +
            txtobservacion7Cad);    
*/

        ajax=nuevoAjax();
    ajax.open("GET", "upd_userformPrepTrad.php?pedido=" + pedido +
                                                    "&Estado=" + EstadoCad +
                                                    "&Chktraduccion=" + ChktraduccionCad +
                                                    "&Chkarchivofinal=" + ChkarchivofinalCad +
                                                    "&txtobservacion7=" + txtobservacion7Cad  
                                                    ,true);

        ajax.onreadystatechange=function() {
            if (ajax.readyState==1){
                obj.value="Cargando";
            }
            if (ajax.readyState==4) {
                dato = ajax.responseText;
                    if (dato.length == 5){
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


function upd_userformPrepCorre(pedido){
    var dato;
    var Estado = "Cbo"+pedido+"7"; 
    var txtobservacion8="txtobservacion8"+pedido;
    var boton="btnR"+pedido+"7";

    var EstadoCad = document.getElementById(Estado).value;  
    var txtobservacion8Cad = document.getElementById(txtobservacion8).value;  

    /* alert (EstadoCad + ", " +
            txtobservacion8Cad);    
*/

        ajax=nuevoAjax();
    ajax.open("GET", "upd_userformPrepCorre.php?pedido=" + pedido +
                                                    "&Estado=" + EstadoCad +
                                                    "&txtobservacion8=" + txtobservacion8Cad  
                                                    ,true);

        ajax.onreadystatechange=function() {
            if (ajax.readyState==1){
                obj.value="Cargando";
            }
            if (ajax.readyState==4) {
                dato = ajax.responseText;
                    if (dato.length == 5){
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


function upd_userformVerFinTrad(pedido){
    var dato;
    var Estado = "Cbo"+pedido+"5"; 
    //alert (Estado);
    var Chkactualizaciontm="Chkactualizaciontm"+pedido;
    var Chktraduccionfinal="Chktraduccionfinal"+pedido;
    var ChkCleanUp="ChkCleanUp"+pedido;
    var txtobservacion3="txtobservacion3"+pedido;
    var boton="btnR"+pedido+"5";






    var EstadoCad = document.getElementById(Estado).value;  
    (document.getElementById(Chkactualizaciontm).checked) ? ChkactualizaciontmCad = "S" : ChkactualizaciontmCad = "N";
    (document.getElementById(Chktraduccionfinal).checked) ? ChktraduccionfinalCad = "S" : ChktraduccionfinalCad = "N";
    (document.getElementById(ChkCleanUp).checked) ? ChkCleanUpCad = "S" : ChkCleanUpCad = "N";
    var txtobservacion3Cad = document.getElementById(txtobservacion3).value;  

   /* alert (EstadoCad + ", " +
            ChkactualizaciontmCad + ", " +
            ChktraduccionfinalCad + ", " +
            ChkCleanUpCad + ", " +
            txtobservacion3Cad);    
*/

        ajax=nuevoAjax();
    ajax.open("GET", "upd_userformVerFinTrad.php?pedido=" + pedido +
                                                    "&Estado=" + EstadoCad +
                                                    "&Chkactualizaciontm=" + ChkactualizaciontmCad +
                                                    "&Chktraduccionfinal=" + ChktraduccionfinalCad +
                                                    "&ChkCleanUp=" + ChkCleanUpCad +
                                                    "&txtobservacion3=" + txtobservacion3Cad  
                                                    ,true);

        ajax.onreadystatechange=function() {
            if (ajax.readyState==1){
                obj.value="Cargando";
            }
            if (ajax.readyState==4) {
                dato = ajax.responseText;
                    if (dato.length == 5){
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



function upd_userformVerFinFormFin(pedido){
    var dato;
    var Estado = "Cbo"+pedido+"6"; 

    var Chkformatofinal="Chkformatofinal"+pedido;
    var chkcambiaridioma="chkcambiaridioma"+pedido;
    var chkactualizarindice1="chkactualizarindice1"+pedido;
    var chkpocisionamiento="chkpocisionamiento"+pedido;
    var chkestiloletra="chkestiloletra"+pedido;
    var chkmayusculaminuscula="chkmayusculaminuscula"+pedido;
    var chknumerodecimales="chknumerodecimales"+pedido;
    var chkcodigosfinal="chkcodigosfinal"+pedido;
    var chkactualizarindice2="chkactualizarindice2"+pedido;
    var Chkverificarmayusmin="Chkverificarmayusmin"+pedido;    
    var txtobservacion4="txtobservacion4"+pedido;
    var boton="btnR"+pedido+"6";




    var EstadoCad = document.getElementById(Estado).value;  
    (document.getElementById(Chkformatofinal).checked) ? ChkformatofinalCad = "S" : ChkformatofinalCad = "N";
    (document.getElementById(chkcambiaridioma).checked) ? chkcambiaridiomaCad = "S" : chkcambiaridiomaCad = "N";
    (document.getElementById(chkactualizarindice1).checked) ? chkactualizarindice1Cad = "S" : chkactualizarindice1Cad = "N";
    (document.getElementById(chkpocisionamiento).checked) ? chkpocisionamientoCad = "S" : chkpocisionamientoCad = "N";
    (document.getElementById(chkestiloletra).checked) ? chkestiloletraCad = "S" : chkestiloletraCad = "N";
    (document.getElementById(chkmayusculaminuscula).checked) ? chkmayusculaminusculaCad = "S" : chkmayusculaminusculaCad = "N";
    (document.getElementById(chknumerodecimales).checked) ? chknumerodecimalesCad = "S" : chknumerodecimalesCad = "N";
    (document.getElementById(chkcodigosfinal).checked) ? chkcodigosfinalCad = "S" : chkcodigosfinalCad = "N";
    (document.getElementById(chkactualizarindice2).checked) ? chkactualizarindice2Cad = "S" : chkactualizarindice2Cad = "N";
    (document.getElementById(Chkverificarmayusmin).checked) ? ChkverificarmayusminCad = "S" : ChkverificarmayusminCad = "N";    
    var txtobservacion4Cad = document.getElementById(txtobservacion4).value;  
    //alert (Estado);
   /* alert (EstadoCad + ", " +
            ChkformatofinalCad + ", " +
            chkcambiaridiomaCad + ", " +
            chkactualizarindice1Cad + ", " +
            chkpocisionamientoCad + ", " +
            chkestiloletraCad + ", " +
            chkmayusculaminusculaCad + ", " +
            chknumerodecimalesCad + ", " +
            chkcodigosfinalCad + ", " +
            chkactualizarindice2Cad + ", " +
            ChkverificarmayusminCad + ", " +            
            txtobservacion4Cad);    
*/

        ajax=nuevoAjax();
    ajax.open("GET", "upd_userformVerFinFormFin.php?pedido=" + pedido +
                                                    "&Estado=" + EstadoCad +
                                                    "&Chkformatofinal=" + ChkformatofinalCad +
                                                    "&chkcambiaridioma=" + chkcambiaridiomaCad +
                                                    "&chkactualizarindice1=" + chkactualizarindice1Cad +
                                                    "&chkpocisionamiento=" + chkpocisionamientoCad +
                                                    "&chkestiloletra=" + chkestiloletraCad +
                                                    "&chkmayusculaminuscula=" + chkmayusculaminusculaCad +
                                                    "&chknumerodecimales=" + chknumerodecimalesCad +
                                                    "&chkcodigosfinal=" + chkcodigosfinalCad +
                                                    "&chkactualizarindice2=" + chkactualizarindice2Cad +      
                                                    "&Chkverificarmayusmin=" + ChkverificarmayusminCad +                                                      
                                                    "&txtobservacion4=" + txtobservacion4Cad  
                                                    ,true);

        ajax.onreadystatechange=function() {
            if (ajax.readyState==1){
                obj.value="Cargando";
            }
            if (ajax.readyState==4) {
                dato = ajax.responseText;
                    //alert(dato.length);
                    if (dato.length == 5){
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