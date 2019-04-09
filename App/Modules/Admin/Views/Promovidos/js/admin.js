/**
 * Created by cybeiro on 7/8/17.
 */
function ineExtract(obj) {
    var mensaje = ($(obj).attr('active') == 1) ? 'Agregado a XLS':'Removido de XLS';
    var mensajt = ($(obj).attr('active') == 1) ? 'success':'warning';
    var consecutivo = $(obj).attr('uid');
    if($(obj).attr('es_seccional') == 1 || $(obj).attr('es_promotor') == 1){

        var es = ($(obj).attr('es_seccional') == 1) ? 'Es Seccional':'Es Promotor';

        swal("PROMOVIDOS",
            es,
            "warning");
    }else {
        $.ajax({
            url: "/Ajax/inePromovidos",
            type: "POST",
            dataType: "text",
            async: true,
            data: {
                consecutivo: consecutivo,
                es_promovido: $(obj).attr('es_promovido'),
                es_nuevo: $(obj).attr('uid'),
                paterno: $('#paterno_' + consecutivo).val(),
                materno: $('#materno_' + consecutivo).val(),
                nombres: $('#nombres_' + consecutivo).val(),
                seccion: $('#seccion_' + consecutivo).val(),
                clave_de_elector: $('#clave_de_elector_' + consecutivo).val(),
                status: $('#status' + consecutivo).val(),
                telefono: $('#telefono_' + consecutivo).val(),
                tiene_wsp: $('#tiene_wsp_' + consecutivo).val(),
                promotor_id: $('#promotor_id_' + consecutivo).val(),
                direccion_actual: $('#direccion_actual_' + consecutivo).val(),
            },
            success:
                function (json) {
                    //var data = $.parseJSON(json);
                    swal("PROMOVIDOS",
                        mensaje,
                        mensajt);
                    var addClazz = ($(obj).attr('active') == '0') ? 'btn-green' : 'btn-danger';
                    var removeClazz = ($(obj).attr('active') == '0') ? 'btn-danger' : 'btn-green';
                    var labelButton = ($(obj).attr('active') == '0') ? '<i class="fa fa-user" ></i> Agregar' : '<i class="fa fa-lock" ></i> Eliminar';
                    var labelTitle = ($(obj).attr('active') == '0') ? 'Agregar' : 'Importado';
                    var activeVal = ($(obj).attr('active') == '1') ? '0' : '1';

                    $('#deactivate_' + $(obj).attr('uid')).removeClass(removeClazz);
                    $('#deactivate_' + $(obj).attr('uid')).addClass(addClazz);
                    $('#deactivate_' + $(obj).attr('uid')).html(labelButton);
                    $('#deactivate_' + $(obj).attr('uid')).attr('active', activeVal);
                    $('#deactivate_' + $(obj).attr('uid')).attr('title', labelTitle);

                    var es_promovido = ($(obj).attr('es_promovido') == 1)? 0 : 1;
                    $('#deactivate_' + $(obj).attr('uid')).attr('es_promovido', es_promovido);
                },
            error:
                function (xhr, textStatus, errorThrown) {
                    console.log(textStatus);
                }
        });
    }
}

function ineUpdate(obj) {
    var mensaje =  'Registro Actualizado';
    var mensajt = 'success';
    var consecutivo = $(obj).attr('uid');

    $.ajax({
        url: "/Ajax/inePromovidosUp",
        type: "POST",
        dataType: "text",
        async: true,
        data: {
            consecutivo: consecutivo,
            paterno: $('#paterno_' + consecutivo).val(),
            materno: $('#materno_' + consecutivo).val(),
            nombres: $('#nombres_' + consecutivo).val(),
            seccion: $('#seccion_' + consecutivo).val(),
            clave_de_elector: $('#clave_de_elector_' + consecutivo).val(),
            status: $('#status_' + consecutivo).val(),
            telefono: $('#telefono_' + consecutivo).val(),
            tiene_wsp: $('#tiene_wsp_' + consecutivo).val(),
            promotor_id: $('#promotor_id_' + consecutivo).val(),
            direccion_actual: $('#direccion_actual_' + consecutivo).val(),
        },
        success:
            function (json) {
                //var data = $.parseJSON(json);
                swal("PROMOVIDOS",
                    mensaje,
                    mensajt);
            },
        error:
            function (xhr, textStatus, errorThrown) {
                console.log(textStatus);
            }
    });
}

function getUser()
{
    $.ajax({
        url: "/Ajax/searchPromovidos",
        type: "POST",
        dataType: "text",
        async: true,
        data: {
            search: $("#search-by-id").val(),
        },
        success:
            function(json)
            {
                console.log(json);
                console.log(json.html);
                var data = $.parseJSON(json);

                $('#main_users_list').html(data.html);
            },
        error:
            function(xhr, textStatus, errorThrown)
            {
                console.log(textStatus);
            }
    });
}

function mostrarXLS()
{
    $.ajax({
        url: "/Ajax/mostrarXLS",
        type: "POST",
        dataType: "text",
        async: true,
        data: {
            xls_xtr: 1,
        },
        success:
            function(json)
            {
                console.log(json);
                console.log(json.html);
                var data = $.parseJSON(json);

                $('#main_users_list').html(data.html);
            },
        error:
            function(xhr, textStatus, errorThrown)
            {
                console.log(textStatus);
            }
    });
}


function generarXLS()
{
    $.ajax({
        url: "/Ajax/export_xls",
        type: "POST",
        dataType: "text",
        async: true,
        data: {
            export: true,
        },
        success:
            function(json)
            {
                console.log(json);
                var data = $.parseJSON(json);
            },
        error:
            function(xhr, textStatus, errorThrown)
            {
                console.log(textStatus);
            }
    });
}

function tieneWsp(obj)
{
    var id = $(obj).attr("id");
    var obj_c = $(obj).attr("c");

    $('#tiene_wsp_'+obj_c).val($(obj).attr('value'));

}

function estatusPromovido(obj)
{
    var id = $(obj).attr("id");
    var obj_c = $(obj).attr("c");
    $('#status_'+obj_c).val($(obj).attr('value'));
}
