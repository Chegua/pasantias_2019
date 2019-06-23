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
    <p class="login-box-msg">Registro de usuario</p>

    <form id="userForm">
    <div class="row box-body">
      <article class="col-xl-9 col-lg-10 col-md-12 col-sm-9 col-xs-12 col-md-offset-">
        <!-- <div class="form-row"> -->

          <div class="form-group col-md-12">
            <label for="tipo">Tipo de usuario: </label><br>
            <select name="tipo" id="tipo" class="form-control">
              <option value="Administrador">Administrador</option>
              <option value="Tutor">Tutor</option>
              <option value="Estudiante">Estudiante</option>
            </select>
          </div>

          <div class="form-group col-md-4">
            <label for="nacionalidad">Nac.</label>
            <select name="nacionalidad" class="form-control form-control-sm" id="nacionalidad" required>
              <option value="V">V</option>
              <option value="E">E</option>
            </select>
          </div>

          <div class="form-group col-md-8">
            <label for="cedula">Cedula: </label>
              <div class="input-group">
                <input type="text" required class="form-control" name="cedula" id="cedula" autocomplete="off"  placeholder="Ingrese la cedula" maxlength="8"  data-inputmask='"mask": "99999999"' data-mask>
                <span class="input-group-btn">
                  <!---<a href="javascript:void(0);" name="buscar" id="buscar" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-search"></i> </a>-->
                </span>
              </div>
              <span class="help-block"></span>
          </div>

          <div class="form-group col-md-12">
                <label for="nombre">Nombres: </label>
                <input type="text" name="nombre" id="nombre" class="form-control form-control-sm" placeholder="Ingrese el nombre" autocomplete="off" required>
                <span class="help-block"></span>
          </div>

          <div class="form-group col-md-12">
              <label for="apellido">Apellidos: </label>
              <input type="text" name="apellido" id="apellido" class="form-control form-control-sm" placeholder="Ingrese el apellido" autocomplete="off" required>
              <span class="help-block"></span>
          </div>

          <div class="form-group col-md-12">
            <label for="sexo">Sexo: </label><br>
              <select name="sexo" id="sexo" class="form-control">
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
              </select>
          </div>

          <div class="form-group col-md-12">
                <label for="telefono">Telefono:</label>
                <input type="text" name="telefono" id="telefono" class="form-control form-control-sm" placeholder="Ingrese el numero" data-inputmask='"mask": "(9999) 999-9999"' data-mask autocomplete="off" maxlength="15">
          </div>

          <div class="form-group col-md-12">
                <label for="correo">Correo:</label>
                <input type="text" name="correo" id="correo" class="form-control form-control-sm" placeholder="Ingrese el correo"  autocomplete="off">
               <span class="help-block"></span>
          </div>

          <div class="form-group col-md-12">
            <label for="clave">Contraseña: </label>
            <input type="password" name="clave" id="clave" class="form-control form-control-sm" placeholder="Ingrese la contraseña" autocomplete="off" required>
            <span class="help-block"></span>
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
