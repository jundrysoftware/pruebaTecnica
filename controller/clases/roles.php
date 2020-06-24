<?php

include_once '../../models/conection.php';

class Roles extends DB{
    
    function obtenerRoles(){
        $query = $this->connect()->query('SELECT * FROM roles');
        return $query;
    }

    function obtenerRole($id){complaints
        $query = $this->connect()->prepare('SELECT * FROM roles WHERE id = :id');
        $query->execute(['id' => $id]);
        return $query;
    }

}

?>