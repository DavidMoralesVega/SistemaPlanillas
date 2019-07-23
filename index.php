<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema de planillas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php 
        require_once 'css.php';
    ?>
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a class="font-weight-bold">SISTEMA DE PLANILLAS</a>
      <hr class="hr-primary mb-4">
      <img class="img-fluid z-depth-2" src="recursos/images/banner.jpeg" alt="">
    </div>
    <div class="card card-login">
      <div class="card-body login-card-body">
        <p class="login-box-msg font-weight-bold">Ingrese sus datos para iniciar sesión</p>
        <form action="controladores/validar-login.php" method="POST">
          <div class="input-group mb-3">
            <input name="user" type="text" class="form-control" placeholder="Ingrese su usuario">
            <div class="input-group-append input-group-text">
                <span class="fas fa-user text-dark"></span>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="pass" type="password" class="form-control" placeholder="Contraseña">
            <div class="input-group-append input-group-text">
                <span class="fas fa-lock text-dark"></span>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat btn-login">Ingresar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>