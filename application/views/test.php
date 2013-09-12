$('#guardar_todo').click(function(event) {
$('#pregunton').modal('hide');
var idnota_credito;
var segundopaso = false;
var idgasto = $.trim($("#idgasto").val());
var fecha_recepcion = $.trim($("#fecha_recepcion").val());
var fecha_emision = $.trim($("#fecha_emision").val());
var numerorecibo = $.trim($("#num_recibo_serie").val())+ "-" +$.trim($("#num_recibo").val());

if($("#gastos-items tbody tr").length<1){
$.sticky("<i class='icon-exclamation-sign'></i> No se puede guardar, agregar item", {autoclose : 3200, position: "top-right", type: "st-error" });
return false;
}



for (var i=1;i<Registro.nota_cd.length;i++){
    var item = $('tr#'+i).children();
    var frena = false;
    item.removeAttr('style')
    if(Registro.nota_cd[i]['cuenta']==''){
    $.sticky("<i class='icon-exclamation-sign'></i> Seleccione el tipo de cuenta", {autoclose : 3200, position: "top-right", type: "st-error" });
    item.css('backgroundColor','#fcf8e3')
    frena = true;
    }

    if(Registro.nota_cd[i]['idmaterial']==''){
    $.sticky("<i class='icon-exclamation-sign'></i> Seleccione el Material", {autoclose : 3200, position: "top-right", type: "st-error" });
    item.css('backgroundColor','#fcf8e3')
    frena = true;
    }

    if(Registro.nota_cd[i]['idunidades_medida']==''){
    $.sticky("<i class='icon-exclamation-sign'></i> Seleccione la unidad de medida", {autoclose : 3200, position: "top-right", type: "st-error" });
    item.css('backgroundColor','#fcf8e3')
    frena = true;
    }

    if(frena) return false;
    }

    $.ajax({
    url : "<?php echo site_url('/modulos/contabilidad/notacredito/agregar'); ?>",
    type : 'POST',
    dataType: 'json',
    async : false,
    data : {
    idgasto :idgasto,
    total :Registro.totalG,
    estado :1,
    numrecibo :numerorecibo,
    fecha_recepcion:fecha_recepcion,
    fecha_emision :fecha_emision,
    totaligv :Registro.totalIGVG,
    },
    complete: function(xhr, textStatus) {},
    success: function(data, textStatus, xhr) {
    idnota_credito = data;
    for (var i=1;i<Registro.nota_cd.length;i++){
        Registro.nc_detalle(idnota_credito,i);
        }
        window.opener.location.reload(false);
        //window.close();
        },
        error: function(xhr, textStatus, errorThrown) {}
        });