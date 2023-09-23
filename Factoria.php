<?php

require_once 'Conjunto.php';

class Factoria {
    static $letras=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','Ñ','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

    static function crearConjunto(){
        $v = [];
        for ($i=0; $i < 10; $i++) { 
            $l = self::$letras[rand(0,count(self::$letras)-1)];
            $v[]= $l; 
        }
        $c = new Conjunto();
        $c->addConjunto($v);
        return $v;
    }

}
