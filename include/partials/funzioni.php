<?php
session_start();
$str = '';
$lunghezzaconfiltri = 0;
$lunghezza = 0;
$lunghezza = isset($_GET['lunghezza']) ? intval($_GET['lunghezza']) : '';

$password  = '';
$ripetizioni = isset($_GET['radioValue']) ? $_GET['radioValue'] : '';

$arrayScelte = [
    [
        'type' => 'lettere',
        'arguments' => 'abcdefghijklmnopqrstuvwxyz',
        'active' => isset($_GET['lettere']) ? true : false
    ],
    [
        'type' => 'numeri',
        'arguments' => '0123456789',
        'active' => isset($_GET['numeri']) ? true : false
    ],
    [
        'type' => 'simboli',
        'arguments' => '!£$%&/()?<>\{}[]',
        'active' => isset($_GET['simboli']) ? true : false
    ],
];

foreach($arrayScelte as $elem){
    if($elem['active']){
        $str .= $elem['arguments'];
        $lunghezzaconfiltri += strlen($elem['arguments']);
    }
}

function generatorePass($password, $lunghezza, $lunghezzaconfiltri, $str, $ripetizioni){
    if($lunghezza > 0 && $lunghezzaconfiltri > 0){
        if($ripetizioni == 'no'){
            for($i = 0; strlen($password) < $lunghezza; $i++){
                $letteraRandom = $str[rand(0, strlen($str) - 1)];

                if(!preg_match("/$letteraRandom/", $password)){
                    $password .= $letteraRandom;
                }
            }
        }else {
            for($i = 0; strlen($password) < $lunghezza; $i++){
                $password .= $str[rand(0, strlen($str) - 1)];
            }
        }
    }

    return $password;
}

$_SESSION['password'] = generatorePass($password, $lunghezza, $lunghezzaconfiltri, $str, $ripetizioni)






?>