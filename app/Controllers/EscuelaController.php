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
    function show($id_escuela){

        $query ="SELECT * FROM escuela where id_escuela = :id_escuela limit 1";

        $stm = $this->connection -> get_connection()->prepare($query);
        $stm -> bindParam(":id_escuela",$id_escuela);
        $stm -> execute();
        $result = $stm-> fetch(\PDO::FETCH_ASSOC);
        
        if(!empty($result)){
                  
        } else{
            echo "El registro no existe";
        }
        return $result;
    }
    function store($nombre_escuela, $ciudad, $zona, $responsable){
        
        $query = "INSERT INTO escuela (nombre_escuela,
         ciudad, zona, responsable)
                  VALUES (?, ?, ?, ?)";
        
        $stm = $this->connection -> get_connection()->prepare($query);
        $results = $stm -> execute([$nombre_escuela,
        $ciudad,
        $zona,
        $responsable,
      ]);

        header("Location: index.php");
        try{
            if(!empty($results)){
                $statusCode = 200;
                $response = "Se registró exitosamente la escuela: '{$nombre_escuela['nombre']}'
                             en la base de datos";
                echo $response;
                return[$statusCode, $response, $results];
            }
        }catch(Exception $e){
            echo("Ocurrio un error durante el registro de la escuela en la base de datos");
        }
        
    }
    function index(){

        $query = "SELECT * FROM escuela";

        $stm = $this->connection -> get_connection()->prepare($query);
        $stm -> execute();
        $results = $stm-> fetchAll(\PDO::FETCH_ASSOC);

        return $results;
        
    }
    public function delete($id_escuela){

        $query = "DELETE FROM escuela WHERE id_escuela=:id_escuela";

        $stm = $this->connection -> get_connection()->prepare($query);
        $result = $stm -> execute([":id_escuela" => $id_escuela]);
               
        if($result){

            header("Location:./src/views/rp/bootcampView/escuela/index.php");
        } else{
            echo "No se pudo eliminar el la escuela con id: $id_escuela";
        }
    }
    public function update($id_escuela, $nombre_escuela, $ciudad, $zona, $responsable){

        $query = "UPDATE escuela SET nombre_escuela = :nombre_escuela, ciudad = :ciudad, zona = :zona, responsable = :responsable WHERE id_escuela = :id_escuela";

        $stm = $this->connection -> get_connection()->prepare($query);
        $stm->bindParam(":id_escuela",$id_escuela);
        $stm->bindParam(":nombre_escuela",$nombre_escuela);
        $stm->bindParam(":ciudad",$ciudad);
        $stm->bindParam(":zona",$zona);
        $stm->bindParam(":responsable",$responsable);
        $result = $stm -> execute();
               
        if($result){

            header("Location:index.php");
        } else{
            echo "No se pudo actualizar la escuela con id: $id_escuela";
        }
    }

}

?>