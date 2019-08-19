<?php
    require_once '../conexion/conexion.php';
    // Traer usuario
    if(isset($_POST["IdUsuario"])){
        $IdUsuario = $_POST["IdUsuario"];
        $TraerUsuario = mysqli_query($conexion, "SELECT * FROM usuario WHERE IdUsuario = '$IdUsuario'");
        $array = mysqli_fetch_array($TraerUsuario);
        echo json_encode($array);
    }
    // Cambiar Estado de Usuario
    if(isset($_POST["IdUsuarioActivar"]))
    {
       $IdUsuarioActivar = $_POST["IdUsuarioActivar"];
       $EstadoActivar = $_POST["EstadoActivar"];
       $CambiarEstado = mysqli_query($conexion, "UPDATE usuario SET Estado = '$EstadoActivar' WHERE IdUsuario = '$IdUsuarioActivar'");
    }
    // Validar CI - Usuario repetido
    if (isset($_POST["CI"])){
        $CI = $_POST["CI"];
        $FiltroCI = mysqli_query($conexion, "SELECT * FROM usuario WHERE CedulaIdentidad = '$CI'");
        $Usuario = mysqli_fetch_array($FiltroCI);
        echo json_encode($Usuario);
    }





























