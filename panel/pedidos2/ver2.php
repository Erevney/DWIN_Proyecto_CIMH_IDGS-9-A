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
          <a class="navbar-brand" href="../dashboard2.php">Tienda Patitas</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">

            <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Accesorios <span class="caret"> </span></a> 
                <ul class="dropdown-menu">
                    <li><a href="../dashboard.php ">Ultimos Pedidos Accesorios</a></li>
                    <li><a href="../pedidos/index.php" class="btn">Todos los Pedidos de Accesorios</a></li>
                    <li><a href="../accesorios/index.php"> Accesorios</a></li>
                </ul>
                    <li class="dropdown, active">
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

    <div class="container" id="main">
    <div class="row">
          <div class="col-md-12">
            <fieldset>
                <?php
                    require '../../vendor/autoload.php';
                    $id = $_GET['id'];
                    $pedido2 = new grupopatitas\Pedido2;

                    $info_pedido2 = $pedido2->mostrarPorId2($id);

                    $info_detalle_pedido2 = $pedido2->mostrarDetallePorIdPedido2($id);

                ?>

              <legend>Informacion de la Compra</legend>
              <div class="form-group">
                  <label>Nombre</label>
                  <input value ="<?php print $info_pedido2['nombre'] ?>" type="text" class="form-control" readonly>
              </div>
              <div class="form-group">
                  <label>Apellidos</label>
                  <input value ="<?php print $info_pedido2['apellidos'] ?>" type="text" class="form-control" readonly>
              </div>
              <div class="form-group">
                  <label>Email</label>
                  <input value ="<?php print $info_pedido2['email'] ?>" type="text" class="form-control" readonly>
              </div>
              <div class="form-group">
                  <label>Fecha</label>
                  <input value ="<?php print $info_pedido2['fecha'] ?>" type="text" class="form-control" readonly>
              </div>
              <div class="form-group">
                  <label>Teléfono</label>
                  <input value ="<?php print $info_pedido2['telefono'] ?>" type="tel" class="form-control" readonly>
              </div>
              <div class="form-group">
                  <label>Comentario</label>
                  <input value ="<?php print $info_pedido2['comentario'] ?>" type="text" class="form-control" readonly>
              </div>

              <hr>
                  Otros Compradas
              <hr>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nombre de la Refacción</th>
                      <th>Foto</th>
                      <th>Precio</th>
                      <th>Cantidad</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody> 
                    <?php
                                             
                      $cantidad = count($info_detalle_pedido2);
                      if($cantidad > 0){
                        $c=0;
                      for($x =0; $x < $cantidad; $x++){
                        $c++;
                        $item = $info_detalle_pedido2[$x];
                        $total = $item['precio'] * $item['cantidad'];
                    ?>

                    <tr>
                      <td><?php print $c?></td>
                      <td><?php print $item['nombre_otro']?></td>
                      <td>
                      <?php
                          $foto = '../../upload/'.$item['foto'];
                          if(file_exists($foto)){
                        ?>
                          <img src="<?php print $foto; ?>" width="35">
                      <?php }else{?>
                          SIN FOTO
                      <?php }?>
                      </td>
                      <td><?php print $item['precio']?> MXN</td>
                      <td><?php print $item['cantidad']?></td>
                    <td>
                    <?php print $total?>
                    </td>
                    </tr>

                    <?php
                      }
                    }else{ 

                    ?>
                    <tr>
                      <td colspan="6">NO HAY REGISTROS</td>
                    </tr>

                    <?php }?>
                                 
                  </tbody>

                </table>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Total de la Compra</label>
                        <input value="<?php print $info_pedido2['total'] ?>" type="text" class="form-control" readonly>
                    </div>
                </div>
                
            </fieldset>
            <div class="pull-left">
                <a href="index.php" class="btn btn-default hidden-print">Cancelar</a>
            </div>

            <div class="pull-right">
                <a href="javascript:;" id="btnImprimir" class="btn btn-danger hidden-print">Imprimir</a>
            </div>
           
          </div>
        </div>

    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script>
        $('#btnImprimir').on('click',function(){

          window.print();

          return false;

        })

    </script>

  </body>
</html>