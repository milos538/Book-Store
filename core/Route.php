<?php
    namespace App\Core;

    class Route{
        private $requestMethod;
        private $controller;
        private $method;
        private $pattern;

        private function __construct(string $pattern,string $requestMethod,string $controller, string $method){
            $this->requestMethod = $requestMethod;
            $this->controller = $controller;
            $this->method = $method;
            $this->pattern = $pattern;
        }

        public static function get(string $pattern,string $controller, string $method){
            return new Route($pattern,"GET",$controller,$method);
        }

        public static function post(string $pattern,string $controller, string $method){
            return new Route($pattern,"POST",$controller,$method);
        }

        public function matches(string $method, string $url) : bool{
            if(!preg_match('/^' . $this->requestMethod . '$/', $method)){
                return false;
            }
            return boolval(preg_match($this->pattern, $url));
        }

        public function getControllerName() : string{
            return $this->controller;
        }

        public function getMethodName() : string{
            return $this->method;
        }

        public function extractArguments(string $url) : array{
            $matches = [];
            $arguments = [];
            preg_match($this->pattern, $url, $matches);
            if(isset($matches[2])){
                $arguments[0] = $matches[2];
            }
            else if(isset($matches[1])){
                $arguments[0] = $matches[1];
            }
            else if(isset($matches[0])){
                $arguments[0] = $matches[0];
            }
            return $arguments;
        }
    }