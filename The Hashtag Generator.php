<?php

function generateHashtag($str) {
    $str = trim(str_replace(' ', '', ucwords($str)));
    if (strlen($str) == 0 || strlen($str)>139){
        echo 'false';
    }else{
        $str = substr_replace($str, "#", 0, 0);
        echo $str;
    }

}

generateHashtag(' codewars is nice');