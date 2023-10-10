<?php

require_once('config.php');

function numberToLetter($number) {
    global $SECRETALPHABETS;
$alphabets =$SECRETALPHABETS;
    $result = '';
    while ($number > 0) {
        $remainder = ($number - 1) % strlen($alphabets); 
        $result = $alphabets[$remainder] . $result; 
        $number = intval(($number - $remainder) / strlen($alphabets)); 
    }
    return $result;
}


function letterToNumber($letter) {
    global $SECRETALPHABETS;
    $alphabets =$SECRETALPHABETS;
    $length = strlen($letter);
    $result = 0;
    
    for ($i = 0; $i < $length; $i++) {
        $char = $letter[$i];
        $position = strpos($alphabets, $char) + 1; 
        $result = $result * strlen($alphabets) + $position;
    }
    
    return $result;
}
