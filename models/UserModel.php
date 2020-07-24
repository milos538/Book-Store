<?php
    namespace App\Models;

    use App\Core\DatabaseConnection;
    use App\Core\DatabaseConfiguration;
    use \PDO;

    class USerModel{
        private $dbc;

        public function __construct(DatabaseConnection &$dbc){
            $this->dbc = $dbc;
        }

        public function getUserByEmail(string $userEmail){
            $sql = "SELECT * FROM user WHERE user.email = ?";
            $prep = $this->dbc->getConnection()->prepare($sql);
            $res = $prep->execute(array($userEmail));
            $user;

            if($res){
                $user = $prep->fetch(PDO::FETCH_OBJ);
            }
            
            return $user;
        }

        public function addUser(array $user){
            $sql = "INSERT INTO user (email, password_hash, user.name, surname) VALUES (:email, :password_hash, :userName, :surname);";
            $prep = $this->dbc->getConnection()->prepare($sql);
            $res = $prep->execute($user);

            if(!$res){
                return false;
            }
            
            return true;
        }

    }



















?>