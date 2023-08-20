<?php
namespace App\Controllers;
use Database\DatabaseConnection;
use Exception;
class PersonaRequisitosIngresoController{
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
    function show($id_persona,$id_requisito){
        $query ="SELECT * FROM requisitos_ingreso where id_persona = :id ";
        
        $stm = $this->connection -> get_connection()->prepare($query);
        $stm -> bindParam(":id_persona",$id_persona);
        $stm -> bindParam(":id_requisito",$id_requisito);
        $stm -> execute();
        $result = $stm-> fetch(\PDO::FETCH_ASSOC);
        
        if(!empty($result)){
                  
        } else{
            echo "El registro no existe";
        }
        return $result;
    }
    function store($id, $requisito, $fecha){
        
        $query = "INSERT INTO persona_requisitos_ingreso (id_persona, id_requisitos_ingreso,fecha)
                  VALUES (?,?,?)";
        
       
        $stm = $this->connection -> get_connection()->prepare($query);
        $results = $stm -> execute([$id, $requisito, $fecha]);

        header("Location:show.php?id=$id");
        try{
            if(!empty($results)){
                $statusCode = 200;
                $response = "Se registró exitosamente el requisito: '{$requisito['nombre']}'
                             en la base de datos";
                echo $response;
                return[$statusCode, $response, $results];
            }
        }catch(Exception $e){
            echo("Ocurrio un error durante el registro de la base de datos");
        }
        
    }
    function index(){

        $query = "SELECT * FROM persona_requisitos_ingreso";

        $stm = $this->connection -> get_connection()->prepare($query);

        $stm -> execute();
        $results = $stm-> fetchAll(\PDO::FETCH_ASSOC);
        return $results;
        
        //require("./src/views/candidato/show.php");
    }
    public function delete($id){

        $query = "DELETE FROM requisitos_ingreso WHERE id=:id";

        $stm = $this->connection -> get_connection()->prepare($query);

        $result = $stm -> execute([":id" => $id]);
               
        if($result){

            header("Location:./src/views/candidato/show.php");
        } else{
            echo "No se pudo eliminar el registro con id: $id";
        }
    }
    public function update($id, $nombre){

        $query = "UPDATE persona_requisitos_ingreso SET nombre = :nombre WHERE id = :id";

  

        $stm = $this->connection -> get_connection()->prepare($query);
        $stm->bindParam(":id",$id);
        $stm->bindParam(":nombre",$nombre);


        $result = $stm -> execute();
               
        if($result){

            header("Location:show.php?id=$id");
        } else{
            echo "No se pudo actualizar el registro con id: $id";
        }
    }


}

?>