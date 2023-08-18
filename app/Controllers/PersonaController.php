<?php
namespace App\Controllers;
use Database\DatabaseConnection;
use Exception;


class PersonaController{
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
        $query ="SELECT * FROM persona";
        //$query = "SELECT * FROM persona WHERE id=:id";

        $stm = $this->connection -> get_connection()->prepare($query);
        $stm -> execute([":id" => $id]);
        $result = $stm-> fetch(\PDO::FETCH_ASSOC);
        
        if(!empty($result)){
                echo $result['nombre'];  
        } else{
            echo "El registro no existe";
        }
    }
    function store($nombre, $apellidos, $correo, $telefono, $direccion, $codigo_postal, $fecha_nacimiento, $genero, $dni){
        
        $query = "INSERT INTO persona (nombre,
         apellidos, correo, telefono, direccion, 
         codigo_postal, fecha_nacimiento, genero, dni)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
       
        $stm = $this->connection -> get_connection()->prepare($query);
        $results = $stm -> execute([$nombre,
        $apellidos,
        $correo,
        $telefono,
        $direccion,
        $codigo_postal,
        $fecha_nacimiento,
        $genero,
        $dni,
      ]);

        header("Location: show.php");
        try{
            if(!empty($results)){
                $statusCode = 200;
                $response = "Se registró exitosamente el candidato: '{$nombre['nombre']}'
                             en la base de datos";
                echo $response;
                return[$statusCode, $response, $results];
            }
        }catch(Exception $e){
            echo("Ocurrio un error durante el registro de la base de datos");
        }
        
    }
    function index(){

        $query = "SELECT * FROM persona";

        $stm = $this->connection -> get_connection()->prepare($query);

        $stm -> execute();
        $results = $stm-> fetchAll(\PDO::FETCH_ASSOC);
        return $results;
        
        //require("./src/views/candidato/show.php");
    }
    public function delete($id){

        $query = "DELETE FROM persona WHERE id=:id";

        $stm = $this->connection -> get_connection()->prepare($query);

        $result = $stm -> execute([":id" => $id]);
               
        if($result){

            header("Location:./src/views/candidato/show.php");
        } else{
            echo "No se pudo eliminar el registro con id: $id";
        }
    }

}

?>