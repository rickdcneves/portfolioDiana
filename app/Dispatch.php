<?php

namespace App;

use Src\Classes\ClassRoutes;

class Dispatch extends ClassRoutes{
    
    private $Method;
    private $Param=[];
    private $Obj;

    protected function getMethod() {
        return $this->Method;
    }

    public function setMethod($Method) {
        $this->Method = $Method;
    }

    protected function getParam() {
        return $this->Param;
    }

    public function setParam($Param) {
        $this->Param = $Param;
    }

        
    public function __construct() {
        self::addController();
    }
    
    //Add Controler
    private function addController() {
        $RotaController= $this->getRota();
        $NameS="App\\Controller\\{$RotaController}";
        $this->Obj= new $NameS;
        
        //se existir metodo
        if(isset($this->getRota()[1])){
            self::addMethod();
        }
    }
    
    //metodo de adicão de metodos a controllers
    private function addMethod(){
        
        if(method_exists($this->Obj, $this->parseUrl()[1])){
            $this->setMethod("{$this->parseUrl()[1]}");
            self::addParam();
            call_user_func_array([$this->Obj, $this->getMethod()], $this->getParam());
        }
    }
    
    //metodo de adição de parametros
    private function addParam() {
        $CountArray= count($this->parseUrl());
        if($CountArray > 2){
            foreach ($this->parseUrl() as $key => $value) {
                if($key>1){
                    $this->setParam($this->Param += [$key=>$value]);
                }
            }
        }
    }
}

