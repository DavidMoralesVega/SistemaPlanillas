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