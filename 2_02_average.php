<?php
/* Дан массив А(N). Получить массив В(N),
 * i-элемент которого равен  среднему арифметическому первых i элементов массива  А.
 */

//Функция заполняющая массив B(N);
function averageArr ($arr) : array
{
    reset($arr);
    $sum = 0;
    $result = [];
    while (current($arr)){
        $sum += current($arr);
        $result[]=$sum/(key($arr)+1);
        next($arr);
    }
    return $result;
}
$A = [1, 3, 4, -1];
$B = averageArr($A);

var_dump($B);