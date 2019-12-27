<?php

/*
Среди натуральных чисел  n0 ,n1,...,nm найти число с максимальной  суммой делителей.
*/

/*
Найти целое число в диапазоне от N до M с наибольшей суммой  делителей.
*/

//Функия расчета суммы делителей
function sumOfDividers(int $numb): int
{
    $sum = $numb;
    for ($i=1;$i<=$numb/2;$i++) {//итерации до N/2
        if ($numb % $i == 0) {
            $sum += $i;
        }
    }
    return $sum;
}

$numbWithMaxSumOfDividers = 0;
$N = 11;

//Поиск числа с наибольшей суммой делителей в диапазоне от N до M
for ($i = 1; $i <= $N; $i++) {
    $numbWithMaxSumOfDividers = sumOfDividers($numbWithMaxSumOfDividers)<sumOfDividers($i) ? $i : $numbWithMaxSumOfDividers;
}

echo $numbWithMaxSumOfDividers;