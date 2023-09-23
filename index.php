<?php

include_once 'Conjunto.php';
include_once 'Factoria.php';

//header("Content-Type:application/json");

$requestMethod = $_SERVER["REQUEST_METHOD"];
$paths = $_SERVER['REQUEST_URI'];

$v = explode('/', $paths) ;

unset($v[0]);

$cod = 200;
$mes = "todo bien";
$conjunto = "";


if($requestMethod == 'GET'){
    if(!empty($v[1])){
        $conjuntoRnd = Factoria::crearConjunto();
        $conjuntoRnd2 = Factoria::crearConjunto();
        $c = new Conjunto();
        $c->addConjunto($conjuntoRnd);

        switch ($v[1]) {
            case 'I':
                $a = $c->createInter($conjuntoRnd2);
                $conjunto = $c;
                echo json_encode(['code' => $cod, 'message'=> $mes,"con1" => $conjuntoRnd ,"con2" => $conjuntoRnd2, "Intersección" => $a]);

                break;
            case 'U';
            $a = $c->unionArr($conjuntoRnd2);
            echo json_encode(['code' => $cod, 'message'=> $mes,"con1" => $conjuntoRnd ,"con2" => $conjuntoRnd2, "Union" => $a]);
            break;
            default:
            $cod = 407;
            $mes = "error al introducir los parametros";
                break;
        }
    }else {
        $cod = 406;
        $mes = "faltan parametros";
        echo json_encode(['code' => $cod, 'message'=> $mes, 'message'=> "solo se admiten los parámetros /I y /U espabilao"]);
    }
}else{
    $cod = 405;
    $mes = "method invalid";
}


header("HTTP/1.1 $cod $mes");
