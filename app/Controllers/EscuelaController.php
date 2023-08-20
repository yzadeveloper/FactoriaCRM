<?php
namespace App\Controllers;
use Database\DatabaseConnection;
use Exception;
class EscuelaController{
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
        $query ="SELECT * FROM escuela where id = :id limit 1";
        //$query = "SELECT * FROM persona WHERE id=:id";

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
    function store($nombre, $ciudad, $zona, $responsable){
        
        $query = "INSERT INTO escuela (nombre,
         ciudad, zona, responsable)
                  VALUES (?, ?, ?, ?)";
        
       
        $stm = $this->connection -> get_connection()->prepare($query);
        $results = $stm -> execute([$nombre,
        $ciudad,
        $zona,
        $responsable,
      ]);

        header("Location: show.php");
        try{
            if(!empty($results)){
                $statusCode = 200;
                $response = "Se registró exitosamente el bootcamp: '{$nombre['nombre']}'
                             en la base de datos";
                echo $response;
                return[$statusCode, $response, $results];
            }
        }catch(Exception $e){
            echo("Ocurrio un error durante el registro de la base de datos");
        }
        
    }
    function index(){

        $query = "SELECT * FROM escuela";

        $stm = $this->connection -> get_connection()->prepare($query);

        $stm -> execute();
        $results = $stm-> fetchAll(\PDO::FETCH_ASSOC);
        return $results;
        
        //require("./src/views/candidato/show.php");
    }
    public function delete($id){

        $query = "DELETE FROM escuela WHERE id=:id";

        $stm = $this->connection -> get_connection()->prepare($query);

        $result = $stm -> execute([":id" => $id]);
               
        if($result){

            header("Location:./src/views/escuela/show.php");
        } else{
            echo "No se pudo eliminar el registro con id: $id";
        }
    }
    public function update($id, $nombre, $ciudad, $zona, $responsable){

        $query = "UPDATE escuela SET nombre = :nombre, ciudad = :ciudad, zona = :zona, responsable = :responsable WHERE id = :id";

        $stm = $this->connection -> get_connection()->prepare($query);
        $stm->bindParam(":id",$id);
        
        $stm->bindParam(":nombre",$nombre);
        $stm->bindParam(":ciudad",$ciudad);
        $stm->bindParam(":zona",$zona);
        $stm->bindParam(":responsable",$responsable);
            //ver aqui arriba si no esta mal!!!!!//

        $result = $stm -> execute();
               
        if($result){

            header("Location:show.php");
        } else{
            echo "No se pudo actualizar el registro con id: $id";
        }
    }


}

?>