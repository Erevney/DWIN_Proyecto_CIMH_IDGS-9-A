<?php
session_start();

require '../vendor/autoload.php';

$accesorio = new grupopatitas\Accesorio;

if($_SERVER['REQUEST_METHOD'] ==='POST'){

    if ($_POST['accion']==='Registrar'){

        if(empty($_POST['nombre_accesorio']))
            exit('Completar nombre_accesorio');
        
        if(empty($_POST['descripcion']))
            exit('Completar descripcion');

        if(empty($_POST['categoria_id']))
            exit('Seleccionar una Categoría');

        if(!is_numeric($_POST['categoria_id']))
            exit('Seleccionar una Categoría válida');
        
        $_params = array(
            'nombre_accesorio'=>$_POST['nombre_accesorio'],
            'descripcion'=>$_POST['descripcion'],
            'foto'=> subirFoto(),
            'precio'=>$_POST['precio'],
            'categoria_id'=>$_POST['categoria_id'],
            'fecha'=> date('Y-m-d')
        );

        $rpt = $accesorio->registrar($_params);

        if($rpt)
            header('Location: accesorios/index.php');
        else
            print 'Error al registrar un accesorio';       

    }

    if ($_POST['accion']==='Actualizar'){

        if(empty($_POST['nombre_accesorio']))
        exit('Completar nombre_accesorio');
    
    if(empty($_POST['descripcion']))
        exit('Completar descripcion');

    if(empty($_POST['categoria_id']))
        exit('Seleccionar una Categoría');

    if(!is_numeric($_POST['categoria_id']))
        exit('Seleccionar una Categoría válida');

    
    $_params = array(
        'nombre_accesorio'=>$_POST['nombre_accesorio'],
        'descripcion'=>$_POST['descripcion'],
        'precio'=>$_POST['precio'],
        'categoria_id'=>$_POST['categoria_id'],
        'fecha'=> date('Y-m-d'),
        'id'=>$_POST['id'],
    );

    if(!empty($_POST['foto_temp']))
        $_params['foto'] = $_POST['foto_temp'];
    
    if(!empty($_FILES['foto']['name']))
        $_params['foto'] = subirFoto();

    $rpt = $accesorio->actualizar($_params);
    if($rpt)
        header('Location: accesorios/index.php');
    else
        print 'Error al actualizar un accesorio';

    }

}

if($_SERVER['REQUEST_METHOD'] ==='GET'){

    $id = $_GET['id'];

    $rpt = $accesorio->eliminar($id);
    
    if($rpt)
        header('Location: accesorios/index.php');
    else
        print 'Error al eliminar un accesorio';

}

function subirFoto() {

    $carpeta = __DIR__.'/../upload/';

    $archivo = $carpeta.$_FILES['foto']['name'];

    move_uploaded_file($_FILES['foto']['tmp_name'],$archivo);

    return $_FILES['foto']['name'];

}