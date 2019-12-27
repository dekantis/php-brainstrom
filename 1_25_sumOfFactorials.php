<?php

/*
Среди заданной последовательности натуральных чисел
n0 ,n1,...,nm найти  сумму  и  количество  тех  чисел,
которые  равны  сумме  факториалов своих цифр.
*/

//Функция нахождения факториала числа
function factorial(int $numb): int
{
    return $numb > 0 ? $numb * factorial($numb-1) : 1;
}

//Функция подсчета суммы факторивалов цифр в числе
function sumOfFactorialsNum(int $numb) : int
{
    $sum = 0;
    while ((int)$numb>0) {
        $sum = $sum + factorial($numb % 10);
        $numb = $numb / 10;
    }
    return $sum;
}

$M = 90000000; //количество цифр в последовательности чисел
$sumOfNumbs = 0; //Сумма чисел
$count = 0; //Счетчик

for ($i=1;$i<=$M;$i++) {
    if($i == sumOfFactorialsNum($i)) {
        $count++;
        $sumOfNumbs += $i;
        echo "$count $i "." + \n";
    }
}

echo "     = $sumOfNumbs";
