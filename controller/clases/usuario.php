<?php

include_once '../../models/conection.php';

class Usuario extends DB{
    
    function obtenerUsuarios(){
        $query = $this->connect()->query('SELECT * FROM users');
        return $query;
    }

    function obtenerUsuario($id){
        $query = $this->connect()->prepare('SELECT * FROM users WHERE id = :id');
        $query->execute(['id' => $id]);
        return $query;
    }

    function obtenerUsuarioLogin($email, $password){
        $query = $this->connect()->prepare('SELECT * FROM users WHERE us_email = :email and us_password = :password');
        $query->execute(['email' => $email,
                         'password' => $password]);
        return $query;
    }

    function createUsuario($name,$email, $password,$rol){
        $query = $this->connect()->prepare('INSERT INTO `users`(`us_full_name`, `us_email`, `us_password`, `created_at`, `rol_id`) VALUES (:name,:email,:password,NOW(),:rol)');
        $query->execute([
                            'name' => $name,
                            'email' => $email,
                            'password' => $password,
                            'rol' => $rol,
                        ]);
        return $query;
    }

}

?>