<?php
session_start();

require '../vendor/autoload.php';

$usuario = new grupopatitas\Usuario;

if($_SERVER['REQUEST_METHOD'] ==='POST'){

    if ($_POST['accion']==='Actualizar'){

        if(empty($_POST['username']))
        exit('Completar username');
    
    if(empty($_POST['password']))
        exit('Completar password');

    if(empty($_POST['email']))
        exit('Completar email');
    
    $_params = array(
        'username'=>$_POST['username'],
        'password'=>$_POST['password'],
        'email'=>$_POST['email'],
        'id'=>$_POST['id'],
    );

    $rpt = $usuario->actualizar($_params);
    if($rpt)
        header('Location: usuarios/index.php');
    else
        print 'Error al actualizar un usuario';

    }

}

if($_SERVER['REQUEST_METHOD'] ==='GET'){

    $id = $_GET['id'];

    $rpt = $usuario->eliminar($id);
    
    if($rpt)
        header('Location: usuarios/index.php');
    else
        print 'Error al eliminar un usuario';

}
