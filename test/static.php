<?php


class Test{


    public static $instance;

    public function hi($name){
        $this->message = "Hello $name";
        return $this;
    }

    public function bye($name){
        $this->message = $this->message."By $name";
        return $this;
    }

    public function getMessage(){
        return $this->message;
    }

    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new Test();
        }
        return self::$instance;
    }
}
echo Test::getInstance()->hi('John')->bye('Doe')->getMessage();