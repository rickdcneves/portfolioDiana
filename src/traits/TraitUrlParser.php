<?php

namespace Src\Traits;

trait TraitUrlParser{
    #transforma e divide a url em array
    public function parseUrl() {
        return explode("/", rtrim($_GET['url']),FILTER_SANITIZE_URL);
    }
    
}

