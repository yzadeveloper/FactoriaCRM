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
        $query ="SELECT * FROM persona where id = :id limit 1";
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
    function store($nombre, $apellidos, $correo, $telefono, $direccion, $codigo_postal, $fecha_nacimiento, $genero, $dni, $id_rol, $tratamiento_datos, $fecha_registro){
        
        $query = "INSERT INTO persona (nombre,
         apellidos, correo, telefono, direccion, 
         codigo_postal, fecha_nacimiento, genero, dni, id_rol, tratamiento_datos, fecha_registro)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
       
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
        $id_rol,
        $tratamiento_datos,
        $fecha_registro
      ]);

       //header("Location: show.php");
        try{
            if(!empty($results)){
                $statusCode = 200;
                $response = "Se registró exitosamente el candidato: '{$nombre}'
                             en la base de datos";
                echo $response;
                return[$statusCode, $response, $results];
            }
        }catch(Exception $e){
            echo("Ocurrio un error durante el registro de la base de datos");
        }
        
    }
    function index(){

        $query = "SELECT * FROM persona ";

        $stm = $this->connection -> get_connection()->prepare($query);

        $stm -> execute();
        
        $results = $stm-> fetchAll(\PDO::FETCH_ASSOC);
        return $results;
        

    }
    public function delete($id){

        $query = "DELETE FROM persona WHERE id=:id";

        $stm = $this->connection -> get_connection()->prepare($query);


        $result = $stm -> execute([":id" => $id]);
               
        if($result){

            header("Location: index.php");
        } else{
            echo "No se pudo eliminar el registro con id: $id";
        }
    }
    public function update($id, $nombre, $apellidos, $correo, $telefono, $direccion, $codigo_postal, $fecha_nacimiento,$genero, $dni, $id_rol){

        $query = "UPDATE persona SET nombre = :nombre, apellidos = :apellidos, correo = :correo, telefono = :telefono, direccion = :direccion, codigo_postal = :codigo_postal, fecha_nacimiento = :fecha_nacimiento, genero = :genero, dni = :dni, id_rol = :id_rol WHERE id = :id";

  

        $stm = $this->connection -> get_connection()->prepare($query);
        $stm->bindParam(":id",$id);
        
        $stm->bindParam(":nombre",$nombre);
        $stm->bindParam(":apellidos",$apellidos);
        $stm->bindParam(":correo",$correo);
        $stm->bindParam(":telefono",$telefono);
        $stm->bindParam(":direccion",$direccion);
        $stm->bindParam(":codigo_postal",$codigo_postal);
        $stm->bindParam(":fecha_nacimiento",$fecha_nacimiento);
        $stm->bindParam(":genero",$genero);
        $stm->bindParam(":dni",$dni);
        $stm->bindParam(":id_rol",$id_rol);

        $result = $stm -> execute();
               
        if($result){

            header("Location:show.php?id=$id");
        } else{
            echo "No se pudo actualizar el registro con id: $id";
        }
    }


}

?>