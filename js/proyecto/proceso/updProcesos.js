function upd_userformPrepSalto(pedido) {
    var Estado = "Cbo" + pedido + "1";
    var ChkPDFGlobal = "ChkPDFGlobal" + pedido;
    var Chksaltolinea = "Chksaltolinea" + pedido;
    var Chkchekearttx = "Chkchekearttx" + pedido;
    var txtobservacion5 = "txtobservacion5" + pedido;
    var boton = "btnR" + pedido + "1";

    var EstadoCad = document.getElementById(Estado).value;
    (document.getElementById(ChkPDFGlobal).checked) ? ChkPDFGlobalCad = "S" : ChkPDFGlobalCad = "N";
    (document.getElementById(Chksaltolinea).checked) ? ChksaltolineaCad = "S" : ChksaltolineaCad = "N";
    (document.getElementById(Chkchekearttx).checked) ? ChkchekearttxCad = "S" : ChkchekearttxCad = "N";
    var txtobservacion5Cad = document.getElementById(txtobservacion5).value;


    myArray = [];
    myArray[0] = pedido; // $pedido = $_GET['pedido'];
    myArray[1] = EstadoCad; //$salto_linea=$_GET['Estado'];
    myArray[2] = ChkPDFGlobalCad; //$ChkPDFGlobal = $_GET['ChkPDFGlobal'];
    myArray[3] = ChksaltolineaCad; //$Chksaltolinea = $_GET['Chksaltolinea'];
    myArray[4] = ChkchekearttxCad; //$Chkchekearttx = $_GET['Chkchekearttx'];
    myArray[5] = txtobservacion5Cad;   //$txtobservacion5 = $_GET['txtobservacion5'];   


    $.ajax({
        url: 'http://localhost/web2/proyectos/procesos/proceso/upd_userformPrepSalto/',
        type: "POST",
        data: {myArray: myArray},
        success: function(resp) {
            if (resp == "") { //HH: pregunto si no hay ningun mensaje de error 
                console.log(resp);  //HH: verificamos los datos que se esta enviando al servidor
                alert("Se guardo los cambios");
                document.getElementById(boton).className = 'btn btn-danger btn-mini';
                document.getElementById(boton).innerHTML = "<i class='icon-envelope icon-white'></i> Informar";
            } else {
                console.log(resp);
                alert("error: no se realizo los cambios");
            }
        },
        error: function(resp) {
            console.log(resp);
            alert("error: no se realizo los cambios");
        }
    });
}


function upd_userformPrepFormateo(pedido) {
    var Estado = "Cbo" + pedido + "2";
    var Chkeditacionformateo = "Chkeditacionformateo" + pedido;
    var Chkttx1 = "Chkttx1" + pedido;
    var Estado2 = "Cborealizadopor6" + pedido;
    var Chkeditaciontextofoto = "Chkeditaciontextofoto" + pedido;
    var txtobservacion1 = "txtobservacion1" + pedido;
    var boton = "btnR" + pedido + "2";

    var EstadoCad = document.getElementById(Estado).value;

    (document.getElementById(Chkeditacionformateo).checked) ? ChkeditacionformateoCad = "S" : ChkeditacionformateoCad = "N";
    (document.getElementById(Chkttx1).checked) ? Chkttx1Cad = "S" : Chkttx1Cad = "N";
    var Estado2Cad = document.getElementById(Estado2).value;
    (document.getElementById(Chkeditaciontextofoto).checked) ? ChkeditaciontextofotoCad = "S" : ChkeditaciontextofotoCad = "N";
    var txtobservacion1Cad = document.getElementById(txtobservacion1).value;


    myArray = [];
    myArray[0] = pedido; // $pedido = $_GET['pedido'];
    myArray[1] = EstadoCad; //Estado
    myArray[2] = ChkeditacionformateoCad; //Chkeditacionformateo
    myArray[3] = Chkttx1Cad; //Chkttx1
    myArray[4] = Estado2Cad; //Estado2
    myArray[5] = ChkeditaciontextofotoCad;   //Chkeditaciontextofoto
    myArray[6] = txtobservacion1Cad;   //txtobservacion1


    $.ajax({
        url: 'http://localhost/web2/proyectos/procesos/proceso/upd_userformPrepFormateo/',
        type: "POST",
        data: {myArray: myArray},
        success: function(resp) {
            if (resp == "") { //HH: pregunto si no hay ningun mensaje de error 
                console.log(resp);  //HH: verificamos los datos que se esta enviando al servidor
                alert("Se guardo los cambios");
                document.getElementById(boton).className = 'btn btn-danger btn-mini';
                document.getElementById(boton).innerHTML = "<i class='icon-envelope icon-white'></i> Informar";
            } else {
                console.log(resp);
                alert("error: no se realizo los cambios");
            }
        },
        error: function(resp) {
            console.log(resp);
            alert("error: no se realizo los cambios");
        }
    });


}


