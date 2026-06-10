<?php

class Connexion
{
    private $host = 'localhost';
    private $dbname = 'cars_ehm';
    private $username = 'root';
    private $password = '';

    public static $cnx = null;

    public function __construct($host = 'localhost', $dbname = 'cars_ehm', $username = 'root', $password = '')
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect()
    {
        if (self::$cnx === null) {
            try {
                self::$cnx = new PDO(
                    "mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
                    $this->username,
                    $this->password
                );

                // Mode erreur (IMPORTANT)
                self::$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                die("Erreur de connexion : " . $e->getMessage());
            }
        }

        return self::$cnx;
    }

    public function disconnect()
    {
        self::$cnx = null;
    }
}
?>