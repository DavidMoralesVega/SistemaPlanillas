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