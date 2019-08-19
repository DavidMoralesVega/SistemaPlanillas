function Mayus(elemento) {
    elemento.value = elemento.value.toUpperCase();
}

function GenerarUsuario() {
    var codigo = "";
    var Nombre = document.getElementById("UINombre").value;
    var InicialNombre = Nombre.substr(0, 1);

    codigo += InicialNombre;

    var Apellidos = document.getElementById("UIApellidos").value;

    array = Apellidos.split(" "),
        total = array.length,
        InicialApellido = "";

    for (var i = 0; i < total; InicialApellido += array[i][0], i++);

    codigo += InicialApellido;

    document.getElementById("UIUser").value = codigo;
}

$(".TablaUsuario tbody").on("click", "button#btnEditarUsuario", function() {

    var IdUsuario = $(this).attr("IdUsuario");

    var datos = new FormData();
    datos.append("IdUsuario", IdUsuario);

    $.ajax({
        url: "ajax/usuario.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {

            $("#UANombre").val(response["Nombre"]);
            $("#UAApellidos").val(response["Apellidos"]);
            $("#UACedulaIdentidad").val(response["CedulaIdentidad"]);
            $("#UAUser").val(response["User"]);

            $("#UAIdUsuario").val(response["IdUsuario"]);
            // Trabajar con el option #UANivel
            // $("#UANivel").html(response["Nivel"]);

            if (response["Nivel"] == 'S') {
                $('#UANivel option[value="S"]').attr("selected", true);
            } else {
                $('#UANivel option[value="S"]').attr("selected", false);
            }

            if (response["Nivel"] == 'A') {
                $('#UANivel option[value="A"]').attr("selected", true);
            } else {
                $('#UANivel option[value="A"]').attr("selected", false);
            }
        }
    })
})


$(".TablaUsuario tbody").on("click", "button#btnEliminarUsuario", function() {

    var IdUsuario = $(this).attr("IdUsuario");

    var datos = new FormData();
    datos.append("IdUsuario", IdUsuario);

    $.ajax({
        url: "ajax/usuario.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(user) {
            $("#UEIdUsuario").val(user["IdUsuario"]);

            var mensaje = '¿Esta seguro de eliminar a:' + user["Nombre"] + ' ' + user["Apellidos"]
            '?';

            $("#MensajeEliminar").html(mensaje);
        }
    })
})

$(".btnActivar").click(function() {
    var IdUsuario = $(this).attr("IdUsuario");
    var EstadoUsuario = $(this).attr("EstadoUsuario");

    var Datos = new FormData();
    Datos.append("IdUsuarioActivar", IdUsuario);
    Datos.append("EstadoActivar", EstadoUsuario);

    $.ajax({
        url: "ajax/usuario.ajax.php",
        method: "POST",
        data: Datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(response) {}
    })

    if (EstadoUsuario == 0) {
        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('PASIVO');
        $(this).attr('EstadoUsuario', 1);
    } else {
        $(this).removeClass('btn-danger');
        $(this).addClass('btn-success');
        $(this).html('ACTIVO');
        $(this).attr('EstadoUsuario', 0);
    }

})

/* Problema con la plantilla
("#UICedulaIdentidad").change(function() {
    alert("Hola evento change");
})*/

function ValidarCI() {

    $(".alert").remove();

    var CI = $("#UICedulaIdentidad").val();

    var DatosValidar = new FormData();
    DatosValidar.append("CI", CI);

    $.ajax({
        url: "ajax/usuario.ajax.php",
        method: "POST",
        data: DatosValidar,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
            if (response) {
                $("#UICedulaIdentidad").parent().after('<div class="alert alert-danger">' +
                    'Este usuario ya existe en la base de datos' +
                    '</div>');
                $("#UICedulaIdentidad").val("");
            }
        }
    })

}