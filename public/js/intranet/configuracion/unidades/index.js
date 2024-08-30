$(document).ready(function () {
//--------------------------------------------------------------------------
$("#clinica_id").on("change", function () {
    vaciarTabla("#tablaUnidades","#tbody_unidades");
    const data_url = $(this).attr("data_url");
    const id = $(this).val();
    var data = {
        id: id,
    };
    $.ajax({
        url: data_url,
        type: "GET",
        data: data,
        success: function (respuesta) {
            respuesta_tabla_html_fin = '';
            if (respuesta.unidades.length > 0) {
                //================================================================================
                llenarTablaUnidades(respuesta.unidades);
                //================================================================================
            }
        },
        error: function () {},
    });
});
//--------------------------------------------------------------------------
});

function llenarTablaUnidades(unidades) {
    var respuesta_tabla_html = '';
    var spanActivo = '';

    var unidades_edit_ini = $('#unidades_edit').attr("data_url");
    unidades_edit_ini = unidades_edit_ini.substring(0, unidades_edit_ini.length - 1);
    const unidades_edit_fin = unidades_edit_ini;

    var unidades_active_ini = $('#unidades_active').attr("data_url");
    unidades_active_ini = unidades_active_ini.substring(0, unidades_active_ini.length - 1);
    const unidades_active_fin = unidades_active_ini;

    const permiso_unidades_edit = $('#permiso_unidades_edit').val();
    const permiso_unidades_active = $('#permiso_unidades_active').val();
    //================================================================================
    console.log(unidades);

    $.each(unidades, function(index, unidad) {
        respuesta_tabla_html += '<tr>';
        respuesta_tabla_html += '<td class="text-center">' + unidad.id + '</td>';
        respuesta_tabla_html += '<td class="text-center">' + unidad.unidad + '</td>';
        if (unidad.estado == 1) {
            spanActivo = '<span class="badge bg-success">Activa</span>';
        } else {
            spanActivo = '<span class="badge bg-danger">Inactiva</span>';
        }
        respuesta_tabla_html += '<td class="text-center">' + spanActivo + '</td>';
        respuesta_tabla_html += '<td class="d-flex justify-content-evenly align-unidades-center">';
        if (permiso_unidades_edit == 1) {
            respuesta_tabla_html += '<a href="' + unidades_edit_fin + unidad.id + '" class="btn-accion-tabla tooltipsC"';
            respuesta_tabla_html += 'title="Editar este registro">';
            respuesta_tabla_html += '<i class="fas fa-pen-square"></i>';
            respuesta_tabla_html += '</a>';
        }else{
            respuesta_tabla_html += '<span class="text-danger">---</span>';
        }
        respuesta_tabla_html += '</td>';
        respuesta_tabla_html += '</tr>';
    });
    //================================================================================
    $("#tbody_unidades").html(respuesta_tabla_html);
    asignarDataTableAjax("#tablaUnidades",'Listado de Unidades',5);
}
