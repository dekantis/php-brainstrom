<?php

/*
Преобразовать числа заданной последовательности  натуральных чисел  n0 ,n1,...,nm так,
чтобы цифры каждого числа образовывали максимально возможные числа.
*/

//функция сортировки цифр числа в убывающую последовательность
function descSort(int $number) : int
{
    $descSort = $number % 10;
    $number = (int) ($number / 10);
    $pow = 0; //Показатель степени для работы с разрядностью

    while ($number>0){
        $descSort = $descSort - ($number % 10) * (10 ** $pow) >= 10 ** $pow ?
        descSort($descSort*10 + $number % 10) :
        (($number % 10 )*(10**($pow+1)) +  $descSort);
        $number = (int)($number / 10);
        $pow++;
    }
    return $descSort;
}

$N = 990; //Количество чисел в натуральной последовательности

for ($i = 1; $i<=$N; $i++) {
    echo descSort($i)."\n";
}

