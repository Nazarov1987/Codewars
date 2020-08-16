<?php

function anagrams(string $word, array $words): array {
    $desiredArray = [];
    foreach ($words as $breakWord){
        $coincidence = '';
        $check = $word;
for ($i = 0; $i < strlen($breakWord); $i++){
    if (strlen($breakWord) > strlen($word)){
        $coincidence = NUll;
        break;
    }
    $occurrences = stristr($word, $breakWord[$i]);
    if ($occurrences != false){
        $coincidence .= $breakWord[$i];
        $check = preg_replace('/' . $breakWord[$i] . '/','', $check, 1);
    }else {
        $coincidence = NUll;
        break;
    }
}
    if($check == NUll){
        array_push($desiredArray, $coincidence);
    $desiredArray = array_diff($desiredArray, array(''));
        }
    }
    print_r($desiredArray);
}
anagrams('racer', ['crazer', 'carer', 'racar', 'caers', 'racer']);