<?php

include_once 'clases/quejas.php';
include_once 'clases/roles.php';
include_once 'clases/usuario.php';

class Api{

    //QUEJAS API CONTENT

    function getAllQuejas(){
        $quejas = new Quejas();
        $quejas = array();
        $quejas["quejas"] = array();
        $res = $quejas->obtenerQuejas();
        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "id" => $row['id'],
                    "tipo" => $row['co_type'],
                    "asunto" => $row['co_affair'],
                    "usuarop" => $row['full_name'],
                    "imagen" => $row['co_image'],
                );
                array_push($quejas["quejas"], $item);
            }
            $this->printJSON($quejas);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    function getAllQueja($id){
        $quejas = new Quejas();
        $quejas = array();
        $quejas["quejas"] = array();
        $res = $quejas->obtenerQueja($id);
        if($res->rowCount() == 1){
            $row = $res->fetch();
            $item=array(
                    "id" => $row['id'],
                    "tipo" => $row['co_type'],
                    "asunto" => $row['co_affair'],
                    "usuarop" => $row['full_name'],
                    "imagen" => $row['co_image'],
                );
            array_push($quejas["quejas"], $item);
            $this->printJSON($quejas);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    //FIN QUEJAS API CONTENT

    //ROLES API CONTENT

    function getAllRoles(){
        $roles = new Roles();
        $roles = array();
        $roles["roles"] = array();
        $res = $roles->obtenerRoles();
        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "id" => $row['id'],
                    "rol" => $row['rol'],
                );
                array_push($roles["roles"], $item);
            }
            $this->printJSON($roles);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    function getAllRole($id){
        $roles = new Quejas();
        $roles = array();
        $roles["roles"] = array();
        $res = $roles->obtenerRole($id);
        if($res->rowCount() == 1){
            $row = $res->fetch();
            $item=array(
                    "id" => $row['id'],
                    "rol" => $row['rol'],
                );
            array_push($roles["roles"], $item);
            $this->printJSON($roles);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    //FIN QUEJAS API CONTENT

    //USUARIO API CONTENT

    function getAllUsuarios(){
        $usuarios = new Usuario();
        $usuarios = array();
        $usuarios["usuarios"] = array();
        $res = $usuarios->obtenerUsuarios();
        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "id" => $row['id'],
                    "name" => $row['us_full_name'],
                    "name" => $row['us_email'],
                    "name" => $row['us_password'],
                    "rol" => $row['rol_id'],
                );
                array_push($usuarios["usuarios"], $item);
            }
            $this->printJSON($usuarios);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    function getAllUsuarioById($id){
        $usuarios = new Usuario();
        $usuarios = array();
        $usuarios["usuarios"] = array();
        $res = $usuarios->obtenerUsuario($id);
        if($res->rowCount() == 1){
            $row = $res->fetch();
            $item=array(
                    "id" => $row['id'],
                    "name" => $row['us_full_name'],
                    "name" => $row['us_email'],
                    "name" => $row['us_password'],
                    "rol" => $row['rol_id'],
                );
            array_push($usuarios["roles"], $item);
            $this->printJSON($usuarios);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    function getAllUsuario($email,$password){
        $usuarios = new Usuario();
        $usuarios = array();
        $usuarios["usuarios"] = array();
        $res = $usuarios->obtenerUsuarioLogin($email,$password);
        if($res->rowCount() == 1){
            $row = $res->fetch();
            $item=array(
                    "id" => $row['id'],
                    "name" => $row['us_full_name'],
                    "name" => $row['us_email'],
                    "name" => $row['us_password'],
                    "rol" => $row['rol_id'],
                );
            array_push($usuarios["roles"], $item);
            $this->printJSON($usuarios);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    function createUsuario($name,$email,$password,$rol){
        $usuarios = new Usuario();
        $res = $usuarios->createUsuario($name,$email,$password,$rol);
        if($res){
            echo json_encode(array('mensaje' => 'Usuario guardado con exito', 'code' => 200));
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos', 'code' => 500));
        }
    }

    //FIN USUARIO API CONTENT

    


    function error($mensaje){
        echo json_encode(array('mensaje' => $mensaje)); 
    }

    function printJSON($array){
        echo json_encode($array);
    }
}

?>