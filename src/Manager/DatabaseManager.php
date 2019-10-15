<?php
namespace DeveloperTest\Manager;

use PDO;

class DatabaseManager extends PDO
{
    /**
     * @var string
     */
    private $host = 'localhost';

    /**
     * @var string
     */
    private $database = 'developer_test';

    /**
     * @var string
     */
    private $username = 'root';

    /**
     * @var string
     */
    private $password = 'password';

    /**
     * @var PDO
     */
    private $connection;

    /**
     * @return PDO
     */
    public function __construct()
    {
        return $this->connection = parent::__construct('mysql:host=' . $this->host .
            ';dbname=' . $this->database, $this->username, $this->password);
    }
}