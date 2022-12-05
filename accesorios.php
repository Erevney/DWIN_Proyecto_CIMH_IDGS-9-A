<?php
session_start();
require 'funciones.php';

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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
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
            <a class="navbar-brand" href="accesorios.php">Tienda Patitas</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">
            <li class="active">
              <a href="accesorios.php" class="btn">Accesorios</a>
            </li>
              <li>
                <a href="otros.php" class="btn">Otros</a>
              </li>
              <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuario <span class="caret"> </span></a> 
                <ul class="dropdown-menu">
                    <li><a href="login.php" class="btn">Login</a></li>
                    <li><a href="register.php" class="btn">Registrarse</a></li>
                    <li><a href="login2.php" class="btn">Login Admin</a></li>
                </ul>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container" id="main">
        <div class="row">
            <?php
              require 'vendor/autoload.php';
              $accesorio = new grupopatitas\Accesorio;
              $info_accesorios = $accesorio->mostrar();
              $cantidad = count($info_accesorios);
              if($cantidad > 0){
                for($x =0; $x < $cantidad; $x++){
                  $item = $info_accesorios[$x];
            ?>
              <div class="col-md-3">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h1 class="text-center nombre_accesorio-accesorio"><?php print $item['nombre_accesorio'] ?></h1>  
                    </div>
                      <div class="panel-body">
                        <?php
                            $foto = 'upload/'.$item['foto'];
                            if(file_exists($foto)){
                          ?>
                            <img src="<?php print $foto; ?>" class="img-responsive">
                        <?php }else{?>
                          <img src="assets/imagenes/not-found.jpg" class="img-responsive">
                        <?php }?>
                        <h5 class="text-center precio-accesorio"><?php print $item['precio']?> MXN</h5>
                        <h5 class="text-center descripcion-accesorio"><?php print $item['descripcion']?></h5>
                        <h5 class="text-center nombre-categoria"><?php print $item['nombre']?></h5>
                      </div>
                    
                  </div>
                   
              </div>
          <?php
                }
            }else{?>
              <h4>NO HAY REGISTROS</h4>

          <?php }?>

        </div>
      
    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

  </body>
</html>