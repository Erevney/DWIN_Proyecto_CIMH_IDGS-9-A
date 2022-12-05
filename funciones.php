<?php

function agregarAccesorio($resultado, $id, $cantidad = 1){
    $_SESSION['carrito'][$id] = array(
        'id' => $resultado['id'],
        'nombre_accesorio' => $resultado['nombre_accesorio'],
        'foto' => $resultado['foto'],
        'precio' => $resultado['precio'],
        'cantidad' => $cantidad
   );
}

function actualizarAccesorio($id,$cantidad = FALSE){

    if($cantidad)
        $_SESSION['carrito'][$id]['cantidad'] = $cantidad;
    else
        $_SESSION['carrito'][$id]['cantidad']+=1;
}

function cantidadAccesorios(){
    $cantidad = 0;
    if(isset($_SESSION['carrito'])){
        foreach($_SESSION['carrito'] as $indice => $value){
           $cantidad++;
        }
    }

    return $cantidad;
}

function calcularTotal(){
    $total = 0;
    if(isset($_SESSION['carrito'])){
        foreach($_SESSION['carrito'] as $indice => $value){
            $total += $value['precio'] * $value['cantidad'];
        }
    }
    return $total;

}