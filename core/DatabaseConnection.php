<?php
    namespace App\Core;
    use \PDO;

    class DatabaseConnection{
        private $connection;
        private $configuration;

        public function __construct(DatabaseConfiguration $databeConfiguration){
            $this->configuration = $databeConfiguration;
        }

        public function getConnection() : PDO{
            if($this->connection === NULL){
                try{
                    $this->connection = new PDO($this->configuration->getSourceString(), $this->configuration->getUser(),$this->configuration->getPassword(),array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                } 
                catch(PDOException $ex) {
                    echo("Can't open the database.");
                }

            }
            return $this->connection;
        }
    }

?>