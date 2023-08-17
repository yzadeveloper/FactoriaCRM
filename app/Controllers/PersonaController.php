<?php
namespace App\Controllers;
use Database\DatabaseConnection;


class PersonaController{
    private $server;
    private $username;
    private $password;
    private $database;
    private $connection;
    
    public function __construct()
    {
        // Definir datos de conexión
        $this -> server = "localhost";
        $this -> username = "root";
        $this -> password = "";
        $this -> database = "crm_factoria";

        // Conectar a DB
        $this -> connection = new DatabaseConnection($this->server, $this->username, $this->password,$this->database); 
        $this-> connection -> connect();
    }
    function show($id){
        // Definir la Query de INSERT
        $query = "SELECT * FROM persona WHERE id=:id";

        // Preparar la query
        $stm = $this->connection -> get_connection()->prepare($query);

        // Ejecutar la query
        $stm -> execute([":id" => $id]);
        $result = $stm-> fetch(\PDO::FETCH_ASSOC);
        
        if(!empty($result)){
                echo $result['nombre'];  
        } else{
            echo "El registro no existe";
        }
    }
}

?>