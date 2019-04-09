/**
 * Created by cybeiro on 7/8/17.
 */
function ineExtract(obj) {
    var mensaje = ($(obj).attr('active') == 1) ? 'Agregado a XLS':'Removido de XLS';
    var mensajt = ($(obj).attr('active') == 1) ? 'success':'warning';
    $.ajax({
        url: "/Ajax/ineExtract",
        type: "POST",
        dataType: "text",
        async: true,
        data: {
            consecutivo: $(obj).attr('uid'),
            xls_xtr:$(obj).attr('active')
        },
        success:
            function(json)
            {
                //var data = $.parseJSON(json);
                swal("INE",
                    mensaje,
                    mensajt);
                var addClazz = ($(obj).attr('active')=='0') ? 'btn-green' : 'btn-danger';
                var removeClazz = ($(obj).attr('active')=='0') ? 'btn-danger' : 'btn-green';
                var labelButton = ($(obj).attr('active')=='0') ? '<i class="fa fa-user" ></i> Agregar' : '<i class="fa fa-lock" ></i> Eliminar';
                var labelTitle = ($(obj).attr('active')=='0') ? 'Agregar' : 'Importado';
                var activeVal = ($(obj).attr('active')=='1') ? '0' : '1';

                $('#deactivate_'+$(obj).attr('uid')).removeClass(removeClazz);
                $('#deactivate_'+$(obj).attr('uid')).addClass(addClazz);
                $('#deactivate_'+$(obj).attr('uid')).html(labelButton);
                $('#deactivate_'+$(obj).attr('uid')).attr('active',activeVal);
                $('#deactivate_'+$(obj).attr('uid')).attr('title',labelTitle);
            },
        error:
            function(xhr, textStatus, errorThrown)
            {
                console.log(textStatus);
            }
    });
}

function getUser()
{
    $.ajax({
        url: "/Ajax/searchUser",
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

function changePromotor() {
    $.ajax({
        url: "/Ajax/setPromotor",
        type: "POST",
        dataType: "text",
        async: true,
        data: {
            promotor_id: $('#promotor_id').val(),
        },
        success:
            function(json)
            {
                console.log(json);

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
            promotor_id: $('#promotor_id').val(),
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
            promotor_id: $('#promotor_id').val(),

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
