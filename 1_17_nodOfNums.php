<?php

/*
 * Найти наибольший общий делитель (НОД) двух натуральных чисел N и M.
*/

//Функция поиска НОД
function nodOfTwoNumbers(int $numberOne, int $numberTwo): int
{
    $maxDivider = 1;
    for ($i=2;$i<=$numberOne/2;$i++) {//итерации до N/2
        if ($numberOne % $i == 0 && $numberTwo % $i ==0) {
            $maxDivider = $i;
        }
    }
    return $numberOne==$numberTwo ? $numberOne : $maxDivider;
}

//Натуральные числа
$N = 36;
$M = 81;

echo nodOfTwoNumbers($N, $M);