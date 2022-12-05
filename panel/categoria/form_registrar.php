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
          <a class="navbar-brand" href="../dashboard2.php"> Tienda Patitas</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav pull-right">

            <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Accesorios <span class="caret"> </span></a> 
                <ul class="dropdown-menu">
                    <li><a href="../dashboard.php ">Ultimos Pedidos de Accesorios</a></li>
                    <li><a href="../pedidos/index.php">Todos los Pedidos de Accesorios</a></li>
                    <li><a href="../accesorios/index.php"> Accesorios</a></li>
                </ul>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Otros <span class="caret"> </span></a> 
                <ul class="dropdown-menu">
                    <li><a href="../dashboard2.php ">Ultimos Pedidos de Otros</a></li>
                    <li><a href="../pedidos2/index.php">Todos los Pedidos de Otros</a></li>
                    <li><a href="index.php "> Otros</a></li>
                </ul>
                <li class="dropdown, active">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categorias <span class="caret"> </span></a> 
                <ul class="dropdown-menu">
                    <li class="active"><a href="index.php ">Gestion de categorias</a></li>
                </ul>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Admin <span class="caret"> </span></a> 
                <ul class="dropdown-menu">
                    <li><a href="../admins/index.php" class="btn">Gestionar Administrador</a></li>
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

    <div class="container" id="main" >
      <div class="row">
        <div class="col-md-12">
          <fieldset>
            <legend>Datos de la categoria</legend>
            <form method="POST" action="../acciones3.php" enctype="multipart/form-data" >
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Nombre de la categoria</label>
                          <input type="text" class="form-control" name="nombre" required>
                      </div>
                  </div>
              </div>      
              <input type="submit" name="accion" class="btn btn-primary" value="Registrar">
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