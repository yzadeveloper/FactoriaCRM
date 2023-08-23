<?php
namespace App\Controllers;
use Database\DatabaseConnection;
use Exception;
class BootcampController{
    private $server;
    private $username;
    private $password;
    private $database;
    private $connection;
    
    public function __construct()
    {
       
        $this -> server = "localhost";
        $this -> username = "root";
        $this -> password = "";
        $this -> database = "crm_factoria";

        $this -> connection = new DatabaseConnection($this->server, $this->username, $this->password,$this->database); 
        $this-> connection -> connect();
    }
    function show($id){
        $query ="SELECT * FROM bootcamp where id = :id limit 1";

        $stm = $this->connection -> get_connection()->prepare($query);
        $stm -> bindParam(":id",$id);
        $stm -> execute();
        $result = $stm-> fetch(\PDO::FETCH_ASSOC);
        
        if(!empty($result)){
                  
        } else{
            echo "El registro no existe";
        }
        return $result;
    }
    function store($nombre_bootcamp, $promocion, $genero, $patrocinador, $id_escuela){
        
        $query = "INSERT INTO bootcamp (nombre_bootcamp,
         promocion, genero, patrocinador, id_escuela)
                  VALUES (?, ?, ?, ?, ?)";
        
       
        $stm = $this->connection -> get_connection()->prepare($query);
        $results = $stm -> execute([$nombre_bootcamp,
        $promocion,
        $genero,
        $patrocinador,
        $id_escuela
      ]);

        header("Location: index.php");
        try{
            if(!empty($results)){
                $statusCode = 200;
                $response = "Se registró exitosamente el bootcamp: '{$nombre_bootcamp['nombre_bootcamp']}'
                             en la base de datos";
                echo $response;
                return[$statusCode, $response, $results];
            }
        }catch(Exception $e){
            echo("Ocurrio un error durante el registro de la base de datos");
        }
        
    }
    function index(){

        $query = "SELECT * FROM bootcamp LEFT JOIN escuela ON escuela.id_escuela = bootcamp.id_escuela";

        $stm = $this->connection -> get_connection()->prepare($query);

        $stm -> execute();
        $results = $stm-> fetchAll(\PDO::FETCH_ASSOC);
        return $results;
        
    }
    public function delete($id){

        $query = "DELETE FROM bootcamp WHERE id=:id";

        $stm = $this->connection -> get_connection()->prepare($query);

        $result = $stm -> execute([":id" => $id]);
               
        if($result){

            header("Location:./src/views/rp/bootcampView/index.php");
        } else{
            echo "No se pudo eliminar el registro con id: $id";
        }
    }
    public function update($id, $nombre_bootcamp, $promocion, $genero, $patrocinador, $id_escuela){

        $query = "UPDATE bootcamp SET id_escuela = :id_escuela, nombre_bootcamp = :nombre_bootcamp, promocion = :promocion, genero = :genero, patrocinador = :patrocinador WHERE id = :id";

        $stm = $this->connection -> get_connection()->prepare($query);
        $stm->bindParam(":id",$id);
        
        $stm->bindParam(":nombre_bootcamp",$nombre_bootcamp);
        $stm->bindParam(":promocion",$promocion);
        $stm->bindParam(":genero",$genero);
        $stm->bindParam(":patrocinador",$patrocinador);
        $stm->bindParam(":id_escuela",$id_escuela);

        $result = $stm -> execute();
               
        if($result){

            header("Location:index.php");
        } else{
            echo "No se pudo actualizar el registro con id: $id";
        }
    }


}

?>