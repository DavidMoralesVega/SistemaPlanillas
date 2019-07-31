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
                                <a data-toggle="modal" data-target="#ModalNuevoUsuario" class="btn btn-primary text-white">
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
                                    $i++;
                                    echo '<tr>
                                            <td>'.$i.'</td>
                                            <td>'.$Usuario['Nombre'].'</td>
                                            <td>'.$Usuario['Apellidos'].'</td>
                                            <td>'.$Nivel.'</td>
                                            <td>'.$Usuario['Estado'].'</td>
                                            <td>'.$Usuario['FechaRegistro'].'</td>
                                            <td>
                                                <button data-toggle="modal" data-target="#ModalActualizarUsuario" class="btn btn-info btn-sm"><i class="fas fa-user-edit"></i></button>
                                                <button class="btn btn-danger btn-sm"><i class="fas fa-user-times"></i></button>
                                            </td>
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

<!-- MODAL INSERTAR USUARIO-->
<div class="modal fade" id="ModalNuevoUsuario">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Nuevo usuario</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="controladores/usuario.controlador.php" method="POST">
        <div class="modal-body">
          <p class="text-center">Ingrese los datos del usuario</p>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-user"></i>
              </span>
            </div>
            <input onkeypress="GenerarUsuario();" id="UINombre" onkeyup="Mayus(this);" name="UINombre" type="text" placeholder="Ingrese un nombre" class="form-control">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-user"></i>
              </span>
            </div>
            <input onkeypress="GenerarUsuario();" id="UIApellidos" onkeyup="Mayus(this);" name="UIApellido" type="text" placeholder="Ingrese apellidos" class="form-control">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-user"></i>
              </span>
            </div>
            <input onkeypress="GenerarUsuario();" id="UICedulaIdentidad" onkeyup="Mayus(this);" name="UICedulaIdentidad" type="text" placeholder="Ingrese cédula de identidad" class="form-control">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-user"></i>
              </span>
            </div>
            <input id="UIUser" name="UIUser" type="text" placeholder="Ingresar usuario" class="form-control">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-key"></i>
              </span>
            </div>
            <input name="UIPassword" type="password" placeholder="Ingresar contraseña" class="form-control">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-key"></i>
              </span>
            </div>
            <select name="UINivel" class="form-control">
              <option disabled value="">Seleccionar nivel</option>
              <option value="A">ADMINISTRADOR</option>
              <option value="S">SECRETARIA</option>
            </select>
          </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
      </form>
    </div>
  </div>                            
</div>

<!-- MODAL ACTUALIZAR USUARIO-->
<div class="modal fade" id="ModalActualizarUsuario">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Actualizar usuario</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="controladores/usuario.controlador.php" method="POST">
        <div class="modal-body">
          <p class="text-center">Ingrese los datos del usuario</p>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-user"></i>
              </span>
            </div>
            <input onkeypress="GenerarUsuario();" id="UINombre" onkeyup="Mayus(this);" name="UINombre" type="text" placeholder="Ingrese un nombre" class="form-control">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-user"></i>
              </span>
            </div>
            <input onkeypress="GenerarUsuario();" id="UIApellidos" onkeyup="Mayus(this);" name="UIApellido" type="text" placeholder="Ingrese apellidos" class="form-control">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-user"></i>
              </span>
            </div>
            <input onkeypress="GenerarUsuario();" id="UICedulaIdentidad" onkeyup="Mayus(this);" name="UICedulaIdentidad" type="text" placeholder="Ingrese cédula de identidad" class="form-control">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-user"></i>
              </span>
            </div>
            <input id="UIUser" name="UIUser" type="text" placeholder="Ingresar usuario" class="form-control">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-key"></i>
              </span>
            </div>
            <input name="UIPassword" type="password" placeholder="Ingresar contraseña" class="form-control">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-key"></i>
              </span>
            </div>
            <select name="UINivel" class="form-control">
              <option disabled value="">Seleccionar nivel</option>
              <option value="A">ADMINISTRADOR</option>
              <option value="S">SECRETARIA</option>
            </select>
          </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
      </form>
    </div>
  </div>                            
</div>