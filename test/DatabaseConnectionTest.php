<?php

require_once '../vendor/autoload.php'; // Asegúrate de cargar el autoloader de Composer
require_once '../database/DatabaseConnection.php'; // Ajusta la ruta al archivo de la clase DatabaseConnection

class DatabaseConnectionTest extends \PHPUnit\Framework\TestCase
{
    public function testDatabaseConnection()
    {
        $server = 'localhost'; // Cambia esto por tu configuración
        $username = 'root';    // Cambia esto por tu configuración
        $password = '';        // Cambia esto por tu configuración
        $database = 'crm_factoria'; // Cambia esto por tu configuración

        $dbConnection = new DatabaseConnection($server, $username, $password, $database);
        $dbConnection->connect();

        $this->assertInstanceOf(\PDO::class, $dbConnection->get_connection());
    }
}

