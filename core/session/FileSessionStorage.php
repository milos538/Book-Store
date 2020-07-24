<?php
    namespace App\Core\Session;

    class FileSessionStorage{
        private $sessionPath;
        
        public function __construct(string $sessionPath){
            $this->sessionPath = $sessionPath;
        }

        public function save(string $sessionId,string $sessionData){
            $sessionFileName = $this->sessionPath . $sessionId . '.json';
            file_put_contents($sessionFileName,$sessionData);
        }

        public function load(string $sessionId): string{
            $sessionFileName = $this->sessionPath . $sessionId . '.json';
            
            if(!file_exists($sessionFileName)){
                return '{}';
            }
            return file_get_contents($sessionFileName);
        }

        public function delete(string $sessionId): string{
            $sessionFileName = $this->sessionPath . $sessionId . '.json';
                  
            if(file_exists($sessionFileName)){
                unlink($this->sessionPath . $sessionId . '.json');
            }
        }

    }