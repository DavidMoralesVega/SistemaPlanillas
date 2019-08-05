<?php
    require_once '../conexion/conexion.php';
    if(isset($_POST['UINombre']))
    {
        $Nombre = $_POST['UINombre'];
        $Apellidos = $_POST['UIApellido'];
        $User = $_POST['UIUser'];
        $Password = $_POST['UIPassword'];
        $Nivel = $_POST['UINivel'];
        $CI = $_POST['UICedulaIdentidad'];
        
        $encriptado = crypt($Password, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

        $InsertarUsuario = mysqli_query($conexion, "INSERT INTO `usuario` (`Nombre`, `Apellidos`, `CedulaIdentidad`, `User`, `Password`, `Nivel`) VALUES ('$Nombre','$Apellidos','$CI','$User','$encriptado','$Nivel')");

        if (!$InsertarUsuario){
          echo "ERROR AL INSERTAR USUARIO";  
        }
        else{
            header('Location: ../usuario.php');
        }
    }

    if(isset($_POST["UAIdUsuario"])){
        $UAIdUsuario = $_POST["UAIdUsuario"];
        $UANombre = $_POST["UANombre"];
        $UAApellidos = $_POST["UAApellido"];
        $UACedulaIdentidad = $_POST["UACedulaIdentidad"];
        $UANivel = $_POST["UANivel"];

        $ActualizarUsuario = mysqli_query($conexion, "UPDATE usuario SET Nombre='$UANombre', Apellidos='$UAApellidos', CedulaIdentidad='$UACedulaIdentidad', Nivel='$UANivel' WHERE IdUsuario = '$UAIdUsuario'");

        if(!$ActualizarUsuario){
            echo 'LA ACTUALIZACION A FALLADO EXITOSAMENTE';
        }
        else {
            header('Location: ../usuario.php');
        }
    }

    if(isset($_POST["UEIdUsuario"]))
    {
        $UEIdUsuario = $_POST["UEIdUsuario"];
        $EliminarUsuario = mysqli_query($conexion, "DELETE FROM usuario WHERE IdUsuario = '$UEIdUsuario'");

        if (!$EliminarUsuario) {
            echo 'Eliminacion incorrecta';
        }
        else {
            header('Location: ../usuario.php');
        }
    }