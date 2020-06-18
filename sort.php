<?php

function bubbleSort($arr = null)
{
    $checked = false;

    for ($i = 1; $i < count($arr); $i++) {
        for ($j = 0; $j < count($arr)-$i; $j++) {
            if ($arr[$j] > $arr[$j+1]) {
                $tempVal = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] = $tempVal;

                $checked = true;
            }
        }

        if ($checked === false) {
            break;
        }
    }

    return $arr;
}
$filename = 'php://stdin';
if (strpos($argv[1], 'txt')) {
    $filename = $argv[1];
}
echo implode("", bubbleSort(file($filename)));
