<?php

namespace grupopatitas;

class Admin{

    private $config;
    private $cn = null;

    public function __construct(){

        $this->config = parse_ini_file(__DIR__.'/../config.ini') ;

        $this->cn = new \PDO( $this->config['dns'], $this->config['usuario'],$this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
        
    }

    public function actualizar($_params){
        $sql = "UPDATE `admins` SET `username`=:username,`password`=:password,`email`=:email WHERE `id`=:id";

        $resultado = $this->cn->prepare($sql);

        $_params = array(
            'username'=>$_POST['username'],
            'password'=>$_POST['password'],
            'email'=>$_POST['email'],
            'id'=>$_POST['id'],
        );

        if($resultado->execute($_array))
            return true;

        return false;
    }

    public function eliminar($id){
        $sql = "DELETE FROM `admins` WHERE `id`=:id ";

        $resultado = $this->cn->prepare($sql);
        
        $_array = array(
            ":id" =>  $id
        );

        if($resultado->execute($_array))
            return true;

        return false;
    }

    public function mostrar(){
        $sql = "SELECT admins.id, username, password, email FROM admins ";
        
        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
            return $resultado->fetchAll();

        return false;
    }

    public function mostrarPorId($id){
        
        $sql = "SELECT * FROM `admins` WHERE `id`=:id ";
        
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id" =>  $id
        );

        if($resultado->execute($_array))
            return $resultado->fetch();

        return false;
    }
    
}