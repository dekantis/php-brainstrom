<?php
/*
Найти целое число в диапазоне от N до M с наибольшей суммой  делителей.
*/

//Функия расчета суммы делителей
function sumOfDividers(int $numb): int
{
    $sum = 1;
    for ($i=2;$i<=$numb/2;$i++) {//итерации до N/2
        if ($numb % $i == 0) {
            $sum += $i;
        }
    }
    return $sum;
}

$numbWithMaxSumOfDividers = 0;
$N = 5;
$M = 13;

//Поиск числа с наибольшей суммой делителей в диапазоне от N до M
for ($i = $N; $i <= $M; $i++) {
    $numbWithMaxSumOfDividers = $numbWithMaxSumOfDividers<sumOfDividers($i) ? $i : $numbWithMaxSumOfDividers;
}

echo $numbWithMaxSumOfDividers;
