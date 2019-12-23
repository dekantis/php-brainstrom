<?php
/*
Два  натуральных  числа  называют  дружественными,
если  каждое  из них равно сумме всех делителей другого.
Найти все пары дружественных чисел, лежащих в диапазоне от N до M.
*/

//Функция проверки на дружественные числа
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

$N = 1;
$M = 10000;
for ($i=$N; $i<=$M; $i++) {
    if (sumOfDividers(sumOfDividers($i)) == $i && sumOfDividers($i)>$i) {
        echo $i." ".sumOfDividers($i). "\n";
    }
}

