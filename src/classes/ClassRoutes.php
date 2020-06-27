<?php
namespace Src\Classes;
use Src\Traits\TraitUrlParser;

class ClassRoutes{
    use TraitUrlParser;
    
    private $Rota;
    
    #metodo para retornar a rota amigavel
    public function getRota() {
        $Url= $this->parseUrl();
        //indece
        $I=$Url[0];
        
        $this->Rota=array(
           "" => "ControllerHome",
           "Home" => "ControllerHome",
           "sitemap" => "ControllerSiteMap",
        );
        #Condição se a rota não existir
        if(array_key_exists($I, $this->Rota)){
            if(file_exists(DIRREQ."app/controller/{$this->Rota[$I]}.php")){
                return $this->Rota[$I];
            }else{
                return "ControllerHome";
            }
        }else{
            return "ControllerHome";
        }
    }


}

