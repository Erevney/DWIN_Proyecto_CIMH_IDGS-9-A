<?php
session_start();

require '../vendor/autoload.php';

$category = new grupopatitas\Category;

if($_SERVER['REQUEST_METHOD'] ==='POST'){

    if ($_POST['accion']==='Registrar'){

        if(empty($_POST['nombre']))
            exit('Completar nombre');
            
        $_params = array(
            'nombre'=>$_POST['nombre'],
        );

        $rpt = $category->registrar($_params);

        if($rpt)
            header('Location: categoria/index.php');
        else
            print 'Error al registrar una categoria';

    }

    if ($_POST['accion']==='Actualizar'){

        if(empty($_POST['nombre']))
        exit('Completar nombre');
    
    $_params = array(
        'nombre'=>$_POST['nombre'],
    );

    $rpt = $category->actualizar($_params);
    if($rpt)
        header('Location: categoria/index.php');
    else
        print 'Error al actualizar una categoria';

    }

}

if($_SERVER['REQUEST_METHOD'] ==='GET'){

    $id = $_GET['id'];

    $rpt = $category->eliminar($id);
    
    if($rpt)
        header('Location: categoria/index.php');
    else
        print 'Error al eliminar una categoria';

}
