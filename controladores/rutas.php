<?php
    session_start();

    if ($_SESSION['Validar'] == true)
    {
        echo 'Session success';
    }
    else
    {
        header('Location: ../index.php');
    }