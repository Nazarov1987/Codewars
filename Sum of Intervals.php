<?php

function sum_intervals(array $intervals): int {
    $interval = 0;
    $g = count($intervals);
    sort($intervals);
    for ($i = 0; $i <= count($intervals)-1; $i++) {
        echo '$i = ' . $i . ' ';
        for ($j = $i+1; $j <= $g; $j++) {
            if ($intervals[$j][0] <= $intervals[$i][1] &&
                $intervals[$j][1] <= $intervals[$i][1]) {
                unset($intervals[$j]);
            }
            if ($intervals[$j][0] >= $intervals[$i][0] &&
                $intervals[$j][0] < $intervals[$i][1]) {
                $intervals[$i][1] = $intervals[$j][1];
                unset($intervals[$j]);
            }
        }
        print_r($intervals);
        echo '<br>';
    }

    foreach ($intervals as $arr){
        $interval = $interval + ($arr[1] - $arr[0]);
    }
    echo $interval;
    return $interval;
}
sum_intervals([
    [-38, 360], //  [-480, -434],
    [-183, -78], // [-422, -354], 13
    [-480, -434], //[-396, 13], -
    [-230, -90], // [-244, 416]
    [149, 219], //  [-230, -90]
    [-244, 416], // [-183, -78]
    [-59, 427], //  [-183, 454],
    [449, 461], //  [-173, 169],
    [403, 482], //  [-134, 462],
    [194, 357], //  [-59, 427],
    [-134, 462], // [-38, 360],
    [312, 362], //  [124, 181],
    [-183, 454], // [149, 219],
    [-173, 169], // [184, 218],
    [-396, 13], //  [194, 357],
    [124, 181], //  [-244, 416],
    [-422, -354], //[312, 362],
    [184, 218], //  [403, 482],
    [244, 478], //  [449, 461],
]);
//4586
//950
