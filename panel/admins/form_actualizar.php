<?php
  require '../../vendor/autoload.php';

  if(isset($_GET['id']) && is_numeric($_GET['id'])){
      $id = $_GET['id'];
    
      $admin = new grupopatitas\Admin;
      $resultado = $admin->mostrarPorId($id);

      if(!$resultado)
          header('Location: index.php');

  }else{
    header('Location: index.php');
  }
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tienda Patitas</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/estilos.css">
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../dashboard.php">Tienda Patitas</a>
        </div>
        <ul class="nav navbar-nav pull-right">

            <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Accesorios <span class="caret"> </span></a> 
                <ul class="dropdown-menu">
                    <li><a href="../dashboard.php ">Ultimos Pedidos de Accesorios</a></li>
                    <li><a href="../pedidos/index.php">Todos los Pedidos de Accesorios</a></li>
                    <li<a href="index.php "> Accesorios</a></li>
                </ul>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Otros <span class="caret"> </span></a> 
                <ul class="dropdown-menu">
                    <li><a href="../dashboard2.php ">Ultimos Pedidos de Otros</a></li>
                    <li><a href="../pedidos2/index.php">Todos los Pedidos de Otros</a></li>
                    <li><a href="../index.php "> Otros</a></li>
                </ul>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categorias <span class="caret"> </span></a> 
                <ul class="dropdown-menu">
                    <li><a href="../categoria/index.php ">Gestion de categorias</a></li>
                </ul>
                <li class="dropdown, active">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Admin <span class="caret"> </span></a> 
                <ul class="dropdown-menu">
                    <li class=active><a href="index.php" class="btn">Gestionar Administrador</a></li>
                    <li><a href="../usuarios/index.php" class="btn">Gestionar Usuario</a></li>
                </ul>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Usuario <span class="caret"> </span></a>
                  <ul class="dropdown-menu">
                      <li><a href="../cerrar_sesion.php">Cerrar Sesión</a></li>
                  </ul>
                </li>
          </ul>

        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container" id="main">
      <div class="row">
        <div class="col-md-12">
          <fieldset>
            <legend>Datos del Admin</legend>
            <form method="POST" action="../acciones5.php" enctype="multipart/form-data" >
              <input type="hidden" name="id" value="<?php print $resultado['id'] ?>">
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Nombre del admin</label>
                          <input value="<?php print $resultado['username'] ?>" type="text" class="form-control" name="username" required>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Contraseña</label>
                          <input value="<?php print $resultado['password'] ?>" type="password" class="form-control" name="password" required>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Email</label>
                          <input value="<?php print $resultado['email'] ?>" type="email" class="form-control" name="email" required>
                      </div>
                  </div>
              </div>
              <input type="submit" class="btn btn-primary" name="accion" value="Actualizar">
              <a href="index.php" class="btn btn-default">Cancelar</a>
            </form>
          </fieldset>
        
        </div>
      </div>

    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>

  </body>
</html>

<!-- CIMH -->