function upd_userformPrepPreTrad(pedido) {
    var dato;
    var Estado = "Cbo" + pedido + "3";
    var Chkanalisistm = "Chkanalisistm" + pedido;
    var Chk1roexporteus99 = "Chk1roexporteus99" + pedido;
    var Chkpretransl75 = "Chkpretransl75" + pedido;
    var Chktraducir100 = "Chktraducir100" + pedido;
    var Chk2doexporteus99 = "Chk2doexporteus99" + pedido;
    var Chkborrarunidadesnotraducibles = "Chkborrarunidadesnotraducibles" + pedido;
    var Chkalfabetic = "Chkalfabetic" + pedido;
    var Chkrtffortrans = "Chkrtffortrans" + pedido;
    var Chkcrearttx = "Chkcrearttx" + pedido;
    var Chkanalisisfinal = "Chkanalisisfinal" + pedido;
    var Chkpreparacionter = "Chkpreparacionter" + pedido;
    var txtobservacion2 = "txtobservacion2" + pedido;
    var boton = "btnR" + pedido + "3";




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

    myArray = [];
    myArray[0] = pedido; // $pedido = $_GET['pedido'];
    myArray[1] = EstadoCad; //Estado
    myArray[2] = ChkanalisistmCad; //Chkanalisistm
    myArray[3] = Chk1roexporteus99Cad; //Chk1roexporteus99
    myArray[4] = Chkpretransl75Cad; //Chkpretransl75
    myArray[5] = Chktraducir100Cad;   //Chktraducir100
    myArray[6] = Chk2doexporteus99Cad;   //Chk2doexporteus99
    myArray[7] = ChkborrarunidadesnotraduciblesCad;   //Chkborrarunidadesnotraducibles
    myArray[8] = ChkalfabeticCad;   //Chkalfabetic
    myArray[9] = ChkrtffortransCad;   //Chkrtffortrans
    myArray[10] = ChkcrearttxCad;   //Chkcrearttx
    myArray[11] = ChkanalisisfinalCad;   //Chkanalisisfinal
    myArray[12] = ChkpreparacionterCad;   //Chkpreparacionter
    myArray[13] = txtobservacion2Cad;   //txtobservacion2


    $.ajax({
        url: 'http://localhost/web2/proyectos/procesos/proceso/upd_userformPrepPreTrad/',
        type: "POST",
        data: {myArray: myArray},
        success: function(resp) {
            if (resp == "") { //HH: pregunto si no hay ningun mensaje de error 
                console.log(resp);  //HH: verificamos los datos que se esta enviando al servidor
                alert("Se guardo los cambios");
                document.getElementById(boton).className = 'btn btn-danger btn-mini';
                document.getElementById(boton).innerHTML = "<i class='icon-envelope icon-white'></i> Informar";
            } else {
                console.log(resp);
                alert("error: no se realizo los cambios");
            }
        },
        error: function(resp) {
            console.log(resp);
            alert("error: no se realizo los cambios");
        }
    });


}


