<?php
function checkAsInt($param, $value)
{
    return (int)$param < (int)$value;
}

function checkAsStrings($param, $value)
{
    return $param < $value;
}

function bubbleSort($arr, $funcCallback)
{
    $checked = false;

    for ($i = 1; $i < count($arr); $i++) {
        for ($j = 0; $j < count($arr)-$i; $j++) {
            if ($funcCallback($arr[$j+1], $arr[$j])) {
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
$funcCallback = 'checkAsStrings';
$optind = null;
$options = getopt('n', [], $optind);

if ($argv[$optind]) {
    $filename = $argv[$optind];
}

if(array_key_exists('n',$options)) {
    $funcCallback = 'checkAsInt';
}

echo implode("", bubbleSort(file($filename), $funcCallback));
