<?php
    // Requerir conexion

    require_once '../conexion/conexion.php';

    $Usuario = $_POST['user'];
    $Password = $_POST['pass'];

    $encriptado = crypt($Password, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
    // var_dump($Usuario);
    // var_dump($Password);

    // Consulta
    $consulta = mysqli_query($conexion, "SELECT * FROM usuario WHERE User = '$Usuario'");
    
    // Conversion de nuestra consulta a un array
    $fila = mysqli_fetch_array($consulta);


    // echo '<pre>';
    // var_dump($fila);
    // echo '/<pre>';

    if ($fila['User'] == $Usuario && $fila['Password'] == $encriptado && $fila['Estado'] == 1)
    {
        session_start();
        
        $_SESSION['Validar'] = true;

        $_SESSION['IdUsuario'] = $fila['IdUsuario'];
        $_SESSION['Nombre'] = $fila['Nombre'];
        $_SESSION['Apellidos'] = $fila['Apellidos'];
        $_SESSION['User'] = $fila['User'];
        $_SESSION['Password'] = $fila['Password'];
        $_SESSION['Nivel'] = $fila['Nivel'];
        $_SESSION['Estado'] = $fila['Estado'];
        $_SESSION['FechaRegistro'] = $fila['FechaRegistro'];
        header('Location: ../panel.php');
    }
    else
    {
        header('Location: ../index.php');
    }
