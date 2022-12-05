<?php

function agregarOtro($resultado, $id, $cantidad = 1){
    $_SESSION['carrito2'][$id] = array(
        'id' => $resultado['id'],
        'nombre_otro' => $resultado['nombre_otro'],
        'foto' => $resultado['foto'],
        'precio' => $resultado['precio'],
        'cantidad' => $cantidad
   );
}

function actualizarOtro($id,$cantidad = FALSE){

    if($cantidad)
        $_SESSION['carrito2'][$id]['cantidad'] = $cantidad;
    else
        $_SESSION['carrito2'][$id]['cantidad']+=1;
}

function cantidadOtros(){
    $cantidad = 0;
    if(isset($_SESSION['carrito2'])){
        foreach($_SESSION['carrito2'] as $indice => $value){
           $cantidad++;
        }
    }

    return $cantidad;
}

function calcularTotal2(){
    $total = 0;
    if(isset($_SESSION['carrito2'])){
        foreach($_SESSION['carrito2'] as $indice => $value){
            $total += $value['precio'] * $value['cantidad'];
        }
    }
    return $total;
       
}