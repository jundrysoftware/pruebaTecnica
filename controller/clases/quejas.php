<?php

include_once '../../models/conection.php';

class Quejas extends DB{
    
    function obtenerQuejas(){
        $query = $this->connect()->query('SELECT c.*, u.full_name FROM complaints c INNER JOIN users u ON u.id = c.id');
        return $query;
    }

    function obtenerQueja($id){
        $query = $this->connect()->prepare('SELECT c.*, u.full_name FROM complaints c INNER JOIN users u ON u.id = c.id WHERE id = :id');
        $query->execute(['id' => $id]);
        return $query;
    }

    function createQueja($tipo, $asunto, $usuario, $imagen){
    	if($imagen['type']=='image/jpg' or $imagen['type']=='image/jpeg' or $imagen['type']=='image/png'){
            $ruta="../../images/".md5($imagen['tmp_name']).'.jpg';
            $nameImage=md5($imagen['tmp_name']).'.jpg';
            $query = $this->connect()->prepare('INSERT INTO `complaints`(`co_type`, `co_affair`, `user_id`, `co_image`) VALUES (:tipo,:asunto,:usuario,:imagen)');
        	$query->execute([
        					'tipo' => $tipo,
        					'asunto' => $asunto,
        					'usuario' => $usuario,
        					]);
            if ($sql) {
                move_uploaded_file($imagen['tmp_name'],$ruta);
                echo 'true';
            } else {
                echo mysqli_error($con);
            }
        }
        return $query;
    }

    function updateQueja($id, $tipo, $asunto, $usuario){
    	if($imagen['type']=='image/jpg' or $imagen['type']=='image/jpeg' or $imagen['type']=='image/png'){
            $ruta="../../images/".md5($imagen['tmp_name']).'.jpg';
            $nameImage=md5($imagen['tmp_name']).'.jpg';
            $query = $this->connect()->prepare('UPDATE complaints SET co_type = :tipo, co_affair = :asunto, user_id = :usuario WHERE id = :id');
        	$query->execute([
        					'id' => $id,
        					'tipo' => $tipo,
        					'asunto' => $asunto,
        					'usuario' => $usuario,
        					]);
            if ($query) {
                move_uploaded_file($imagen['tmp_name'],$ruta);
                echo 'true';
            } else {
                echo mysqli_error($con);
            }
        }
        return $query;
    }

    function deleteQueja($id){
            $query = $this->connect()->prepare('DELETE FROM complaints WHERE id = :id');
        	$query->execute([
        					'id' => $id
        					]);
            if ($query) {
                echo 'true';
            } else {
                echo mysqli_error($con);
            }
        }
        return $query;
    }

}

?>