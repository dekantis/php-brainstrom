<?php

/*
 * Среди натуральных чисел  n0 ,n1,...,nm найти число с максимальной  суммой простых делителей.
*/

//Функция проверки числа на простое
function isSimple(int $number): bool
{
    for ($i=2;$i<=$number/2; $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}

//функция нахождения суммы простых делителей
function sumOSimpleDividers (int $number): int
{
    $sum = isSimple($number) ? $number+1 : 1;
    for ($i=2; $i<=$number/2; $i++) {
        if ($number % $i == 0 && isSimple($i)) {
            $sum += $i;
        }
    }
    return $sum;
}

$N = 77; //Количество чисел в натуральной последовательности

$maxSum = 0;
$numbWithMaxSum = 1;
$currentSum = 0;

for ($i=1; $i<=$N; $i++) {
    $currentSum = sumOSimpleDividers($i);
    if ($currentSum > $maxSum) {
        $maxSum = $currentSum;
        $numbWithMaxSum = $i;
    }
}

echo "Число с максимальной суммой простых делителей - $numbWithMaxSum С суммой простых делителей $maxSum";