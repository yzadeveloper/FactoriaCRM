<?php

//require_once '../vendor/autoload.php'; // Asegúrate de cargar el autoloader de Composer
use Database\DatabaseConnection;

use PHPUnit\Framework\TestCase;
class DatabaseConnectionTest extends TestCase
{
    public function testDatabaseConnectionSuccess()
    {
        $server = 'localhost'; // Cambia esto por tu configuración
        $username = 'root';    // Cambia esto por tu configuración
        $password = '';        // Cambia esto por tu configuración
        $database = 'crm_factoria'; // Cambia esto por tu configuración

        $dbConnection = new DatabaseConnection($server, $username, $password, $database);
        $dbConnection->connect();
        $connection = $dbConnection->get_connection();

        $this->assertEquals(null, $connection);
    }
}

