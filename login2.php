<?php   
include('config.php');
session_start();
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
          <a class="navbar-brand" href="login2.php">Tienda Patitas</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        </div><!--/.nav-collapse -->

    </nav>

    <div class="container" id="main">
        <div class="main-login">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="text-center">Admin</h3>
                    </div>
                    <div class="panel-body">
                        <p class="text-center"> 
                            <img src="assets/imagenes/logo.jpg" alt="">
                        </p>
<?php
if (isset($_POST['login'])) {   
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = $connection->prepare("SELECT * FROM users WHERE USERNAME=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        echo '<p class="error">¡Usuario o contraseña incorrectos!</p>';
    } else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result['id'];
            echo "<script> window.location.href='panel/dashboard.php'; </script>";
        } else {
            echo '<p class="error">¡Usuario o contraseña incorrectos!</p>';
        }
    }
} 
?>

<form method="post" action="" name="signin-form">
    <div class="form-element">
        <br>
    </br>
        <label>Usuario</label>
        <input type="text" class="form-control" name="username" pattern="[a-zA-Z0-9]+" placeholder="Usuario" required>
    </div>
    <div>
        <br>
        </br>
    </div>
    <div class="form-element">
        <label>Contraseña</label>
        <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
    </div>
        <br>
    </br>
    <button type="submit" name="login" value="login" class="btn btn-primary btn-block">Log In</button>
</form>
                    </div>
                </div>
            </form>
        </div>

    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

  </body>
</html>