<?php

function solution(array $numbers): int
{
    if(count($numbers)== 1)
        return $numbers[0];
    while ($numbers[0] > 0){
        sort($numbers);
        if ($numbers[count($numbers)-1] == $numbers[0]){
            return $numbers[0]*count($numbers);
            }
        if ($numbers[0] == 1){
            return count($numbers);
        }
        for ($i = 0; $i < count($numbers); $i++){
            $y = $numbers[$i] % $numbers[0];
            if ($y != 0){
            $numbers[$i] = $y;
            }else{
                $numbers[$i] = $numbers[0];
            }
        }
    }
}
solution( [6, 9, 27]);


