<?php

function toCamelCase($str){
    $arr = explode("_", $str);
    $n = count($arr);
    for($i = 1; $i < $n; $i++){
        $arr2 = str_split($arr[$i]);
        $arr2[0] = strtoupper($arr2[0]);
        $arr[$i] = implode($arr2);
        $str = implode($arr);
    }
    return $str;
    }

    $str = "the_hhh_stealth_warrior_hello";

    $test = toCamelCase($str);
    echo $test;