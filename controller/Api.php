<?php
    include_once 'RestClass.php';

    $api = new Api();

    if(isset($_GET['id']) && isset($_GET['usuariosGetById'])){
        $id = $_GET['id'];
        if(is_numeric($id)){
            $api->getAllUsuarioById($id);
        }else{
            $api->error('El id es incorrecto');
        }
    }
    
?>