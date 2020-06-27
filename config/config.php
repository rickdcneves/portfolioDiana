<?php
#arquivos das pastas raizes
$pasta="";
define('DIRPAGE',"http://{$_SERVER['HTTP_HOST']}/{$pasta}");

if(substr($_SERVER['DOCUMENT_ROOT'],-1)=='/'){
    define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}{$pasta}");
}else{
    define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}/{$pasta}");
}

#Pastas do Public constantes
define('DIRIMG',DIRPAGE."public/img/");
define('DIRCSS',DIRPAGE."public/css/");
define('DIRJS',DIRPAGE."public/js/");

#acesso a Base de Dados

define('HOST', "LOCALHOST");
define('DB', "diana");
define('USER', "root");
define('PASS', "");