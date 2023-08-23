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
    function show($id){
        $query = "SELECT * FROM persona_requisitos_ingreso 
        LEFT JOIN persona ON persona.id = persona_requisitos_ingreso.id_persona
        LEFT JOIN requisitos_ingreso ON requisitos_ingreso.id_requisitos_ingreso = persona_requisitos_ingreso.id_requisitos_ingreso
                    WHERE id = :id ";
        
        $stm = $this->connection -> get_connection()->prepare($query);
        $stm -> bindParam(":id",$id);
        
        $stm -> execute();
        $requisitos = $stm-> fetchAll(\PDO::FETCH_ASSOC);
        
        return $requisitos;
    }
    function store($id, $requisito){
        
        $query = "INSERT INTO persona_requisitos_ingreso (id_persona, id_requisitos_ingreso)
                  VALUES (?,?)";
        
       
        $stm = $this->connection -> get_connection()->prepare($query);
        $results = $stm -> execute([$id, $requisito]);

        header("Location:../edit.php?id=$id");
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

        $query = "SELECT * FROM persona_requisitos_ingreso 
                INNER JOIN persona ON persona.id = persona_requisitos_ingreso.id_persona
                INNER JOIN requisitos_ingreso ON requisitos_ingreso.id_requisitos_ingreso = persona_requisitos_ingreso.id_requisitos_ingreso";

        $stm = $this->connection -> get_connection()->prepare($query);

        $stm -> execute();
        $results = $stm-> fetchAll(\PDO::FETCH_ASSOC);
        return $results;
        
        //require("./src/views/candidato/show.php");
    }
    
    public function delete($id_persona){

        $query = "DELETE FROM persona_requisitos_ingreso WHERE id_persona=:id_persona, id_requisito=:id_requisito";

        $stm = $this->connection -> get_connection()->prepare($query);

        $result = $stm -> execute([":id_persona" => $id_persona]);
               
        if($result){

            //header("Location:./src/views/personaView/show.php?id=$id");
        } else{
            echo "No se pudo eliminar el requisito con id: $id_persona";
        }
    }
    public function update($id, $nombre, $fecha){

        $query = "UPDATE persona_requisitos_ingreso SET nombre = :nombre, fecha = :fecha WHERE id = :id";

  

        $stm = $this->connection -> get_connection()->prepare($query);
        $stm->bindParam(":id",$id);
        $stm->bindParam(":nombre",$nombre);
        $stm->bindParam(":fecha",$fecha);


        $result = $stm -> execute();
               
        if($result){

            header("Location:show.php?id=$id");
        } else{
            echo "No se pudo actualizar el registro con id: $id";
        }
    }


}

?>