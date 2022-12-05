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
                    <li class="active"><a href="../accesorios/index.php"> Accesorios</a></li>                   
                </ul>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Otros <span class="caret"> </span></a> 
                <ul class="dropdown-menu">
                    <li><a href="../dashboard2.php">Ultimos Pedidos de Otros</a></li>
                    <li><a href="../pedidos2/index.php">Todos los Pedidos de Otros</a></li>
                    <li><a href="../otros/index.php"> Otros</a></li>
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
              <div class="pull-right">
                <a href="../register.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Nuevo</a>
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
             <fieldset>
              <legend>Listado de Admins</legend>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nombre del Admin</th>
                      <th>Contraseña</th>
                      <th>Email</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody> 
                    <?php
                      require '../../vendor/autoload.php';
                      $admin = new grupopatitas\Admin;
                      $info_admin = $admin->mostrar();

                    
                      $cantidad = count($info_admin);
                      if($cantidad > 0){
                        $c=0;
                      for($x =0; $x < $cantidad; $x++){
                        $c++;
                        $item = $info_admin[$x];
                    ?>

                    <tr>
                      <td><?php print $c?></td>
                      <td><?php print $item['username']?></td>
                      <td><?php print $item['password']?></td>
                      <td><?php print $item['email']?></td>
                      <td class="text-center">

                      </td>
                      <td class="text-center">
                        <a href="../acciones5.php?id=<?php print $item['id'] ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                        <a href="form_actualizar.php?id=<?php print $item['id']  ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                      </td>
                    
                    </tr>

                    <?php
                      }
                    }else{

                    ?>

                    <?php }?>
                  
                  </tbody>

                </table>
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