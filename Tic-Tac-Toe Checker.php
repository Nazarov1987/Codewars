<?php

function is_solved(array $board): int {

    if( $board[0][0] == 1 && $board[0][1] == 1 && $board[0][2] == 1 ||
        $board[1][0] == 1 && $board[1][1] == 1 && $board[1][2] == 1 ||
        $board[2][0] == 1 && $board[2][1] == 1 && $board[2][2] == 1 ||
        $board[0][0] == 1 && $board[1][0] == 1 && $board[2][0] == 1 ||
        $board[0][1] == 1 && $board[1][1] == 1 && $board[2][1] == 1 ||
        $board[0][2] == 1 && $board[1][2] == 1 && $board[2][2] == 1 ||
        $board[0][0] == 1 && $board[1][1] == 1 && $board[2][2] == 1 ||
        $board[0][2] == 1 && $board[1][1] == 1 && $board[2][0] == 1){
        echo 1;
        return 1;
    }if($board[0][0] == 2 && $board[0][1] == 2 && $board[0][2] == 2 ||
        $board[1][0] == 2 && $board[1][1] == 2 && $board[1][2] == 2 ||
        $board[2][0] == 2 && $board[2][1] == 2 && $board[2][2] == 2 ||
        $board[0][0] == 2 && $board[1][0] == 2 && $board[2][0] == 2 ||
        $board[0][1] == 2 && $board[1][1] == 2 && $board[2][1] == 2 ||
        $board[0][2] == 2 && $board[1][2] == 2 && $board[2][2] == 2 ||
        $board[0][0] == 2 && $board[1][1] == 2 && $board[2][2] == 2 ||
        $board[0][2] == 2 && $board[1][1] == 2 && $board[2][0] == 2){
        echo 2;
        return 2;
    }    if(in_array(0, $board[0]) || in_array(0, $board[1]) || in_array(0, $board[2])){
        echo -1;
        return -1;
    }
    else{
        echo 0;
        return 0;
    }
}

is_solved( [[2, 0, 1],
    [1, 1, 2],
    [2, 1, 1]]);