function upd_userformPrepTrad(pedido) {
    var Estado = "Cbo" + pedido + "4";
    var Chktraduccion = "Chktraduccion" + pedido;
    var Chkarchivofinal = "Chkarchivofinal" + pedido;
    var txtobservacion7 = "txtobservacion7" + pedido;
    var boton = "btnR" + pedido + "4";
    //alert (Estado);
    var EstadoCad = document.getElementById(Estado).value;
    (document.getElementById(Chktraduccion).checked) ? ChktraduccionCad = "S" : ChktraduccionCad = "N";
    (document.getElementById(Chkarchivofinal).checked) ? ChkarchivofinalCad = "S" : ChkarchivofinalCad = "N";
    var txtobservacion7Cad = document.getElementById(txtobservacion7).value;

    myArray = [];
    myArray[0] = pedido; // $pedido = $_GET['pedido'];
    myArray[1] = EstadoCad; //Estado
    myArray[2] = ChktraduccionCad; //Chkeditacionformateo
    myArray[3] = ChkarchivofinalCad; //Chkttx1
    myArray[4] = txtobservacion7Cad; //Estado2



    $.ajax({
        url: 'http://localhost/web2/proyectos/procesos/proceso/upd_userformPrepTrad/',
        type: "POST",
        data: {myArray: myArray},
        success: function(resp) {
            if (resp == "") { //HH: pregunto si no hay ningun mensaje de error 
                console.log(resp);  //HH: verificamos los datos que se esta enviando al servidor
                alert("Se guardo los cambios");
                document.getElementById(boton).className = 'btn btn-danger btn-mini';
                document.getElementById(boton).innerHTML = "<i class='icon-envelope icon-white'></i> Informar";
            } else {
                console.log(resp);
                alert("error: no se realizo los cambios");
            }
        },
        error: function(resp) {
            console.log(resp);
            alert("error: no se realizo los cambios");
        }
    });


}


function upd_userformPrepCorre(pedido) {
    var dato;
    var Estado = "Cbo" + pedido + "7";
    var txtobservacion8 = "txtobservacion8" + pedido;
    var boton = "btnR" + pedido + "7";

    var EstadoCad = document.getElementById(Estado).value;
    var txtobservacion8Cad = document.getElementById(txtobservacion8).value;


    myArray = [];
    myArray[0] = pedido; // $pedido = $_GET['pedido'];
    myArray[1] = EstadoCad; //Estado
    myArray[2] = txtobservacion8Cad; //txtobservacion8



    $.ajax({
        url: 'http://localhost/web2/proyectos/procesos/proceso/upd_userformPrepCorre/',
        type: "POST",
        data: {myArray: myArray},
        success: function(resp) {
            if (resp == "") { //HH: pregunto si no hay ningun mensaje de error 
                console.log(resp);  //HH: verificamos los datos que se esta enviando al servidor
                alert("Se guardo los cambios");
                document.getElementById(boton).className = 'btn btn-danger btn-mini';
                document.getElementById(boton).innerHTML = "<i class='icon-envelope icon-white'></i> Informar";
            } else {
                console.log(resp);
                alert("error: no se realizo los cambios");
            }
        },
        error: function(resp) {
            console.log(resp);
            alert("error: no se realizo los cambios");
        }
    });


}


