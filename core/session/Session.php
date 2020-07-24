<?php
    namespace App\Core\Session;

    final class Session{
        private $sessionStorage;
        private $sessionData;
        private $sessionId;

        public function __construct(FileSessionStorage $sessionStorage){
            $this->sessionStorage = $sessionStorage;
            $this->sessionData = (object)[];
            $this->sessionId = \filter_input(INPUT_COOKIE, 'APPSESSION', FILTER_SANITIZE_STRING);
            $this->sessionId = \preg_replace('|[^A-Za-z0-9]|','', $this->sessionId);
            if(strlen($this->sessionId) !== 32){
                $this->sessionId = $this->generateSessionId();
                \setcookie('APPSESSION',$this->sessionId, time() + 1800, "/","", 0);
            }

        }

        private function generateSessionId() : string{
            $supported = "QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm0123456789";
            $id = "";
            for($i = 0; $i < 32; $i++){
                $id .= $supported[rand(0, strlen($supported)-1)];
            }
            return $id;
        }

        public function put(string $key, $value){
            $this->sessionData->$key = $value;
        }

        public function get(string $key, $defaultValue = []){
            return $this->sessionData->$key ?? $defaultValue;
        }
    
        public function clear(){
            $this->sessionData = (object)[];
        }
            
        public function exists(string $key) : bool{
            return isset($this->sessionData->$key);
        }

        public function has(string $key) : bool{
            if(!$this->exists($key)){
                return false;
            }

            return \boolval($this->sessionData->$key);
        }

        public function save(){
            $jsonData = \json_encode($this->sessionData);
            $this->sessionStorage->save( $this->sessionId, $jsonData);
        }

        public function reload(){
            $jsonData = $this->sessionStorage->load($this->sessionId);
            $restoredData = \json_decode($jsonData);
            
            if(!$restoredData){
                $this->sessionData = (object) [];
                return;
            }

            $this->sessionData = $restoredData;
        }

    }