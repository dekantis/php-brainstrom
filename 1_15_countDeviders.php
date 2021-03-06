<?php

/* Определить количество различных делителей целого числа N.  */

//Функция проверки числа на простое
function countDeviders(int $numb): int
{
    $count = 0;
    for ($i=2;$i<=$numb/2;$i++) {//итерации до N/2
        if ($numb % $i == 0) {
            $count++;
        }
    }
    return $numb==1 ? 1 : $count+2;
}

$N = 0; //целое число

if ($N == 0) {
    echo "∞";
}
    else {
        echo  countDeviders($N);
}
