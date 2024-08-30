$(document).ready(function () {
    $("#BotonActivar").on("click", function () {
        const data_url = $(this).attr("data_url");
        console.log(data_url);
        const id = $(this).attr("data_id");
        var data = {
            id: id,
        };
        $.ajax({
            url: data_url,
            type: "GET",
            data: data,
            success: function (respuesta) {
                console.log(respuesta);
                if (respuesta.mensaje == "activo") {
                    Sistema.notificaciones(
                        "La unidad se activo de manera correcta",
                        "Sistema",
                        "success"
                    );
                    $('#BotonActivar').html("Desactivar");
                } else {
                    Sistema.notificaciones(
                        "La unidad se desactivo de manera correcta",
                        "Sistema",
                        "warning"
                    );
                    $('#BotonActivar').html("Activar");
                }
            },
            error: function () {},
        });
    });
});
