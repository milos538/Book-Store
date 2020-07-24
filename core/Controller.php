<?php
    namespace App\Core;
    use App\Core\DatabaseConnection;
    use App\Models\BookModel;

    class Controller{
        private $dbc;
        private $session;
        private $data = [];

        public function __pre(){}

        final public function __construct(DatabaseConnection $dbc){
            $this->dbc = $dbc;
        }

        final public function &getSession() : \App\Core\Session\Session{
            return $this->session;
        }

        final public function setSession(\App\Core\Session\Session &$session){
            $this->session = $session;
        }

        final public function &getDatabaseConnection() : DatabaseConnection{
            return $this->dbc;
        }

        final protected function set(string $name, $value){
            $result = false;

            if(preg_match("/[A-z\"']{1,}[a-z0-9]*/", $name)){
                require_once('models/BookModel.php');
                $this->data[$name] = $value;
                $result = true;
            }
            
            return $result;
        }

        final public function getData() : array{
            return $this->data;
        }
        
        final public function redirect(string $path){
            ob_clean();
            header('Location: ' . $path, ture, 307);
            exit;
        }

        final public function userLoggedInStatus() : string{
            if($this->session->has('user_id')){
                return 'true';
            }
            else{
                return 'false';
            }
        }

    }