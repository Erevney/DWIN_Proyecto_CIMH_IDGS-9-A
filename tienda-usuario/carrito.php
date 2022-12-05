<?php
//ACTIVAR LAS SESSIONES EN PHP
session_start();
require 'funciones.php';

if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];
    require '../vendor/autoload.php';
    $accesorio = new grupopatitas\Accesorio;
    $resultado = $accesorio->mostrarPorId($id);
    
    if(!$resultado)
       header('Location: accesorios.php');   

    if(isset($_SESSION['carrito'])){ //SI EL CARRITO EXISTE
        //SI EL ACCESORIO EXISTE EN EL CARRITO
        if(array_key_exists($id,$_SESSION['carrito'])){
            actualizarAccesorio($id);
        }else{
            //  SI EL ACCESORIO NO EXISTE EN EL CARRITO
            agregarAccesorio($resultado, $id);
        }

    }else{
        //  SI EL CARRITO NO EXISTE
        agregarAccesorio($resultado, $id);

    }

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

    <title> Tienda Patitas</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/estilos.css">
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
          <a class="navbar-brand" href="accesorios.php"> Tienda Patitas</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav pull-right">
            <li>
              <a href="accesorios.php" class="btn">Accesorios</a>
            </li>
            <li>
              <a href="otros.php" class="btn">Otros</a>
            </li>
            <li class="active">
              <a href="carrito.php" class="btn"><span class="badge"><span class="glyphicon glyphicon-shopping-cart"></span><?php print cantidadAccesorios(); ?></span></a>
            </li>
                <li>
                    <a href="cerrar_sesion.php" class="btn">Logout</a>
                </li>      
        </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container" id="main">
            <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Accesorio</th>
                      <th>Foto</th>
                      <th>Precio</th>
                      <th>Cantidad</th>
                      <th>Total</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
                            $c=0;
                            foreach($_SESSION['carrito'] as $indice => $value){
                                $c++;
                                $total = $value['precio'] * $value['cantidad'];
                      ?>
                        <tr>
                            <form action="actualizar_carrito.php" method="post">
                                <td><?php print $c ?></td>
                                <td><?php print $value['nombre_accesorio']  ?></td>
                                <td>
                                    <?php
                                        $foto = '../upload/'.$value['foto'];
                                        if(file_exists($foto)){
                                        ?>
                                        <img src="<?php print $foto; ?>" width="35">
                                    <?php }else{?>
                                        <img src="assets/imagenes/not-found.jpg" width="35">
                                    <?php }?>
                                </td>
                                <td><?php print $value['precio']  ?> MXN</td>
                                <td>
                                <input type="hidden" name="id"  value="<?php print $value['id'] ?>">
                                    <input type="text" name="cantidad" class="form-control u-size-100" value="<?php print $value['cantidad'] ?>">
                                </td>
                                <td>
                                    <?php print $total  ?> MXN
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success btn-xs">
                                        <span class="glyphicon glyphicon-refresh"></span> 
                                    </button>

                                    <a href="eliminar_carrito.php?id=<?php print $value['id']  ?>" class="btn btn-danger btn-xs">
                                        <span class="glyphicon glyphicon-trash"></span> 
                                    </a>


                                </td>
                            </form>
                        </tr>

                    <?php
                        }
                        }else{
                    ?>
                        <tr>
                            <td colspan="7">No Hay Accesorios En El Carrito </td>
                        </tr>
                        
                    <?php
                        }
                    ?>
                    
                </tbody>
                <tfoot>
                        <tr>
                            <td colspan="5" class="text-right">Total</td>
                            <td><?php print calcularTotal(); ?> MXN</td>
                            <td></td>
                        </tr>

                </tfoot>
            </table>
            <hr>
            <?php
                if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
            ?>  
            <div class="row">
                    <div class="pull-left">
                        <a href="index.php" class="btn btn-info">Seguir Comprando</a>
                    </div>
                    <div class="pull-right">
                    
                    <div>
                    <script src="https://www.paypal.com/sdk/js?client-id=AZjPSwu3SJlcvM0bHDbtW2g89o1G-lCgkxoZrHNQx8xjgY-Lms0q5ytxk8agRhWTLGnR_dIee6v--QkP&currency=MXN"></script>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>
    <script>
      paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '<?php print calcularTotal(); ?>' // Can also reference a variable or function
              }
            }]
          });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            window.location.href="finalizar.php"
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
          });
        }
      }).render('#paypal-button-container');
    </script>
    </div>
            </div>

            <?php
                }
            ?>

    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

  </body>
</html>