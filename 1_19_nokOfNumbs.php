<?php

/*
 * Найти наименьшее общее кратное  (НОК)  двух натуральных чисел N и M.
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
$N = 3;
$M = 4;

//НОК ЧИСЕЛ $N и $M
$nokOfTwoNumbers = $N*$M / nodOfTwoNumbers($N, $M);// НОК и НОД связаны между собой (НОК(N,M) = N * M / НОД (N, M)

echo $nokOfTwoNumbers;
