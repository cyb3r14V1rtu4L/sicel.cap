/**
 * Created by cybeiro on 7/8/17.
 */
function ineExtract(obj) {
    var mensaje = ($(obj).attr('active') == 1) ? 'Agregado a XLS':'Removido de XLS';
    var mensajt = ($(obj).attr('active') == 1) ? 'success':'warning';
    var consecutivo = $(obj).attr('uid');
    if($(obj).attr('es_seccional') == 1){
        swal("PROMOTORES",
            "Es Seccional",
            "warning");
    }else {
        $.ajax({
            url: "/Ajax/inePromotores",
            type: "POST",
            dataType: "text",
            async: true,
            data: {
                consecutivo: consecutivo,
                es_promotor: $(obj).attr('es_promotor'),
                es_nuevo: $(obj).attr('uid'),
                clave_de_elector: $('#clave_de_elector_' + consecutivo).val(),
                municipio_txt: $('#municipio_' + consecutivo).val(),
                fecha_grabo: $('#fecha_grabo_' + consecutivo).val(),
                seccion: $('#seccion_' + consecutivo).val(),
                paterno: $('#paterno_' + consecutivo).val(),
                materno: $('#materno_' + consecutivo).val(),
                nombres: $('#nombres_' + consecutivo).val(),
                edad: $('#edad_' + consecutivo).val(),
                direccion_actual: $('#direccion_actual_' + consecutivo).val(),
                telefono: $('#telefono_' + consecutivo).val(),
                facebook: $('#facebook_' + consecutivo).val(),
                correo: $('#correo_' + consecutivo).val(),
                ocupacion: $('#ocupacion_' + consecutivo).val(),
                lugar_trabajo: $('#lugar_trabajo_' + consecutivo).val(),
                horario_disponible: $('#horario_disponible_' + consecutivo).val(),
                seccional_id: $('#seccional_id_' + consecutivo).val(),
                comentarios: $('#comentarios_' + consecutivo).val(),
            },
            success:
                function (json) {
                    //var data = $.parseJSON(json);
                    swal("PROMOTORES",
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
        url: "/Ajax/inePromotoresUp",
        type: "POST",
        dataType: "text",
        async: true,
        data: {
            consecutivo: consecutivo,
            municipio_txt: $('#municipio_' + consecutivo).val(),
            fecha_grabo: $('#fecha_grabo_' + consecutivo).val(),
            seccion: $('#seccion_' + consecutivo).val(),
            paterno: $('#paterno_' + consecutivo).val(),
            materno: $('#materno_' + consecutivo).val(),
            nombres: $('#nombres_' + consecutivo).val(),
            edad: $('#edad_' + consecutivo).val(),
            direccion_actual: $('#direccion_actual_' + consecutivo).val(),
            telefono: $('#telefono_' + consecutivo).val(),
            facebook: $('#facebook_' + consecutivo).val(),
            correo: $('#correo_' + consecutivo).val(),
            ocupacion: $('#ocupacion_' + consecutivo).val(),
            lugar_trabajo: $('#lugar_trabajo_' + consecutivo).val(),
            horario_disponible: $('#horario_disponible_' + consecutivo).val(),
            seccional_id: $('#seccional_id_' + consecutivo).val(),
            comentarios: $('#comentarios_' + consecutivo).val(),
        },
        success:
            function (json) {
                //var data = $.parseJSON(json);
                swal("PROMOTORES",
                    mensaje,
                    mensajt);
                var addClazz = ($(obj).attr('active') == '0') ? 'btn-green' : 'btn-danger';

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
        url: "/Ajax/searchPromotores",
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
