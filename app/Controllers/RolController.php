<?php
namespace App\Controllers;
use Database\DatabaseConnection;
class RolController{
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
    function index(){

        $query = "SELECT * FROM rol ";

        $stm = $this->connection -> get_connection()->prepare($query);
        $stm -> execute();
        $results = $stm-> fetchAll(\PDO::FETCH_ASSOC);

        return $results;   
    }
}
?>