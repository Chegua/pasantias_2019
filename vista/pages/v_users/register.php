<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registro de usuario</title>
    <?php include ("../include/head.php"); ?>
    <link rel="stylesheet" href="../../plugins/alertify/css/alertify.min.css">
    <link rel="stylesheet" href="../../plugins/alertify/css/themes/bootstrap.min.css">
    <link rel="stylesheet" href="../../dist/css/estilos.css">
    <link rel="stylesheet" href="../../dist/css/icono_css.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Sistema de pasantias</b></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Validacion de Usuario</p>

    <form id="userForm">
    <div class="row box-body">
      <article class="col-xl-9 col-lg-10 col-md-12 col-sm-9 col-xs-12 col-md-offset-">
        <!-- <div class="form-row"> -->
          
          <!-- <div class="form-group col-md-4">
            <label for="nacionalidad">Nac.</label>
            <select name="nacionalidad" class="form-control form-control-sm" id="nacionalidad" required>
              <option value="V">V</option>
              <option value="E">E</option>
            </select>
          </div> -->

          <div class="form-group col-md-12"
            <label for="cedula">Cedula: </label>
            <input type="text" required class="form-control" name="cedula" id="cedula" autocomplete="off"  placeholder="Ingrese la cedula" maxlength="8"  data-inputmask='"mask": "99999999"' data-mask>
            <span class="help-block"></span>
          </div>

          <div class="form-group col-md-12">
            <label for="clave">Contraseña: </label>
            <input type="password" name="clave" id="clave" class="form-control form-control-sm" placeholder="Ingrese la contraseña" autocomplete="off" required>
            <span class="help-block"></span>
          </div>

          <div class="form-group col-md-12">
            <label for="claveR">Confirme su contraseña: </label>
            <input type="password" name="claveR" id="claveR" class="form-control form-control-sm" placeholder="Ingrese la contraseña" autocomplete="off" required>
            <span class="help-block"></span>
          </div>

          <div class="form-group col-md-12">
            <label for="token">Codigo de validacion: </label> 
            <input type="text" name="token" id="token" class="form-control form-control-sm" placeholder="Ingrese el codigo" autocomplete="off" required>
            <span class="help-block">Si no posee codigo contacte con el administrador</span>
          </div>

        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-success btn-block btn-flat">Registrar <i class="fa fa-save"></i></button>
        </div>
        <!-- /.col -->
        </article>
      </div>
    </form>

    <a href="login.php" class="btn btn-link text-center">Ir a inicio de sesion</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<?php include ("../include/plugins.php"); ?>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
<script src="../../dist/js/usuarios/appUsuarios.js"></script>
</body>
</html>
