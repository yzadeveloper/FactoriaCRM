<?php
namespace App\Controllers;
use Database\DatabaseConnection;
use Exception;
class RequisitosIngresoController{
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
    function show($id_requisitos_ingreso){
        $query ="SELECT * FROM requisitos_ingreso where id_requisitos_ingreso = :id_requisitos_ingreso limit 1";
        //$query = "SELECT * FROM persona WHERE id=:id";

        $stm = $this->connection -> get_connection()->prepare($query);
        $stm -> bindParam(":id_requisitos_ingreso",$id_requisitos_ingreso);
        $stm -> execute();
        $requisitos = $stm-> fetch(\PDO::FETCH_ASSOC);
        
        if(!empty($requisitos)){
                  
        } else{
            echo "El registro no existe";
        }
        return $requisitos;
    }
    function store($nombre_requisitos){
        
        $query = "INSERT INTO requisitos_ingreso (nombre_requisitos)
                  VALUES (?)";
        
       
        $stm = $this->connection -> get_connection()->prepare($query);
        $results = $stm -> execute([$nombre_requisitos]);

        header("Location: index.php");
        try{
            if(!empty($results)){
                $statusCode = 200;
                $response = "Se registró exitosamente el requisito: '{$nombre_requisitos['nombre_requisitos']}'
                             en la base de datos";
                echo $response;
                return[$statusCode, $response, $results];
            }
        }catch(Exception $e){
            echo("Ocurrio un error durante el registro de la base de datos");
        }
        
    }
    function index(){

        $query = "SELECT * FROM requisitos_ingreso";

        $stm = $this->connection -> get_connection()->prepare($query);

        $stm -> execute();
        $results = $stm-> fetchAll(\PDO::FETCH_ASSOC);
        
        return $results;
        
    }
    public function delete($id_requisitos_ingreso){

        $query = "DELETE FROM requisitos_ingreso WHERE id_requisitos_ingreso=:id_requisitos_ingreso";

        $stm = $this->connection -> get_connection()->prepare($query);

        $result = $stm -> execute([":id_requisitos_ingreso" => $id_requisitos_ingreso]);
               
        if($result){

            header("Location: index.php");
        } else{
            echo "No se pudo eliminar el registro con id: $id_requisitos_ingreso";
        }
    }
    public function update($id_requisitos_ingreso, $nombre_requisitos){

        $query = "UPDATE requisitos_ingreso SET nombre_requisitos = :nombre_requisitos WHERE id_requisitos_ingreso = :id_requisitos_ingreso";

  

        $stm = $this->connection -> get_connection()->prepare($query);
        $stm->bindParam(":id_requisitos_ingreso",$id_requisitos_ingreso);
        $stm->bindParam(":nombre_requisitos",$nombre_requisitos);


        $result = $stm -> execute();
               
        if($result){

            header("Location:index.php");
        } else{
            echo "No se pudo actualizar el requisito: $nombre_requisitos";
        }
    }


}

?>