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

    console.log(IdUsuario);


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