function upd_userformVerFinTrad(pedido) {
    var Estado = "Cbo" + pedido + "5";
    var Chkactualizaciontm = "Chkactualizaciontm" + pedido;
    var Chktraduccionfinal = "Chktraduccionfinal" + pedido;
    var ChkCleanUp = "ChkCleanUp" + pedido;
    var txtobservacion3 = "txtobservacion3" + pedido;
    var boton = "btnR" + pedido + "5";






    var EstadoCad = document.getElementById(Estado).value;
    (document.getElementById(Chkactualizaciontm).checked) ? ChkactualizaciontmCad = "S" : ChkactualizaciontmCad = "N";
    (document.getElementById(Chktraduccionfinal).checked) ? ChktraduccionfinalCad = "S" : ChktraduccionfinalCad = "N";
    (document.getElementById(ChkCleanUp).checked) ? ChkCleanUpCad = "S" : ChkCleanUpCad = "N";
    var txtobservacion3Cad = document.getElementById(txtobservacion3).value;


    myArray = [];
    myArray[0] = pedido; // $pedido = $_GET['pedido'];
    myArray[1] = EstadoCad; //Estado
    myArray[2] = ChkactualizaciontmCad; //Chkactualizaciontm
    myArray[3] = ChktraduccionfinalCad; //Chktraduccionfinal
    myArray[4] = ChkCleanUpCad; //ChkCleanUp
    myArray[5] = txtobservacion3Cad; //txtobservacion3



    $.ajax({
        url: 'http://localhost/web2/proyectos/procesos/proceso/upd_userformVerFinTrad/',
        type: "POST",
        data: {myArray: myArray},
        success: function(resp) {
            if (resp == "") { //HH: pregunto si no hay ningun mensaje de error 
                console.log(resp);  //HH: verificamos los datos que se esta enviando al servidor
                alert("Se guardo los cambios");
                document.getElementById(boton).className = 'btn btn-danger btn-mini';
                document.getElementById(boton).innerHTML = "<i class='icon-envelope icon-white'></i> Informar";
            } else {
                console.log(resp);
                alert("error: no se realizo los cambios");
            }
        },
        error: function(resp) {
            console.log(resp);
            alert("error: no se realizo los cambios");
        }
    });

}



function upd_userformVerFinFormFin(pedido) {
 
    var Estado = "Cbo" + pedido + "6";

    var Chkformatofinal = "Chkformatofinal" + pedido;
    var chkcambiaridioma = "chkcambiaridioma" + pedido;
    var chkactualizarindice1 = "chkactualizarindice1" + pedido;
    var chkpocisionamiento = "chkpocisionamiento" + pedido;
    var chkestiloletra = "chkestiloletra" + pedido;
    var chkmayusculaminuscula = "chkmayusculaminuscula" + pedido;
    var chknumerodecimales = "chknumerodecimales" + pedido;
    var chkcodigosfinal = "chkcodigosfinal" + pedido;
    var chkactualizarindice2 = "chkactualizarindice2" + pedido;
    var Chkverificarmayusmin = "Chkverificarmayusmin" + pedido;
    var txtobservacion4 = "txtobservacion4" + pedido;
    var boton = "btnR" + pedido + "6";




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

 myArray = [];
    myArray[0] = pedido; // $pedido = $_GET['pedido'];
    myArray[1] = EstadoCad; //Estado
    myArray[2] = ChkformatofinalCad; //
    myArray[3] = chkcambiaridiomaCad; //
    myArray[4] = chkactualizarindice1Cad; //
    myArray[5] = chkpocisionamientoCad; //
    myArray[6] = chkestiloletraCad; //
    myArray[7] = chkmayusculaminusculaCad; //
    myArray[8] = chknumerodecimalesCad; //
    myArray[9] = chkcodigosfinalCad; //
    myArray[10] = chkactualizarindice2Cad; //
    myArray[11] = ChkverificarmayusminCad; //
    myArray[12] = txtobservacion4Cad; //



    $.ajax({
        url: 'http://localhost/web2/proyectos/procesos/proceso/upd_userformVerFinFormFin/',
        type: "POST",
        data: {myArray: myArray},
        success: function(resp) {
            if (resp == "") { //HH: pregunto si no hay ningun mensaje de error 
                console.log(resp);  //HH: verificamos los datos que se esta enviando al servidor
                alert("Se guardo los cambios");
                document.getElementById(boton).className = 'btn btn-danger btn-mini';
                document.getElementById(boton).innerHTML = "<i class='icon-envelope icon-white'></i> Informar";
            } else {
                console.log(resp);
                alert("error: no se realizo los cambios");
            }
        },
        error: function(resp) {
            console.log(resp);
            alert("error: no se realizo los cambios");
        }
    });
    ajax = nuevoAjax();
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
            , true);

    
}