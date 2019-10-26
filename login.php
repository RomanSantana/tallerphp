<?php
/*
session_start();
if (isset($_SESSION["user"])) {
  header("location:index.php");
}*/
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <script src="js/jquery-1.12.3.min.js" charset="utf-8"></script>
    <script src="bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form method="post" id="frmnuevo">
            <br><br>
            <h1><p class="text-center">Login</p></h1>
            <br><br>
            <div class="form-group">
              <label for="Num_Empleado">Numero de Empleado</label>
              <input type="text" name="Num_Empleado" id="Num_Empleado" class="form-control" autocomplete=”off”>
            </div>
            <div class="form-group">
              <label for="pass">Contraseña</label>
              <input type="password" name="contrasena" id="contrasena" class="form-control" autocomplete=”off”>
            </div>
            <br><br>
            <div class="form-group">
              <input type="button" name="login" id="login" value="Login" class="btn btn-success">
            </div>
            <br>
            <span id="result"></span>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>

<script>
  $(document).ready(function() {
    $('#login').click(function(){
   /*   var Num_Empleado = $('#Num_Empleado').val();
      var contrasena = $('#contrasena').val();
      let datos = "Num_Empleado="+Num_Empleado+"&contrasena="+contrasena;*/
      datos=$('#frmnuevo').serialize();
      console.log(datos);
      if($.trim(Num_Empleado).length > 0 && $.trim(contrasena).length > 0){
        $.ajax({
          url:"logueame.php",
          method:"POST",
          data:datos,
          cache:"false",
          beforeSend:function() {
            $('#login').val("Conectando...");
          },
          success:function(data) {
            $('#login').val("Login");
            console.log(data);
            if (data==1) {
                $(location).attr('href','mainadmin.php');

            }
            if(data==2){
              $(location).attr('href','mainmedium.php');
            }
            if(data==3){
              $(location).attr('href','mainlow.php');
            }
           if(data==4) {
              $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> contraseña o usuario incorrecto.</div>");
            }
          }
        });
      };
    });
  });

 /* function validar(data){
    $.ajax({
          url:"validacionusuario.php",
          method:"POST",
          data:data,
          cache:"false",
          success:function(r) {
              if(r=="1") {
               $(location).attr('href','mainadmin.php');
              }
            
            if(r=="2"){
               $(location).attr('href','FVehiculos.php');
            }
              if(r=="3"){
               $(location).attr('href','FTaller.php');
              }
            
          }
        });
  }*/


</script>
