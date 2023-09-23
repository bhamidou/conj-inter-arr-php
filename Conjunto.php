<?php

class Conjunto {
    public $letras;

	public function __construct() {
		$letras = [];
	}

    public function addConjunto($con){
        $this->letras = $con;
    }

    public function createInter($c1){
        $v = [];
        $rev = array_count_values($c1);

        foreach ($this->letras as $i => $value) {
            
            if(!empty($rev[$value])){
                
                if($rev[$value]>1){
                    $j = 0;
                    
                    while($j<$rev[$value]){
                        $v[] = $value;
                        $j++;
                    }
                } else{
                    $v[] = $value;
                }
            }
        }

        return $v;
    }

    public function unionArr($c1){

        foreach ($c1 as $i => $value) {
            $this->letras[] = $value;
        }

        return $this->letras;
    }
}