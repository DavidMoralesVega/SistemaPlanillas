<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrar Usuarios</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php 
    require_once 'css.php';
  ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <?php
      require_once 'componentes/nav-top.php';
  ?>
  <?php
    require_once 'componentes/sidebar.php';
  ?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Administrar usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">
                        <i class="fas fa-users mr-2"></i>
                        Lista de usuarios
                        </h3>
                        <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item">
                                <a class="btn btn-primary text-white">
                                <i class="fas fa-plus mr-2"></i>
                                Nuevo</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body table-responsive">
                        <table id="TablaDinamica" class="display table table-bordered table-hover dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Nivel</th>
                                    <th>Estado</th>
                                    <th>Fecha de registro</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                                require_once 'conexion/conexion.php';
                                $ListaUsuarios = mysqli_query($conexion, "SELECT * FROM usuario");
                                
                                foreach ($ListaUsuarios as $key => $Usuario)
                                {
                                    $Nivel = ($Usuario['Nivel'] == 'A') ? 'ADMINISTRADOR' : 'SECRETARIA';

                                    echo '<tr>
                                            <td>No</td>
                                            <td>'.$Usuario['Nombre'].'</td>
                                            <td>'.$Usuario['Apellidos'].'</td>
                                            <td>'.$Nivel.'</td>
                                            <td>'.$Usuario['Estado'].'</td>
                                            <td>'.$Usuario['FechaRegistro'].'</td>
                                            <td>Acciones</td>
                                        </tr>';
                                }
                            ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
  </div>
  <?php
    require_once 'componentes/footer.php';
  ?>
</div>
    <?php
        require_once 'js.php';
    ?>
</body>
</html>
